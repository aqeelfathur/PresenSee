<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate dulu untuk menghindari duplicate
        DB::table('kelas')->truncate();
        
        $now = Carbon::now();
        
        $kelas = [
            // Kelas 10
            ['kode_kelas' => 'X-1', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            ['kode_kelas' => 'X-2', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            ['kode_kelas' => 'X-3', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            
            // Kelas 11
            ['kode_kelas' => 'XI-1', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            ['kode_kelas' => 'XI-2', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            ['kode_kelas' => 'XI-3', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            
            // Kelas 12
            ['kode_kelas' => 'XII-1', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            ['kode_kelas' => 'XII-2', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
            ['kode_kelas' => 'XII-3', 'tahun_ajaran' => '2024/2025', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('kelas')->insert($kelas);

        $this->command->info('Kelas seeded successfully!');
    }
}
