@extends('layouts.app')

@section('title', 'Dashboard Guru')
@section('page-title', 'Dashboard Guru')
@section('page-subtitle', 'Selamat datang kembali, {{ Auth::user()->nama_user }}!')

@section('content')
<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Kelas yang Diampu -->
    @component('components.card-summary', [
        'title' => 'Kelas yang Diampu',
        'value' => $totalKelas,
        'iconBg' => 'bg-blue-100',
        'iconColor' => 'text-[#004680]',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
    ])
    @endcomponent
    
    <!-- Total Siswa Aktif -->
    @component('components.card-summary', [
        'title' => 'Total Siswa Aktif',
        'value' => $siswaAktif,
        'iconBg' => 'bg-green-100',
        'iconColor' => 'text-green-600',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
    ])
    @endcomponent
    
    <!-- Jadwal Hari Ini -->
    @component('components.card-summary', [
        'title' => 'Jadwal Hari Ini',
        'value' => $sesiHariIni,
        'iconBg' => 'bg-yellow-100',
        'iconColor' => 'text-yellow-600',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
    ])
    @endcomponent
    
    <!-- Sesi Berlangsung -->
    @component('components.card-summary', [
        'title' => 'Sesi Berlangsung',
        'value' => $sesiBerlangsung ? '1' : '0',
        'iconBg' => 'bg-purple-100',
        'iconColor' => 'text-purple-600',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
    ])
    @endcomponent
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <!-- Buat Sesi Presensi -->
    <button 
        id="openBuatJadwalModal"
        class="flex items-center justify-center gap-3 bg-[#004680] text-white px-6 py-4 rounded-xl hover:bg-[#003766] transition-all duration-200 shadow-sm hover:shadow-md w-full">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        <span class="font-semibold">Buat Sesi Presensi</span>
    </button>
    
    <!-- Mulai Presensi -->
    @if($sesiBerlangsung)
    <a href="{{ route('guru.presensi-kamera', ['id' => $sesiBerlangsung->id_sesi]) }}" 
        class="flex items-center justify-center gap-3 bg-[#ffca05] text-gray-900 px-6 py-4 rounded-xl hover:bg-[#e6b804] transition-all duration-200 shadow-sm hover:shadow-md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="font-semibold">Mulai Presensi</span>
    </a>
    @else
    <button 
        disabled
        class="flex items-center justify-center gap-3 bg-gray-200 text-gray-500 px-6 py-4 rounded-xl cursor-not-allowed">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="font-semibold">Tidak Ada Sesi</span>
    </button>
    @endif
    
    <!-- Lihat Daftar Sesi Presensi -->
    <a href="{{ route('guru.sesi-presensi') }}" 
        class="flex items-center justify-center gap-3 bg-white border-2 border-[#004680] text-[#004680] px-6 py-4 rounded-xl hover:bg-blue-50 transition-all duration-200 shadow-sm hover:shadow-md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        <span class="font-semibold">Daftar Sesi Presensi</span>
    </a>
</div>

