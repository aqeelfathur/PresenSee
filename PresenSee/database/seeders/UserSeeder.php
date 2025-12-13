<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate dulu untuk menghindari duplicate
        DB::table('users')->truncate();
        
        $now = Carbon::now();
        
        $users = [
            // Admin
            [
                'nama_user' => 'Administrator',
                'email_user' => 'admin@presensee.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Guru Matematika
            [
                'nama_user' => 'Dr. Ahmad Fauzi, M.Pd',
                'email_user' => 'ahmad.fauzi@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Guru Fisika
            [
                'nama_user' => 'Siti Nurhaliza, S.Pd',
                'email_user' => 'siti.nurhaliza@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Guru Kimia
            [
                'nama_user' => 'Budi Santoso, M.Si',
                'email_user' => 'budi.santoso@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Guru Biologi
            [
                'nama_user' => 'Dewi Lestari, S.Pd',
                'email_user' => 'dewi.lestari@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Guru Bahasa Inggris
            [
                'nama_user' => 'Rudi Hartono, M.Pd',
                'email_user' => 'rudi.hartono@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('users')->insert($users);

        $this->command->info('✅ Users seeded successfully!');
    }
}