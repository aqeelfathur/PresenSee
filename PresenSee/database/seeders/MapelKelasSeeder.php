<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MapelKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate dulu untuk menghindari duplicate
        DB::table('mapel_kelas')->truncate();
        
        $now = Carbon::now();
        
        // Mapping: Guru mengajar mapel tertentu di kelas tertentu
        $assignments = [
            // Guru Ahmad Fauzi (id: 2) - Matematika (id: 1)
            ['id_mapel' => 1, 'id_kelas' => 1, 'id_guru' => 2, 'created_at' => $now, 'updated_at' => $now], // X-1
            ['id_mapel' => 1, 'id_kelas' => 2, 'id_guru' => 2, 'created_at' => $now, 'updated_at' => $now], // X-2
            ['id_mapel' => 1, 'id_kelas' => 4, 'id_guru' => 2, 'created_at' => $now, 'updated_at' => $now], // XI-1
            ['id_mapel' => 1, 'id_kelas' => 5, 'id_guru' => 2, 'created_at' => $now, 'updated_at' => $now], // XI-2
            
            // Guru Siti Nurhaliza (id: 3) - Fisika (id: 2)
            ['id_mapel' => 2, 'id_kelas' => 4, 'id_guru' => 3, 'created_at' => $now, 'updated_at' => $now], // XI-1
            ['id_mapel' => 2, 'id_kelas' => 5, 'id_guru' => 3, 'created_at' => $now, 'updated_at' => $now], // XI-2
            ['id_mapel' => 2, 'id_kelas' => 7, 'id_guru' => 3, 'created_at' => $now, 'updated_at' => $now], // XII-1
            
            // Guru Budi Santoso (id: 4) - Kimia (id: 3)
            ['id_mapel' => 3, 'id_kelas' => 4, 'id_guru' => 4, 'created_at' => $now, 'updated_at' => $now], // XI-1
            ['id_mapel' => 3, 'id_kelas' => 5, 'id_guru' => 4, 'created_at' => $now, 'updated_at' => $now], // XI-2
            ['id_mapel' => 3, 'id_kelas' => 6, 'id_guru' => 4, 'created_at' => $now, 'updated_at' => $now], // XI-3
            ['id_mapel' => 3, 'id_kelas' => 7, 'id_guru' => 4, 'created_at' => $now, 'updated_at' => $now], // XII-1
            
            // Guru Dewi Lestari (id: 5) - Biologi (id: 4)
            ['id_mapel' => 4, 'id_kelas' => 1, 'id_guru' => 5, 'created_at' => $now, 'updated_at' => $now], // X-1
            ['id_mapel' => 4, 'id_kelas' => 2, 'id_guru' => 5, 'created_at' => $now, 'updated_at' => $now], // X-2
            ['id_mapel' => 4, 'id_kelas' => 3, 'id_guru' => 5, 'created_at' => $now, 'updated_at' => $now], // X-3
            ['id_mapel' => 4, 'id_kelas' => 4, 'id_guru' => 5, 'created_at' => $now, 'updated_at' => $now], // XI-1
            
            // Guru Rudi Hartono (id: 6) - Bahasa Inggris (id: 6)
            ['id_mapel' => 6, 'id_kelas' => 1, 'id_guru' => 6, 'created_at' => $now, 'updated_at' => $now], // X-1
            ['id_mapel' => 6, 'id_kelas' => 2, 'id_guru' => 6, 'created_at' => $now, 'updated_at' => $now], // X-2
            ['id_mapel' => 6, 'id_kelas' => 3, 'id_guru' => 6, 'created_at' => $now, 'updated_at' => $now], // X-3
            ['id_mapel' => 6, 'id_kelas' => 7, 'id_guru' => 6, 'created_at' => $now, 'updated_at' => $now], // XII-1
            ['id_mapel' => 6, 'id_kelas' => 8, 'id_guru' => 6, 'created_at' => $now, 'updated_at' => $now], // XII-2
        ];

        DB::table('mapel_kelas')->insert($assignments);

        $this->command->info('MapelKelas seeded successfully!');
    }
}
