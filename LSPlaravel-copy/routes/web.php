<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/login-anggota-page', function () {
    return view('auth.login_anggota');
})->name('login.anggota.page');

Route::get('/register-anggota', [AuthController::class, 'registerAnggota'])->name('register.anggota');
Route::post('/register-anggota', [AuthController::class, 'registerAnggota'])->name('register.anggota.store');

Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/login-anggota', [AuthController::class, 'loginAnggota'])->name('login.anggota');

Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Buku
    Route::resource('buku', BukuController::class);

    // CRUD Anggota
    Route::resource('anggota', AnggotaController::class);

    // CRUD Peminjaman
    Route::resource('peminjaman', PeminjamanController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route untuk anggota yang sudah login
Route::get('/peminjaman-saya', [PeminjamanController::class, 'peminjamanSaya']);
Route::post('/peminjaman/store-anggota', [PeminjamanController::class, 'storeAnggota']);
Route::put('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan']);
