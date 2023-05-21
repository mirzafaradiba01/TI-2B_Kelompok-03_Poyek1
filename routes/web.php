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
use App\Http\Controllers\StatusPetugasController;
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


    // Rute untuk submit order dan mengarahkan ke halaman tampilan transaksi
    Route::post('/order/submit', [OrderController::class, 'submit'])->name('admin.order.submit');
});



    // Route untuk update status laundry petugas
    Route::resource('/status_petugas', StatusPetugasController::class)->parameter('status', 'id')->names('petugas.status_petugas');
});

// --- middleware untuk pelanggan
Route::middleware(['auth', 'checkrole:pelanggan'])->prefix('pelanggan')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'pelanggan'])->name('pelanggan.dashboard');
    Route::resource('/status', StatusController::class)->parameter('status', 'id')->names('petugas.status');
    Route::resource('/ayalaundry', HomePageController::class)->parameters(['index' => 'id'])->names(['index' => 'pelanggan.index']);
});
