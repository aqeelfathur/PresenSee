<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Data nama Indonesia yang realistis
        $namaDepan = [
            'Ahmad', 'Muhammad', 'Abdul', 'Rizki', 'Fajar', 'Dimas', 'Andi', 'Budi', 'Cahya', 'Dwi',
            'Siti', 'Nur', 'Dewi', 'Fitri', 'Ayu', 'Rina', 'Lestari', 'Wulan', 'Indah', 'Putri',
            'Agus', 'Hendra', 'Yoga', 'Reza', 'Ilham', 'Fauzan', 'Rama', 'Arif', 'Deni', 'Eko',
            'Aisyah', 'Zahra', 'Nabila', 'Fadila', 'Aulia', 'Rahma', 'Safira', 'Anisa', 'Diah', 'Maya'
        ];
        
        $namaBelakang = [
            'Pratama', 'Wijaya', 'Santoso', 'Permana', 'Kusuma', 'Saputra', 'Ramadhan', 'Hakim', 'Putra', 'Mahendra',
            'Lestari', 'Wati', 'Sari', 'Anggraini', 'Puspita', 'Cahyani', 'Rahayu', 'Ningsih', 'Safitri', 'Maharani',
            'Firmansyah', 'Hidayat', 'Nugroho', 'Setiawan', 'Kurniawan', 'Syahputra', 'Irawan', 'Maulana', 'Firdaus', 'Habibi'
        ];

        // Buat siswa untuk setiap kelas (9 kelas x 35 siswa = 315 siswa)
        for ($kelasId = 1; $kelasId <= 9; $kelasId++) {
            for ($i = 1; $i <= 35; $i++) {
                $nis = sprintf('2024%02d%03d', $kelasId, $i);
                $nama = $namaDepan[array_rand($namaDepan)] . ' ' . $namaBelakang[array_rand($namaBelakang)];
                
                Siswa::create([
                    'nis' => $nis,
                    'nama_siswa' => $nama,
                    'id_kelas' => $kelasId,
                    'status' => $i <= 33 ? 'Aktif' : 'Tidak Aktif', // 2 siswa tidak aktif per kelas
                ]);
            }
        }

        $this->command->info('Siswa seeded successfully! (315 siswa)');
    }
}
