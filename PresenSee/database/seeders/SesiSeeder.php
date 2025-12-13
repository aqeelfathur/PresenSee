<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat sesi untuk setiap mapel_kelas
        // 21 mapel_kelas dari MapelKelasSeeder
        
        $sesiData = [];
        
        for ($mapelKelasId = 1; $mapelKelasId <= 21; $mapelKelasId++) {
            // Buat 24 pertemuan untuk setiap mapel_kelas
            // Pertemuan dimulai dari 2 bulan lalu sampai 1 bulan ke depan
            
            $startDate = Carbon::now()->subMonths(2)->startOfMonth();
            
            for ($pertemuan = 0; $pertemuan < 24; $pertemuan++) {
                // Jadwal: Senin dan Kamis setiap minggu
                $tanggal = $startDate->copy()->addDays($pertemuan * 3);
                
                // Skip weekend
                while ($tanggal->isWeekend()) {
                    $tanggal->addDay();
                }
                
                $sesiData[] = [
                    'id_mapel_kelas' => $mapelKelasId,
                    'tanggal_sesi' => $tanggal->format('Y-m-d'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert batch untuk performa
        Sesi::insert($sesiData);

        $this->command->info('Sesi seeded successfully! (504 sesi = 21 mapel_kelas x 24 pertemuan)');
    }
}
