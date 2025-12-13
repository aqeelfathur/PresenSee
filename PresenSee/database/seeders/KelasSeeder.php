<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = [
            ['kode_kelas' => '7A', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => '7B', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => '8A', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => '8B', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => '9A', 'tahun_ajaran' => '2024/2025'],
            ['kode_kelas' => '9B', 'tahun_ajaran' => '2024/2025'],
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }
    }
}