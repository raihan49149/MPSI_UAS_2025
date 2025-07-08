<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin SIM',
            'email' => 'admin@sim.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Klien Pertama',
            'email' => 'klien@sim.com',
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);

        User::create([
            'name' => 'Kontraktor Utama',
            'email' => 'kontraktor@sim.com',
            'password' => Hash::make('password'),
            'role' => 'contractor',
        ]);
    }
}
