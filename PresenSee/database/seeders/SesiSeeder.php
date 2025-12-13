<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sesi;
use Carbon\Carbon;

class SesiSeeder extends Seeder
{
    public function run(): void
    {
        // Buat beberapa sesi untuk contoh
        $sesi = [
            // Matematika Kelas 7A (id_mapel_kelas = 1, guru = 2/Budi)
            ['id_mapel_kelas' => 1, 'id_guru' => 2, 'tanggal_sesi' => Carbon::now()->subDays(5)],
            ['id_mapel_kelas' => 1, 'id_guru' => 2, 'tanggal_sesi' => Carbon::now()->subDays(3)],
            ['id_mapel_kelas' => 1, 'id_guru' => 2, 'tanggal_sesi' => Carbon::now()],
            
            // B. Indonesia Kelas 7A (id_mapel_kelas = 2, guru = 3/Siti)
            ['id_mapel_kelas' => 2, 'id_guru' => 3, 'tanggal_sesi' => Carbon::now()->subDays(4)],
            ['id_mapel_kelas' => 2, 'id_guru' => 3, 'tanggal_sesi' => Carbon::now()->subDays(1)],
            
            // B. Inggris Kelas 7A (id_mapel_kelas = 3, guru = 6/Rudi)
            ['id_mapel_kelas' => 3, 'id_guru' => 6, 'tanggal_sesi' => Carbon::now()->subDays(6)],
            ['id_mapel_kelas' => 3, 'id_guru' => 6, 'tanggal_sesi' => Carbon::now()->subDays(2)],
            
            // IPA Kelas 7A (id_mapel_kelas = 4, guru = 4/Ahmad)
            ['id_mapel_kelas' => 4, 'id_guru' => 4, 'tanggal_sesi' => Carbon::now()->subDays(5)],
            ['id_mapel_kelas' => 4, 'id_guru' => 4, 'tanggal_sesi' => Carbon::now()],
            
            // Matematika Kelas 8A (id_mapel_kelas = 9, guru = 2/Budi)
            ['id_mapel_kelas' => 9, 'id_guru' => 2, 'tanggal_sesi' => Carbon::now()->subDays(4)],
            ['id_mapel_kelas' => 9, 'id_guru' => 2, 'tanggal_sesi' => Carbon::now()->subDays(1)],
        ];

        foreach ($sesi as $s) {
            Sesi::create($s);
        }
    }
}