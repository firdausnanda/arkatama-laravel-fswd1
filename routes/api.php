<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PenerbitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/tes', function(){
//     return 'tes api';
// });

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('penerbit', PenerbitController::class)
          ->only('index', 'store', 'update', 'destroy', 'show')
          ->middleware('auth:sanctum');

// Route::get('/penerbit', [PenerbitController::class, 'index']);
// Route::post('/penerbit', [PenerbitController::class, 'store']);
// Route::put('/penerbit', [PenerbitController::class, 'update']);
