<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Untuk halaman yang memerlukan Middleware
Route::middleware(['cek.login', 'only.admin'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('buku', [BukuController::class, 'index']);

    // Route kategori
    Route::get('kategori', [KategoriController::class, 'index']);
    Route::get('tambah-kategori', [KategoriController::class,'tambahKategori']);
    Route::post('tambah-kategori', [KategoriController::class,'store']);
    Route::get('edit-kategori/{slug}', [KategoriController::class,'edit']);
    Route::put('edit-kategori/{slug}', [KategoriController::class,'update']);
    Route::get('delete-kategori/{slug}', [KategoriController::class,'delete']);
    Route::get('destroy-kategori/{slug}', [KategoriController::class,'destroy']);
    Route::get('delete-view-kategori', [KategoriController::class,'deleteView']);
    Route::get('restore-kategori/{slug}', [KategoriController::class,'restore']);



    Route::get('user', [UserController::class, 'index']);
    Route::get('riwayat', [RiwayatController::class, 'index']);
});

// Khusus penyewa
Route::middleware(['cek.login', 'only.user'])->group(function () {
    Route::get('profile', [UserController::class, 'profile']);
});

// Hanya bisa diakses oleh user yang BELUM login (Guest)
Route::middleware(['only.guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class,'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

// Logout - bisa diakses semua user yang sudah login
Route::middleware(['cek.login'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
});