<!-- Modal Popup Buat Jadwal -->
<div id="buatJadwalModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Buat Sesi Presensi</h3>
        <form action="{{ route('guru.sesi-presensi') }}" method="POST">
            @csrf
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran & Kelas</label>
                    <select name="id_mapel_kelas" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004680] focus:border-[#004680]" required>
                        <option value="">Pilih Mata Pelajaran & Kelas</option>
                        @if(Auth::user()->mapelKelas)
                            @foreach(Auth::user()->mapelKelas as $mk)
                            <option value="{{ $mk->id_mapel_kelas }}">
                                {{ $mk->mapel->nama_mapel }} - {{ $mk->kelas->kode_kelas }}
                            </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal_sesi" value="{{ date('Y-m-d') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004680] focus:border-[#004680]" required>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <button type="button" id="closeBuatJadwalModal" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Jadwal Hari Ini -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Jadwal Hari Ini</h2>
                    <p class="text-sm text-gray-500 mt-0.5">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-[#004680]">
                    {{ $sesiHariIni }} Sesi
                </span>
            </div>
        </div>
        
        <div class="p-6 space-y-4">
            @php
                $sesiToday = App\Models\Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas'])
                    ->whereHas('mapelKelas', function($q) {
                        $q->where('id_guru', Auth::id());
                    })
                    ->whereDate('tanggal_sesi', today())
                    ->orderBy('tanggal_sesi', 'asc')
                    ->get();
            @endphp
            
            @forelse($sesiToday as $sesi)
            @php
                $now = \Carbon\Carbon::now();
                $tanggalSesi = \Carbon\Carbon::parse($sesi->tanggal_sesi);
                $mulai = $tanggalSesi->copy()->setTime(7, 0);
                $selesai = $tanggalSesi->copy()->setTime(15, 0);
                
                if ($now->lt($mulai)) {
                    $status = 'upcoming';
                    $statusText = 'Belum Dimulai';
                    $statusColor = 'bg-gray-100 text-gray-700';
                    $dotColor = 'bg-gray-400';
                    $timeColor = 'bg-gray-100 text-gray-700';
                } elseif ($now->between($mulai, $selesai)) {
                    $status = 'ongoing';
                    $statusText = 'Sedang Berlangsung';
                    $statusColor = 'bg-green-100 text-green-700';
                    $dotColor = 'bg-green-500';
                    $timeColor = 'bg-[#004680] text-white';
                } else {
                    $status = 'completed';
                    $statusText = 'Selesai';
                    $statusColor = 'bg-blue-100 text-blue-700';
                    $dotColor = 'bg-blue-500';
                    $timeColor = 'bg-gray-100 text-gray-700';
                }
            @endphp
            
            <!-- Jadwal Item -->
            <div class="flex items-start gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex flex-col items-center justify-center px-3 py-2 {{ $timeColor }} rounded-lg">
                    <span class="text-xs font-medium">{{ $tanggalSesi->format('H:i') }}</span>
                    <div class="w-px h-4 {{ $status === 'ongoing' ? 'bg-white/30' : 'bg-gray-300' }} my-1"></div>
                    <span class="text-xs font-medium">{{ $selesai->format('H:i') }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-900 mb-1">{{ $sesi->mapelKelas->mapel->nama_mapel }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ $sesi->mapelKelas->kelas->kode_kelas }} • Ruang {{ $sesi->mapelKelas->kelas->kode_kelas }}</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium {{ $statusColor }}">
                        <span class="w-1.5 h-1.5 {{ $dotColor }} rounded-full mr-1.5"></span>
                        {{ $statusText }}
                    </span>
                </div>
                @if($status === 'ongoing')
                <a href="{{ route('guru.presensi-kamera', ['id' => $sesi->id_sesi]) }}" 
                    class="px-3 py-1.5 bg-[#ffca05] text-gray-900 rounded-lg hover:bg-[#e6b804] transition-colors text-xs font-medium">
                    Mulai
                </a>
                @endif
            </div>
            
            @empty
            <div class="text-center py-8">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-sm font-medium text-gray-600">Tidak ada jadwal hari ini</p>
                <p class="text-xs text-gray-400 mt-1">Buat sesi presensi baru dengan klik tombol di atas</p>
            </div>
            @endforelse
        </div>
    </div>
    
    <!-- Aktivitas Terbaru -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Aktivitas Terbaru</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Sesi presensi terkini</p>
                </div>
                <a href="{{ route('guru.sesi-presensi') }}" class="text-[#004680] hover:text-[#003766] text-sm font-medium transition-colors">
                    Lihat Semua
                </a>
            </div>
        </div>
        
        <div class="p-6 space-y-4">
            @php
                $recentSesi = App\Models\Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi'])
                    ->whereHas('mapelKelas', function($q) {
                        $q->where('id_guru', Auth::id());
                    })
                    ->latest('tanggal_sesi')
                    ->limit(5)
                    ->get();
            @endphp
            
            @forelse($recentSesi as $sesi)
            @php
                $totalPresensi = $sesi->presensi->count();
                $hadir = $sesi->presensi->where('status', 'presensi')->count();
                $persentase = $totalPresensi > 0 ? round(($hadir / $totalPresensi) * 100) : 0;
            @endphp
            
            <!-- Activity Item -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 {{ $persentase >= 80 ? 'bg-green-100 text-green-600' : ($persentase >= 60 ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-600') }} rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">{{ $sesi->mapelKelas->mapel->nama_mapel }} ({{ $sesi->mapelKelas->kelas->kode_kelas }})</p>
                    <p class="text-sm text-gray-600 mt-1">
                        @if($totalPresensi > 0)
                            {{ $hadir }} dari {{ $totalPresensi }} siswa hadir ({{ $persentase }}%)
                        @else
                            Belum ada presensi
                        @endif
                    </p>
                    <p class="text-xs text-gray-400 mt-1">{{ \Carbon\Carbon::parse($sesi->tanggal_sesi)->diffForHumans() }}</p>
                </div>
            </div>
            
            @empty
            <div class="text-center py-8">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm font-medium text-gray-600">Belum ada aktivitas</p>
                <p class="text-xs text-gray-400 mt-1">Aktivitas presensi akan muncul di sini</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Statistik Kehadiran Mingguan</h2>
                <p class="text-sm text-gray-500 mt-0.5">7 hari terakhir</p>
            </div>
        </div>
    </div>
    
    <div class="p-8">
        <!-- Chart Placeholder -->
        <div class="flex items-center justify-center h-64 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border-2 border-dashed border-blue-200">
            <div class="text-center">
                <svg class="w-16 h-16 mx-auto text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <p class="text-sm font-medium text-gray-600">Grafik Kehadiran Mingguan</p>
                <p class="text-xs text-gray-400 mt-1">(Integrasi Chart.js atau Recharts)</p>
            </div>
        </div>
        
        @php
            // Hitung statistik kehadiran 7 hari terakhir
            $weeklyStats = App\Models\Presensi::whereHas('sesi.mapelKelas', function($q) {
                    $q->where('id_guru', Auth::id());
                })
                ->whereHas('sesi', function($q) {
                    $q->where('tanggal_sesi', '>=', now()->subDays(7));
                })
                ->selectRaw('COUNT(*) as total')
                ->selectRaw('SUM(CASE WHEN status = "presensi" THEN 1 ELSE 0 END) as hadir')
                ->first();
            
            $totalPresensi = $weeklyStats->total ?? 0;
            $totalHadir = $weeklyStats->hadir ?? 0;
            $persentaseHadir = $totalPresensi > 0 ? round(($totalHadir / $totalPresensi) * 100) : 0;
            $persentaseTidakHadir = $totalPresensi > 0 ? (100 - $persentaseHadir) : 0;
        @endphp
        
        <!-- Stats Summary Below Chart -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
            <div class="text-center p-4 bg-green-50 rounded-xl">
                <p class="text-2xl font-bold text-green-600">{{ $persentaseHadir }}%</p>
                <p class="text-xs text-gray-600 mt-1">Rata-rata Hadir</p>
            </div>
            <div class="text-center p-4 bg-red-50 rounded-xl">
                <p class="text-2xl font-bold text-red-600">{{ $persentaseTidakHadir }}%</p>
                <p class="text-xs text-gray-600 mt-1">Tidak Hadir</p>
            </div>
            <div class="text-center p-4 bg-blue-50 rounded-xl">
                <p class="text-2xl font-bold text-[#004680]">{{ $totalHadir }}</p>
                <p class="text-xs text-gray-600 mt-1">Total Hadir</p>
            </div>
            <div class="text-center p-4 bg-purple-50 rounded-xl">
                <p class="text-2xl font-bold text-purple-600">{{ $totalPresensi }}</p>
                <p class="text-xs text-gray-600 mt-1">Total Data</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Modal handlers
    const modal = document.getElementById('buatJadwalModal');
    const openBtn = document.getElementById('openBuatJadwalModal');
    const closeBtn = document.getElementById('closeBuatJadwalModal');

    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
    
    // Close modal when clicking outside
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Close modal on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
        }
    });
</script>
@endpush
@endsection