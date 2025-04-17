<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'administrator',
        ]);
        User::create([
            'nama' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);
        User::create([
            'nama' => 'Masyarakat',
            'email' => 'masyarakat@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'masyarakat',
        ]);
    }
}
