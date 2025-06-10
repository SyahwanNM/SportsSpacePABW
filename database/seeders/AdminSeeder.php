<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@sportsspace.com',
            'password' => Hash::make('admin123'),
            'tanggal_lahir' => '1990-01-01',
            'gender' => 'Laki laki',
            'kota' => 'Jakarta',
            'role' => 'admin'
        ]);
    }
} 