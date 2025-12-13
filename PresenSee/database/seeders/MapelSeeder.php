<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        $mapel = [
            ['nama_mapel' => 'Matematika'],
            ['nama_mapel' => 'Bahasa Indonesia'],
            ['nama_mapel' => 'Bahasa Inggris'],
            ['nama_mapel' => 'IPA'],
            ['nama_mapel' => 'IPS'],
            ['nama_mapel' => 'Pendidikan Agama'],
            ['nama_mapel' => 'Seni Budaya'],
            ['nama_mapel' => 'PJOK'],
        ];

        foreach ($mapel as $m) {
            Mapel::create($m);
        }
    }
}