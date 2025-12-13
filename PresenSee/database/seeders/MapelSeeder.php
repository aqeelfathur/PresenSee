<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate dulu untuk menghindari duplicate
        DB::table('mapel')->truncate();
        
        $now = Carbon::now();
        
        $mapel = [
            ['nama_mapel' => 'Matematika', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Fisika', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Kimia', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Biologi', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Bahasa Indonesia', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Bahasa Inggris', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Sejarah', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Geografi', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Ekonomi', 'created_at' => $now, 'updated_at' => $now],
            ['nama_mapel' => 'Sosiologi', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('mapel')->insert($mapel);

        $this->command->info('Mapel seeded successfully!');
    }
}
