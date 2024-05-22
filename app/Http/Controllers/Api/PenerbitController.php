<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function index() 
    {
        $data = Penerbit::all();        
        return ResponseFormatter::success($data, 'Data berhasil diambil');
    }

    public function store(Request $request)
    {
        try {
            
            // Validation Validator
            $validasi = Validator::make($request->all(), [
                'nama_penerbit' => 'required|string|max:255',
                'alamat' => 'required|string',
                'no_telepon' => 'required|numeric|unique:penerbit,no_telepon|max_digits:13',
                'tanggal_berdiri' => 'required'
            ]);

            if ($validasi->fails()) {
                return ResponseFormatter::error($validasi->messages(), 'data gagal disimpan', 400);
            }
            
            $data = Penerbit::create([
                'nama_penerbit' => $request->nama_penerbit,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tanggal_berdiri' => $request->tanggal_berdiri
            ]);

            return ResponseFormatter::success($data, 'Data berhasil diambil');
            
        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), 'Server Error');
        }
    }

    public function update(Request $request)
    {
        try {

            // Validation Validator
            $validasi = Validator::make($request->all(), [
                'nama_penerbit' => 'required|string|max:255',
                'alamat' => 'required|string',
                'no_telepon' => 'required|numeric|max_digits:13',
            ]);

            if ($validasi->fails()) {
                return ResponseFormatter::error($validasi->messages(), 'data gagal disimpan', 400);
            }

            $data = Penerbit::where('id', $request->id)->update([
                'nama_penerbit' => $request->nama_penerbit,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon
            ]);

            return ResponseFormatter::success($data, 'Data berhasil diambil');

        } catch (\Throwable $th) {
            return ResponseFormatter::error($th->getMessage(), 'Server Error');
        }

        
    }

    public function show($id)
    {
        $data = Penerbit::where('id', $id)->first();
        return ResponseFormatter::success($data, 'data berhasil diambil');
    }
    
    public function destroy($id)
    {
        $data = Penerbit::where('id', $id)->delete();
        return ResponseFormatter::success($data, 'data berhasil diambil');
    }

}
