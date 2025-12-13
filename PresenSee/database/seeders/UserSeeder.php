<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nama_user' => 'Admin Utama',
                'email_user' => 'admin@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'status' => 'Aktif',
            ],
            [
                'nama_user' => 'Budi Santoso',
                'email_user' => 'budi.santoso@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
            [
                'nama_user' => 'Siti Nurhaliza',
                'email_user' => 'siti.nurhaliza@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
            [
                'nama_user' => 'Ahmad Dahlan',
                'email_user' => 'ahmad.dahlan@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
            [
                'nama_user' => 'Dewi Sartika',
                'email_user' => 'dewi.sartika@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'status' => 'Cuti',
            ],
            [
                'nama_user' => 'Rudi Hartono',
                'email_user' => 'rudi.hartono@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'status' => 'Aktif',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}