<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentBukuController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PublicController::class, 'index']);
// Untuk halaman yang memerlukan Middleware -> untuk Admin
Route::middleware(['cek.login', 'only.admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    // Route buku
    Route::get('buku', [BukuController::class, 'index']);
    Route::get('add-buku', [BukuController::class,'add']);
    Route::post('add-buku', [BukuController::class,'store']);
    Route::get('edit-buku/{slug}', [BukuController::class,'edit']);
    Route::post('edit-buku/{slug}', [BukuController::class,'update']);
    Route::get('delete-buku/{slug}', [BukuController::class,'delete']);
    Route::get('destroy-buku/{slug}', [BukuController::class,'destroy']);
    Route::get('delete-view-buku', [BukuController::class,'deleteView']);
    Route::get('restore-buku/{slug}', [BukuController::class,'restore']);
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
    // Route Users
    Route::get('user', [UserController::class, 'index']);
    Route::get('registered-user', [UserController::class,'registeredUser']);
    Route::get('detail-user/{slug}', [UserController::class,'detail']);
    Route::get('approve-user/{slug}', [UserController::class,'approve']);
    Route::get('delete-user/{slug}', [UserController::class,'delete']);
    Route::get('destroy-user/{slug}', [UserController::class,'destroy']);
    Route::get('view-user', [UserController::class,'view']);
    Route::get('restore-user/{slug}', [UserController::class,'restore']);
    Route::get('riwayat', [RiwayatController::class, 'index']);

    // Route Peminjaman
    Route::get('rent-buku', [RentBukuController::class, 'index']);
});

// Untuk Penyewa
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