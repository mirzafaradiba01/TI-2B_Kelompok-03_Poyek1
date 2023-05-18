<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JenisLaundryController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransaksiController;
use App\Models\HomePage;
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
    Route::resource('/pelanggan', PelangganController::class)->parameter('pelanggan', 'id');
    Route::resource('/create_pelanggan', PelangganController::class)->parameter('pelanggan', 'id');
    Route::resource('/petugas', PetugasController::class)->parameter('petugas', 'id');
    Route::resource('/status', StatusController::class)->parameter('status', 'id');
    Route::resource('/transaksi', TransaksiController::class)->parameter('transaksi', 'id');
    Route::resource('/order', OrderController::class)->parameter('jenis_laundry', 'id');
    Route::resource('/komplain', KomplainController::class)->parameter('komplain', 'id');
    Route::resource('/jenis_laundry', JenisLaundryController::class)->parameter('jenis_laundry', 'id');

});

Route::middleware(['auth','checkrole:pelanggan'])->group( function() {
    Route::resource('/homepage', HomePageController::class)->parameter('homepage', 'id');
});


