<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\SessionController;
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

// Rute halaman utama
Route::get('/', [HalamanController::class, 'index']);
Route::get('/kontak', [HalamanController::class, 'kontak']);
Route::get('/tentang', [HalamanController::class, 'tentang']);

// Rute khusus untuk akun
Route::get('/akun/cetak', [AkunController::class, 'cetak'])->middleware('isLogin');

// Resource route untuk akun
Route::resource('akun', AkunController::class)->middleware('isLogin');

// Rute sesi untuk login, logout, dan registrasi
Route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isTamu');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isTamu');

// Rute halaman welcome
Route::get('/', function () {
    return view('sesi/welcome');
})->middleware('isTamu');
