<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenerbitRequest;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function index() {
        $penerbit = Penerbit::all();
        $judul = 'Penerbit';
        return view('pages.penerbit.index', compact('penerbit', 'judul'));
    }

    public function create() {
        $judul = 'Tambah Data';
        return view('pages.penerbit.store', compact('judul'));
    }

    public function store(StorePenerbitRequest $request)
    {
        // Validation controller
        // $validasi = $request->validate([
        //     'nama_penerbit' => 'required|string|max:255',
        //     'alamat' => 'required|string',
        //     'no_telepon' => 'required|numeric|unique:penerbit,no_telepon',
        //     'tanggal_berdiri' => 'required'
        // ]);

        // Validation Validator
        $validasi = Validator::make($request->all(), [
            'nama_penerbit' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|numeric|unique:penerbit,no_telepon|max_digits:13',
            'tanggal_berdiri' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect('/create')
                        ->withErrors($validasi)
                        ->withInput();
        }
        
        Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'tanggal_berdiri' => $request->tanggal_berdiri
        ]);

        return redirect('/');
    }

    public function edit($id){
        $penerbit = Penerbit::where('id', $id)->first();
        $judul = 'Edit Data';
        return view('pages.penerbit.edit', compact('penerbit', 'judul'));
    }

    public function update(Request $request){
        
        Penerbit::where('id', $request->id)->update([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon
        ]);

        return redirect('/');
    }

    public function destroy(Request $request){
        Penerbit::where('id', $request->id)->delete();
        return redirect('/');
    }
}
