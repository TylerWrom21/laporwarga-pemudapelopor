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
            'nik' => '0182658192047125',
            'telp' => '1234567890',
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'administrator',
        ]);
        User::create([
            'nik' => '0182658161247125',
            'telp' => '0987654321',
            'nama' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);
        User::create([
            'nik' => '7232658192047125',
            'telp' => '5432167890',
            'nama' => 'Masyarakat',
            'email' => 'masyarakat@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'masyarakat',
        ]);
    }
}
