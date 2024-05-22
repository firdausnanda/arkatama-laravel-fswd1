<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {

        $produk = [
            [
                'nama_produk' => 'Laptop',
                'harga' => 'Rp. 1.000.000'
            ],
            [
                'nama_produk' => 'Handphone',
                'harga' => 'Rp. 500.000'
            ]
        ];

        return view('pages.album', compact('produk'));
    }

    public function data() {
        return view('pages.data');
    }
}
