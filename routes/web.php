<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// akan diarahkan ke form login saat pertama kali membuka halaman
Route::get('/', function() {
    return view('layouts.login');
});

// menambahkan authentikasi buat login akun
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                                 *
 * penggunaan role akun masih tahap percobaan dan  *
 * masih perlu perbaikan (ada error)               *
 *                                                 *
 * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

// membuat middleware untuk mengecek level user
// setelah login sebagai admin, maka admin dapat mengakses halaman dibawah ini
Route::middleware(['auth','checkrole:admin,petugas'])->group( function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // controller pelanggan sam petugas belum di setting
    // sama viewnya
    Route::resource('/pelanggan', PelangganController::class)->parameter('pelanggan', 'id');
    Route::resource('/petugas', PetugasController::class)->parameter('petugas', 'id');
});

Route::middleware(['auth','checkrole:pelanggan'])->group( function() {
    // di sini buat akses halaman khusus pelanggan (kayak homepage, etc)
    // belum tak setting
});
