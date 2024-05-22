<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'nama' => 'Aan',
        //     'username' => 'aan123',
        //     'jenis_kelamin' => 'L',
        //     'email' => 'firdausnanda46@gmail.com',
        //     'no_telepon' => '088227032410',
        //     'alamat' => 'Malang',
        //     'level' => 'superadmin',
        //     'password' => Hash::make('password')
        // ]);
        
        // User::create([
        //     'nama' => 'Agus',
        //     'username' => 'agus123',
        //     'jenis_kelamin' => 'L',
        //     'email' => 'agus@gmail.com',
        //     'no_telepon' => '088227032410',
        //     'alamat' => 'Malang',
        //     'level' => 'admin',
        //     'password' => Hash::make('password')
        // ]);

        // User::create([
        //     'nama' => 'Doni',
        //     'username' => 'doni123',
        //     'jenis_kelamin' => 'L',
        //     'email' => 'doni@gmail.com',
        //     'no_telepon' => '088227032410',
        //     'alamat' => 'Malang',
        //     'level' => 'user',
        //     'password' => Hash::make('password')
        // ]);

        User::factory(100)->create();
    }
}
