<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MapelKelas;

class MapelKelasSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping: Guru mengajar mata pelajaran di kelas tertentu
        // id_guru 2 = Budi Santoso (Matematika)
        // id_guru 3 = Siti Nurhaliza (Bahasa Indonesia)
        // id_guru 4 = Ahmad Dahlan (IPA)
        // id_guru 5 = Rudi Hartono (Bahasa Inggris)
        
        $mapelKelas = [
            // Kelas 7A (id_kelas = 1)
            ['id_mapel' => 1, 'id_kelas' => 1, 'id_guru' => 2], // Matematika - Budi
            ['id_mapel' => 2, 'id_kelas' => 1, 'id_guru' => 3], // B. Indonesia - Siti
            ['id_mapel' => 3, 'id_kelas' => 1, 'id_guru' => 6], // B. Inggris - Rudi
            ['id_mapel' => 4, 'id_kelas' => 1, 'id_guru' => 4], // IPA - Ahmad
            
            // Kelas 7B (id_kelas = 2)
            ['id_mapel' => 1, 'id_kelas' => 2, 'id_guru' => 2], // Matematika - Budi
            ['id_mapel' => 2, 'id_kelas' => 2, 'id_guru' => 3], // B. Indonesia - Siti
            ['id_mapel' => 3, 'id_kelas' => 2, 'id_guru' => 6], // B. Inggris - Rudi
            ['id_mapel' => 4, 'id_kelas' => 2, 'id_guru' => 4], // IPA - Ahmad
            
            // Kelas 8A (id_kelas = 3)
            ['id_mapel' => 1, 'id_kelas' => 3, 'id_guru' => 2], // Matematika - Budi
            ['id_mapel' => 2, 'id_kelas' => 3, 'id_guru' => 3], // B. Indonesia - Siti
            ['id_mapel' => 3, 'id_kelas' => 3, 'id_guru' => 6], // B. Inggris - Rudi
            ['id_mapel' => 4, 'id_kelas' => 3, 'id_guru' => 4], // IPA - Ahmad
            
            // Kelas 8B (id_kelas = 4)
            ['id_mapel' => 1, 'id_kelas' => 4, 'id_guru' => 2], // Matematika - Budi
            ['id_mapel' => 2, 'id_kelas' => 4, 'id_guru' => 3], // B. Indonesia - Siti
            ['id_mapel' => 3, 'id_kelas' => 4, 'id_guru' => 6], // B. Inggris - Rudi
            ['id_mapel' => 5, 'id_kelas' => 4, 'id_guru' => 4], // IPS - Ahmad
            
            // Kelas 9A (id_kelas = 5)
            ['id_mapel' => 1, 'id_kelas' => 5, 'id_guru' => 2], // Matematika - Budi
            ['id_mapel' => 2, 'id_kelas' => 5, 'id_guru' => 3], // B. Indonesia - Siti
            ['id_mapel' => 3, 'id_kelas' => 5, 'id_guru' => 6], // B. Inggris - Rudi
            ['id_mapel' => 4, 'id_kelas' => 5, 'id_guru' => 4], // IPA - Ahmad
            
            // Kelas 9B (id_kelas = 6)
            ['id_mapel' => 1, 'id_kelas' => 6, 'id_guru' => 2], // Matematika - Budi
            ['id_mapel' => 2, 'id_kelas' => 6, 'id_guru' => 3], // B. Indonesia - Siti
            ['id_mapel' => 3, 'id_kelas' => 6, 'id_guru' => 6], // B. Inggris - Rudi
            ['id_mapel' => 5, 'id_kelas' => 6, 'id_guru' => 4], // IPS - Ahmad
        ];

        foreach ($mapelKelas as $mk) {
            MapelKelas::create($mk);
        }
    }
}