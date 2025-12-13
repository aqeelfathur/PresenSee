<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Sesi;
use App\Models\MapelKelas;
use App\Models\Presensi;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuruController extends Controller
{
    /**
     * Dashboard Guru
     */
    public function dashboard()
    {
        $guru = Auth::user();
        
        // Hitung statistik hari ini
        $today = Carbon::today();
        
        $totalKelas = MapelKelas::where('id_guru', $guru->id_user)->count();
        
        $sesiHariIni = Sesi::whereHas('mapelKelas', function($query) use ($guru) {
            $query->where('id_guru', $guru->id_user);
        })->whereDate('tanggal_sesi', $today)->count();
        

        
        // Sesi yang sedang berlangsung
        $sesiBerlangsung = $this->getSesiBerlangsung($guru->id_user);
        
        return view('guru.dashboard', compact(
            'totalKelas',
            'sesiHariIni',
            'sesiBerlangsung'
        ));
    }

    /**
     * Halaman Sesi Presensi
     */
    public function sesiPresensi(Request $request)
    {
        $guru = Auth::user();
        
        // Get filter parameters
        $status = $request->get('status', 'all');
        $tanggal = $request->get('tanggal', Carbon::today()->format('Y-m-d'));
        $search = $request->get('search', '');
        
        // Query sesi dengan relasi
        $query = Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi'])
            ->whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->whereDate('tanggal_sesi', $tanggal);
        
        // Filter berdasarkan search
        if ($search) {
            $query->whereHas('mapelKelas', function($q) use ($search) {
                $q->whereHas('mapel', function($q2) use ($search) {
                    $q2->where('nama_mapel', 'like', "%{$search}%");
                })->orWhereHas('kelas', function($q2) use ($search) {
                    $q2->where('kode_kelas', 'like', "%{$search}%");
                });
            });
        }
        
        $sesi = $query->orderBy('tanggal_sesi', 'asc')->paginate(10);
        
        // Hitung statistik untuk cards
        $allSesi = Sesi::whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->whereDate('tanggal_sesi', $tanggal)
            ->get();
        
        $stats = [
            'total' => $allSesi->count(),
            'belum_dimulai' => $allSesi->filter(function($s) {
                return $this->getSesiStatus($s) === 'upcoming';
            })->count(),
            'berlangsung' => $allSesi->filter(function($s) {
                return $this->getSesiStatus($s) === 'ongoing';
            })->count(),
            'selesai' => $allSesi->filter(function($s) {
                return $this->getSesiStatus($s) === 'completed';
            })->count(),
        ];
        
        // Filter berdasarkan status jika dipilih
        if ($status !== 'all') {
            $sesi = $sesi->filter(function($s) use ($status) {
                return $this->getSesiStatus($s) === $status;
            });
        }
        
        // Transform data untuk view
        $sesi->getCollection()->transform(function($item) {
            $item->status_display = $this->getSesiStatus($item);
            $item->jumlah_siswa = $this->getJumlahSiswa($item);
            $item->kehadiran = $this->getKehadiran($item);
            return $item;
        });
        
        return view('guru.sesi-presensi', compact('sesi', 'stats', 'tanggal', 'status', 'search'));
    }

    /**
     * Halaman Presensi Kamera (Face Recognition)
     */
    public function presensiKamera($id)
    {
        $guru = Auth::user();
        
        // Get sesi dengan validasi kepemilikan
        $sesi = Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi.siswa'])
            ->whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->findOrFail($id);
        
        // Get daftar siswa di kelas ini
        $siswa = DB::table('siswa')
            ->get();
        
        // Get data presensi yang sudah ada
        $presensiExisting = Presensi::where('id_sesi', $id)
            ->pluck('status', 'id_siswa')
            ->toArray();
        
        return view('guru.presensi-kamera', compact('sesi', 'siswa', 'presensiExisting'));
    }

    /**
     * Simpan Presensi
     */
    public function simpanPresensi(Request $request, $id)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'status' => 'required|in:presensi,tidak',
        ]);
        
        $guru = Auth::user();
        
        // Validasi sesi milik guru
        $sesi = Sesi::whereHas('mapelKelas', function($q) use ($guru) {
            $q->where('id_guru', $guru->id_user);
        })->findOrFail($id);
        
        // Update or create presensi
        Presensi::updateOrCreate(
            [
                'id_sesi' => $id,
                'id_siswa' => $request->id_siswa,
            ],
            [
                'status' => $request->status,
            ]
        );
        
        return response()->json([
            'success' => true,
            'message' => 'Presensi berhasil disimpan',
        ]);
    }

    /**
     * Download Laporan Presensi
     */
    public function downloadPresensi($id)
    {
        $guru = Auth::user();
        
        $sesi = Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi.siswa'])
            ->whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->findOrFail($id);
        
        // TODO: Implement export to Excel/PDF
        // Untuk saat ini, redirect kembali dengan pesan
        return redirect()->back()->with('info', 'Fitur download sedang dalam pengembangan');
    }

    /**
     * Helper: Get status sesi
     */
    private function getSesiStatus($sesi)
    {
        $now = Carbon::now();
        $tanggalSesi = Carbon::parse($sesi->tanggal_sesi);
        
        // Gunakan jam dari database
        $jamMulai = Carbon::parse($sesi->jam_mulai);
        $jamSelesai = Carbon::parse($sesi->jam_selesai);
        
        $mulai = $tanggalSesi->copy()->setTimeFrom($jamMulai);
        $selesai = $tanggalSesi->copy()->setTimeFrom($jamSelesai);
        
        if ($now->lt($mulai)) {
            return 'upcoming'; // Belum dimulai
        } elseif ($now->between($mulai, $selesai)) {
            return 'ongoing'; // Berlangsung
        } else {
            return 'completed'; // Selesai
        }
    }
    /**
     * Helper: Get jumlah siswa
     */
    private function getJumlahSiswa($sesi)
    {
        // Ambil id_kelas dari mapelKelas
        $idKelas = $sesi->mapelKelas->id_kelas;
        
        // Hitung siswa berdasarkan kode_kelas (karena di tabel siswa pakai string 'kelas', bukan foreign key)
        $kodeKelas = $sesi->mapelKelas->kelas->kode_kelas;
        
        return \App\Models\Siswa::where('kelas', $kodeKelas)->count();
    }

    /**
     * Helper: Get data kehadiran
     */
    private function getKehadiran($sesi)
    {
        $totalSiswa = $this->getJumlahSiswa($sesi);
        $hadir = $sesi->presensi->where('status', 'presensi')->count();
        
        return [
            'hadir' => $hadir,
            'total' => $totalSiswa,
            'persentase' => $totalSiswa > 0 ? round(($hadir / $totalSiswa) * 100) : 0,
        ];
    }

    /**
     * Helper: Get sesi yang sedang berlangsung
     */
    private function getSesiBerlangsung($id_guru)
    {
        $today = Carbon::today();
        
        return Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas'])
            ->whereHas('mapelKelas', function($q) use ($id_guru) {
                $q->where('id_guru', $id_guru);
            })
            ->whereDate('tanggal_sesi', $today)
            ->get()
            ->filter(function($sesi) {
                return $this->getSesiStatus($sesi) === 'ongoing';
            })
            ->first();
    }

     /**
     * Halaman Daftar Kelas yang diampu oleh guru
     */
    public function daftarKelas()
    {
        $guru = Auth::user();
        
        // Ambil semua mapel_kelas yang diampu guru ini
        $kelasData = MapelKelas::with(['mapel', 'kelas', 'sesi'])
            ->where('id_guru', $guru->id_user)
            ->get()
            ->map(function ($mk) {
                // Hitung jumlah siswa di kelas ini
                $jumlahSiswa = \App\Models\Siswa::where('kelas', $mk->kelas->kode_kelas)->count();
                
                // Hitung jumlah pertemuan (sesi) untuk mapel_kelas ini
                $jumlahPertemuan = $mk->sesi()->count();
                
                return [
                    'id_mapel_kelas' => $mk->id_mapel_kelas,
                    'id_kelas' => $mk->id_kelas,
                    'kode_kelas' => $mk->kelas->kode_kelas,
                    'nama_mapel' => $mk->mapel->nama_mapel,
                    'jumlah_siswa' => $jumlahSiswa,
                    'jumlah_pertemuan' => $jumlahPertemuan,
                ];
            });
        
        // Hitung total statistik
        $totalKelas = $kelasData->count();
        $totalSiswa = $kelasData->sum('jumlah_siswa');
        $totalPertemuan = $kelasData->sum('jumlah_pertemuan');
        
        return view('guru.daftar-kelas', compact(
            'kelasData',
            'totalKelas',
            'totalSiswa',
            'totalPertemuan'
        ));
    }

    /**
     * API: Get daftar siswa per kelas (untuk modal)
     */
    public function getDaftarSiswa($idKelas)
    {
        $kelas = \App\Models\Kelas::findOrFail($idKelas);  
        $siswa = \App\Models\Siswa::where('kelas', $kelas->kode_kelas)
            ->orderBy('nama_siswa')
            ->get()
            ->map(function ($s) {
                return [
                    'id_siswa' => $s->id_siswa,
                    'nama_siswa' => $s->nama_siswa,
                    'nis' => $s->nis,
                    'status' => $s->status,
                    'avatar' => "https://ui-avatars.com/api/?name=" . urlencode($s->nama_siswa) . "&background=004680&color=fff&size=128"
                ];
            });
        
        return response()->json([
            'success' => true,
            'data' => $siswa
        ]);
    }

    /**
     * API: Get daftar pertemuan per mapel_kelas (untuk modal)
     */
    public function getDaftarPertemuan($idMapelKelas)
    {
        $sesi = Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi'])
            ->where('id_mapel_kelas', $idMapelKelas)
            ->orderBy('tanggal_sesi', 'desc')
            ->get()
            ->map(function ($s, $index) {
                $now = now();
                $tanggalSesi = \Carbon\Carbon::parse($s->tanggal_sesi);

                // Gunakan jam dari database
                $jamMulai = Carbon::parse($s->jam_mulai);
                $jamSelesai = Carbon::parse($s->jam_selesai);

                $mulai = $tanggalSesi->copy()->setTimeFrom($jamMulai);
                $selesai = $tanggalSesi->copy()->setTimeFrom($jamSelesai);
                                
                // Tentukan status pertemuan
                if ($now->lt($mulai)) {
                    $status = 'upcoming';
                    $statusText = 'Belum Dimulai';
                } elseif ($now->between($mulai, $selesai)) {
                    $status = 'ongoing';
                    $statusText = 'Berlangsung';
                } else {
                    $status = 'completed';
                    $statusText = 'Selesai';
                }
                
                // Hitung statistik presensi
                $totalPresensi = $s->presensi->count();
                $hadir = $s->presensi->where('status', 'presensi')->count();
                
                return [
                    'id_sesi' => $s->id_sesi,
                    'pertemuan_ke' => $index + 1,
                    'tanggal_sesi' => $tanggalSesi->format('d M Y'),
                    'tanggal_raw' => $tanggalSesi->format('Y-m-d'),
                    'jam_mulai' => $jamMulai->format('H:i'), 
                    'jam_selesai' => $jamSelesai->format('H:i'), 
                    'jam_formatted' => $jamMulai->format('H:i') . ' - ' . $jamSelesai->format('H:i'), 
                    'is_today' => $tanggalSesi->isToday(),
                    'status' => $status,
                    'status_text' => $statusText,
                    'total_presensi' => $totalPresensi,
                    'total_hadir' => $hadir,
                ];
            });
        
        return response()->json([
            'success' => true,
            'data' => $sesi
        ]);
    }

  

    /**
     * Pengaturan
     */
    public function pengaturan()
    {
        $guru = Auth::user();
        return view('guru.pengaturan', compact('guru'));
    }
}