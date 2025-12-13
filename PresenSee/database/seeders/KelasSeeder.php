<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            // Kelas 10
            ['kode_kelas' => 'X-1', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => 'X-2', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => 'X-3', 'tahun_ajaran' => '2024/2025'],
            
            // Kelas 11
            ['kode_kelas' => 'XI-1', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => 'XI-2', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => 'XI-3', 'tahun_ajaran' => '2024/2025'],
            
            // Kelas 12
            ['kode_kelas' => 'XII-1', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => 'XII-2', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => 'XII-3', 'tahun_ajaran' => '2024/2025'],
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }

        $this->command->info('Kelas seeded successfully!');
    }
}
