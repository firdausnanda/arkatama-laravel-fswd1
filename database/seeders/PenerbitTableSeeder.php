<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerbitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penerbit::create([
            'nama_penerbit' => 'Gramedia',
            'alamat' => 'Jakarta',
            'no_telepon' => '08111111111',
            'tanggal_berdiri'  => now()
        ]);
        
        Penerbit::create([
            'nama_penerbit' => 'Salemba',
            'alamat' => 'Jakarta',
            'no_telepon' => '08111111111',
            'tanggal_berdiri'  => now()
        ]);
        
        Penerbit::create([
            'nama_penerbit' => 'NN',
            'alamat' => 'Jakarta',
            'no_telepon' => '08111111111',
            'tanggal_berdiri'  => now()
        ]);
    }
}
