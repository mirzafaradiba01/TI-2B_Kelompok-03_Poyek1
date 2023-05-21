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

// --- middleware untuk admin
Route::middleware(['auth', 'checkrole:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    // admin dapat mengakses data pelanggan
    Route::resource('/pelanggan', PelangganController::class)->parameter('pelanggan', 'id')->names('admin.pelanggan');

    // admin dapat mengakses data petugas
    Route::resource('/petugas', PetugasController::class)->parameter('petugas', 'id')->names('admin.petugas');

    // admin dapat mengakses transaksi dan order
    Route::resource('/transaksi', TransaksiController::class)->parameter('transaksi', 'id')->names('admin.transaksi');
    Route::resource('/order', OrderController::class)->parameter('order', 'id')->names('admin.order');
    Route::resource('/status', StatusController::class)->parameter('status', 'id')->names('admin.status');

    // admin dapat mengakses data jenis laundry dan komplain
    Route::resource('/komplain', KomplainController::class)->parameter('komplain', 'id')->names('admin.komplain');
    Route::resource('/jenis_laundry', JenisLaundryController::class)->parameter('jenis_laundry', 'id')->names('admin.jenis_laundry');


    // ----- route di bawah masih dalam percobaan
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::resource('/status_admin', StatusController::class)->parameter('status', 'id')->names('admin.status_admin');
    Route::resource('/create_pelanggan', PelangganController::class)->parameter('pelanggan', 'id')->names('admin.create_pelanggan');

    // Route untuk mencari kode order di halaman website
    Route::get('/cariorder', [OrderController ::class,'searching'])->name('admin.cariorder');

    // Route untuk update status laundry petugas
    Route::resource('/status_petugas', StatusPetugasController::class)->parameter('status', 'id')->names('admin.status_petugas');

    // Rute untuk submit order dan mengarahkan ke halaman tampilan transaksi
    Route::post('/order/submit', [OrderController::class, 'submit'])->name('admin.order.submit');
});

// --- middleware untuk petugas
Route::middleware(['auth', 'checkrole:petugas'])->prefix('petugas')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'petugas'])->name('petugas.dashboard');
    Route::resource('/petugas', PetugasController::class)->parameter('petugas', 'id')->names('petugas.petugas');
    Route::resource('/pelanggan', PelangganController::class)->parameter('pelanggan', 'id')->names('petugas.pelanggan');

    // Route untuk update status laundry petugas
    Route::resource('/status_petugas', StatusPetugasController::class)->parameter('status', 'id')->names('petugas.status_petugas');
});

// --- middleware untuk pelanggan
Route::middleware(['auth', 'checkrole:pelanggan'])->prefix('pelanggan')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'pelanggan'])->name('pelanggan.dashboard');
    Route::resource('/status', StatusController::class)->parameter('status', 'id')->names('petugas.status');
    Route::resource('/ayalaundry', HomePageController::class)->parameters(['index' => 'id'])->names(['index' => 'pelanggan.index']);
});
