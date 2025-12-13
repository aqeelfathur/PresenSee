<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KelasSeeder::class,
            MapelSeeder::class,
            SiswaSeeder::class,
            MapelKelasSeeder::class,
            SesiSeeder::class,
            PresensiSeeder::class,
        ]);
    }
}
