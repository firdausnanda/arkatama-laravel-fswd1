<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation Validator
        $validasi = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'        
        ]);

        if ($validasi->fails()) {
            return ResponseFormatter::error($validasi->messages(), 'data gagal disimpan', 400);
        }
        
        $user = User::where('email', $request->email)->first();
        
        if (! $user || ! Hash::check($request->password, $user->password)) {            
            return ResponseFormatter::error(null, 'Data login tidak sesuai', 400);
        }

        $token = $user->createToken($request->email)->plainTextToken;
     
        return ResponseFormatter::success(['token' => $token], 'data sudah di otentikasi');
    }

    public function logout(Request $request) 
    {
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });
        // $user = User::all();
        // $user->tokens()->delete();
        return ResponseFormatter::success(null, 'data berhasil logout');
    }
}
