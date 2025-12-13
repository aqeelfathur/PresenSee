<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswa = [
            // Kelas 7A
            [
                'nis' => '2024001',
                'nama_siswa' => 'Andi Wijaya',
                'nama_walimurid' => 'Bapak Wijaya',
                'no_handphone_walimurid' => '081234567801',
                'kelas' => '7A',
            ],
            [
                'nis' => '2024002',
                'nama_siswa' => 'Budi Setiawan',
                'nama_walimurid' => 'Ibu Setiawan',
                'no_handphone_walimurid' => '081234567802',
                'kelas' => '7A',
            ],
            [
                'nis' => '2024003',
                'nama_siswa' => 'Citra Dewi',
                'nama_walimurid' => 'Bapak Dewi',
                'no_handphone_walimurid' => '081234567803',
                'kelas' => '7A',
            ],
            [
                'nis' => '2024004',
                'nama_siswa' => 'Dian Pratama',
                'nama_walimurid' => 'Ibu Pratama',
                'no_handphone_walimurid' => '081234567804',
                'kelas' => '7A',
            ],
            [
                'nis' => '2024005',
                'nama_siswa' => 'Eka Putri',
                'nama_walimurid' => 'Bapak Putri',
                'no_handphone_walimurid' => '081234567805',
                'kelas' => '7A',
            ],
            
            // Kelas 7B
            [
                'nis' => '2024006',
                'nama_siswa' => 'Fajar Rahman',
                'nama_walimurid' => 'Ibu Rahman',
                'no_handphone_walimurid' => '081234567806',
                'kelas' => '7B',
            ],
            [
                'nis' => '2024007',
                'nama_siswa' => 'Gita Sari',
                'nama_walimurid' => 'Bapak Sari',
                'no_handphone_walimurid' => '081234567807',
                'kelas' => '7B',
            ],
            [
                'nis' => '2024008',
                'nama_siswa' => 'Hendra Kusuma',
                'nama_walimurid' => 'Ibu Kusuma',
                'no_handphone_walimurid' => '081234567808',
                'kelas' => '7B',
            ],
            [
                'nis' => '2024009',
                'nama_siswa' => 'Indah Permata',
                'nama_walimurid' => 'Bapak Permata',
                'no_handphone_walimurid' => '081234567809',
                'kelas' => '7B',
            ],
            [
                'nis' => '2024010',
                'nama_siswa' => 'Joko Santoso',
                'nama_walimurid' => 'Ibu Santoso',
                'no_handphone_walimurid' => '081234567810',
                'kelas' => '7B',
            ],
            
            // Kelas 8A
            [
                'nis' => '2023001',
                'nama_siswa' => 'Kartika Sari',
                'nama_walimurid' => 'Bapak Sari',
                'no_handphone_walimurid' => '081234567811',
                'kelas' => '8A',
            ],
            [
                'nis' => '2023002',
                'nama_siswa' => 'Lukman Hakim',
                'nama_walimurid' => 'Ibu Hakim',
                'no_handphone_walimurid' => '081234567812',
                'kelas' => '8A',
            ],
            [
                'nis' => '2023003',
                'nama_siswa' => 'Maya Angelina',
                'nama_walimurid' => 'Bapak Angelina',
                'no_handphone_walimurid' => '081234567813',
                'kelas' => '8A',
            ],
            [
                'nis' => '2023004',
                'nama_siswa' => 'Nanda Pratama',
                'nama_walimurid' => 'Ibu Pratama',
                'no_handphone_walimurid' => '081234567814',
                'kelas' => '8A',
            ],
            [
                'nis' => '2023005',
                'nama_siswa' => 'Okta Wijaya',
                'nama_walimurid' => 'Bapak Wijaya',
                'no_handphone_walimurid' => '081234567815',
                'kelas' => '8A',
            ],
            
            // Kelas 8B
            [
                'nis' => '2023006',
                'nama_siswa' => 'Putri Ayu',
                'nama_walimurid' => 'Ibu Ayu',
                'no_handphone_walimurid' => '081234567816',
                'kelas' => '8B',
            ],
            [
                'nis' => '2023007',
                'nama_siswa' => 'Reza Pahlevi',
                'nama_walimurid' => 'Bapak Pahlevi',
                'no_handphone_walimurid' => '081234567817',
                'kelas' => '8B',
            ],
            [
                'nis' => '2023008',
                'nama_siswa' => 'Sinta Dewi',
                'nama_walimurid' => 'Ibu Dewi',
                'no_handphone_walimurid' => '081234567818',
                'kelas' => '8B',
            ],
            [
                'nis' => '2023009',
                'nama_siswa' => 'Toni Setiawan',
                'nama_walimurid' => 'Bapak Setiawan',
                'no_handphone_walimurid' => '081234567819',
                'kelas' => '8B',
            ],
            [
                'nis' => '2023010',
                'nama_siswa' => 'Umar Bakri',
                'nama_walimurid' => 'Ibu Bakri',
                'no_handphone_walimurid' => '081234567820',
                'kelas' => '8B',
            ],
            
            // Kelas 9A
            [
                'nis' => '2022001',
                'nama_siswa' => 'Vina Melati',
                'nama_walimurid' => 'Bapak Melati',
                'no_handphone_walimurid' => '081234567821',
                'kelas' => '9A',
            ],
            [
                'nis' => '2022002',
                'nama_siswa' => 'Wahyu Nugroho',
                'nama_walimurid' => 'Ibu Nugroho',
                'no_handphone_walimurid' => '081234567822',
                'kelas' => '9A',
            ],
            [
                'nis' => '2022003',
                'nama_siswa' => 'Xenia Putri',
                'nama_walimurid' => 'Bapak Putri',
                'no_handphone_walimurid' => '081234567823',
                'kelas' => '9A',
            ],
            [
                'nis' => '2022004',
                'nama_siswa' => 'Yudi Setiawan',
                'nama_walimurid' => 'Ibu Setiawan',
                'no_handphone_walimurid' => '081234567824',
                'kelas' => '9A',
            ],
            [
                'nis' => '2022005',
                'nama_siswa' => 'Zahra Amelia',
                'nama_walimurid' => 'Bapak Amelia',
                'no_handphone_walimurid' => '081234567825',
                'kelas' => '9A',
            ],
            
            // Kelas 9B
            [
                'nis' => '2022006',
                'nama_siswa' => 'Agus Salim',
                'nama_walimurid' => 'Ibu Salim',
                'no_handphone_walimurid' => '081234567826',
                'kelas' => '9B',
            ],
            [
                'nis' => '2022007',
                'nama_siswa' => 'Bella Safira',
                'nama_walimurid' => 'Bapak Safira',
                'no_handphone_walimurid' => '081234567827',
                'kelas' => '9B',
            ],
            [
                'nis' => '2022008',
                'nama_siswa' => 'Cahyo Budi',
                'nama_walimurid' => 'Ibu Budi',
                'no_handphone_walimurid' => '081234567828',
                'kelas' => '9B',
            ],
            [
                'nis' => '2022009',
                'nama_siswa' => 'Dini Rahayu',
                'nama_walimurid' => 'Bapak Rahayu',
                'no_handphone_walimurid' => '081234567829',
                'kelas' => '9B',
            ],
            [
                'nis' => '2022010',
                'nama_siswa' => 'Erick Tohir',
                'nama_walimurid' => 'Ibu Tohir',
                'no_handphone_walimurid' => '081234567830',
                'kelas' => '9B',
            ],
        ];

        foreach ($siswa as $s) {
            Siswa::create($s);
        }
    }
}