<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// menambahkan authentikasi buat login akun
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

// membuat middleware untuk mengecek level user
Route::middleware(['auth'])->group( function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // setelah login sebagai admin, maka admin dapat mengakses halaman dibawah ini
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin', AdminController::class);
    Route::resource('pelanggan', PelangganController::class);
});
