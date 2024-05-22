<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/proses-login', [LoginController::class, 'autentikasi']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/', [PenerbitController::class, 'index']);
    
    Route::group(['prefix' => 'penerbit', 'middleware' => 'is_superadmin'], function(){
        Route::post('/', [PenerbitController::class, 'store']);
        Route::put('/', [PenerbitController::class, 'update']);
        Route::delete('/', [PenerbitController::class, 'destroy']);
        Route::get('/create', [PenerbitController::class, 'create']);
        Route::get('/edit/{id}', [PenerbitController::class, 'edit']);
    });
});

// Route::get('/hello', function() {
//     return 'Hallo nama saya aan';
// });

// Route::redirect('/nama', '/hello');

Route::fallback(function () {
    return view('error');
});

// Route::get('/data', [ProdukController::class, 'index']);
// Route::get('/produk', [ProdukController::class, 'data']);

// Route::get('/produk/{nama}', function ($nama) {
//     return 'Produknya adalah : ' . $nama;
// });
