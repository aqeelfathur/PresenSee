<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presensi;
use App\Models\Sesi;
use App\Models\Siswa;
use Carbon\Carbon;


class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua sesi yang sudah lewat (tidak termasuk hari ini dan masa depan)
        $sesiList = Sesi::where('tanggal_sesi', '<', Carbon::today())
            ->with('mapelKelas')
            ->get();

        $presensiData = [];

        foreach ($sesiList as $sesi) {
            // Ambil siswa di kelas yang sesuai dengan sesi ini
            $siswaList = Siswa::where('id_kelas', $sesi->mapelKelas->id_kelas)
                ->where('status', 'Aktif')
                ->get();

            foreach ($siswaList as $siswa) {
                // 90% kemungkinan hadir, 10% tidak hadir
                $status = rand(1, 100) <= 90 ? 'presensi' : 'tidak';
                
                $presensiData[] = [
                    'id_sesi' => $sesi->id_sesi,
                    'id_siswa' => $siswa->id_siswa,
                    'status' => $status,
                    'created_at' => $sesi->tanggal_sesi . ' ' . rand(7, 8) . ':' . rand(0, 59) . ':00',
                    'updated_at' => $sesi->tanggal_sesi . ' ' . rand(7, 8) . ':' . rand(0, 59) . ':00',
                ];
            }
        }

        // Insert batch (chunk untuk menghindari memory limit)
        $chunks = array_chunk($presensiData, 1000);
        foreach ($chunks as $chunk) {
            Presensi::insert($chunk);
        }

        $this->command->info('✅ Presensi seeded successfully! (~' . count($presensiData) . ' records)');
    }
}
