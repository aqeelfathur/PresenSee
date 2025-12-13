<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presensi;

class PresensiSeeder extends Seeder
{
    public function run(): void
    {
        // Presensi untuk sesi 1 (Matematika 7A, 5 hari lalu)
        // Siswa kelas 7A: id 1-5
        $presensi = [
            // Sesi 1
            ['id_sesi' => 1, 'id_siswa' => 1, 'status' => 'presensi'],
            ['id_sesi' => 1, 'id_siswa' => 2, 'status' => 'presensi'],
            ['id_sesi' => 1, 'id_siswa' => 3, 'status' => 'tidak'],
            ['id_sesi' => 1, 'id_siswa' => 4, 'status' => 'presensi'],
            ['id_sesi' => 1, 'id_siswa' => 5, 'status' => 'presensi'],
            
            // Sesi 2
            ['id_sesi' => 2, 'id_siswa' => 1, 'status' => 'presensi'],
            ['id_sesi' => 2, 'id_siswa' => 2, 'status' => 'presensi'],
            ['id_sesi' => 2, 'id_siswa' => 3, 'status' => 'presensi'],
            ['id_sesi' => 2, 'id_siswa' => 4, 'status' => 'tidak'],
            ['id_sesi' => 2, 'id_siswa' => 5, 'status' => 'presensi'],
            
            // Sesi 3
            ['id_sesi' => 3, 'id_siswa' => 1, 'status' => 'presensi'],
            ['id_sesi' => 3, 'id_siswa' => 2, 'status' => 'presensi'],
            ['id_sesi' => 3, 'id_siswa' => 3, 'status' => 'presensi'],
            ['id_sesi' => 3, 'id_siswa' => 4, 'status' => 'presensi'],
            ['id_sesi' => 3, 'id_siswa' => 5, 'status' => 'presensi'],
            
            // Sesi 4 (B. Indonesia 7A)
            ['id_sesi' => 4, 'id_siswa' => 1, 'status' => 'presensi'],
            ['id_sesi' => 4, 'id_siswa' => 2, 'status' => 'tidak'],
            ['id_sesi' => 4, 'id_siswa' => 3, 'status' => 'presensi'],
            ['id_sesi' => 4, 'id_siswa' => 4, 'status' => 'presensi'],
            ['id_sesi' => 4, 'id_siswa' => 5, 'status' => 'presensi'],
        ];

        foreach ($presensi as $p) {
            Presensi::create($p);
        }
    }
}