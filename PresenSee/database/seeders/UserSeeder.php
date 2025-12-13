<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            // Admin
            [
                'nama_user' => 'Administrator',
                'email_user' => 'admin@presensee.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'Aktif',
            ],
            
            // Guru Matematika
            [
                'nama_user' => 'Dr. Ahmad Fauzi, M.Pd',
                'email_user' => 'ahmad.fauzi@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
            
            // Guru Fisika
            [
                'nama_user' => 'Siti Nurhaliza, S.Pd',
                'email_user' => 'siti.nurhaliza@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
            
            // Guru Kimia
            [
                'nama_user' => 'Budi Santoso, M.Si',
                'email_user' => 'budi.santoso@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
            
            // Guru Biologi
            [
                'nama_user' => 'Dewi Lestari, S.Pd',
                'email_user' => 'dewi.lestari@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
            
            // Guru Bahasa Inggris
            [
                'nama_user' => 'Rudi Hartono, M.Pd',
                'email_user' => 'rudi.hartono@presensee.com',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $this->command->info('Users seeded successfully!');
    }
}