<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Akmal Raditya Wijaya',
            'email' => 'superadmin@smutrack.test',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        User::create([
            'name' => 'Fahima Sholatin',
            'email' => 'admin@smutrack.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Bagus Kusuma Jayanegara',
            'email' => 'user@smutrack.test',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
