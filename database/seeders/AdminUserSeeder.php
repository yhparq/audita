<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $admins = [
            [
                'name' => 'Admin Uno',
                'email' => 'admin1@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Dos',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Tres',
                'email' => 'admin3@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
