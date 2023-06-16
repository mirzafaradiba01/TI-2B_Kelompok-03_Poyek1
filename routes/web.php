<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JenisLaundryController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusPetugasController;
use App\Http\Controllers\TransaksiController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// akan diarahkan ke halaman index saat pertama kali membuka halaman
Route::get('/', function() {
    return view('index');
});

// menambahkan authentikasi buat login akun
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

// --- middleware untuk admin
Route::middleware(['auth', 'checkrole:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    // admin dapat mengakses data pelanggan
    Route::resource('/pelanggan', PelangganController::class)->parameter('pelanggan', 'id')->names('admin.pelanggan');
    Route::post('/pelanggan/data', [PelangganController::class, 'data']);
    Route::post('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);
    Route::resource('/create_pelanggan', PelangganController::class)->parameter('pelanggan', 'id')->names('admin.create_pelanggan');

    // admin dapat mengakses data petugas
    Route::resource('/petugas', PetugasController::class)->parameter('petugas', 'id')->names('admin.petugas');
    Route::post('/petugas/data', [PetugasController::class, 'data']);
    Route::post('/petugas/delete/{id}', [PetugasController::class, 'destroy']);

    // admin dapat mengakses transaksi dan order
    Route::resource('/transaksi', TransaksiController::class)->parameter('transaksi', 'id')->names('admin.transaksi');
    Route::post('/transaksi/data', [TransaksiController::class, 'data']);

    Route::resource('/order', OrderController::class)->parameter('order', 'id')->names('admin.order');
    Route::resource('/status', StatusController::class)->parameter('status', 'id')->names('admin.status');
    Route::post('/status/data', [StatusController::class, 'data_status_admin']);

    // admin dapat mengakses data jenis laundry dan komplain
    Route::resource('/komplain', KomplainController::class)->parameter('komplain', 'id')->names('admin.komplain');
    Route::post('/komplain/data', [KomplainController::class, 'data']);

    Route::resource('/jenis_laundry', JenisLaundryController::class)->parameter('jenis_laundry', 'id')->names('admin.jenis_laundry');
    Route::post('/jenis_laundry/data', [JenisLaundryController::class, 'data']);
    Route::post('/jenis_laundry/delete/{id}', [JenisLaundryController::class, 'destroy']);

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::resource('/status_admin', StatusController::class)->parameters(['status_admin' => 'id'])->names('admin.status_admin');
    Route::resource('/status_petugas', StatusPetugasController::class)->parameter('status', 'id')->names('admin.status_petugas');

    // Rute untuk submit order dan mengarahkan ke halaman tampilan transaksi
    Route::post('/order/submit', [OrderController::class, 'submit'])->name('admin.order.submit');
    Route::get('/order_selesai', [OrderController::class, 'order_selesai']);

    //admin mengakses cetak laporan transaksi
    Route::get('/form_cetak', [TransaksiController::class, 'show_form'])->name('admin.form_cetak');
    Route::post('/cetak_laporan', [TransaksiController::class, 'cetak_laporan'])->name('admin.cetak_laporan');
    Route::post('/transaksi/cetak_laporan', [TransaksiController::class, 'cetak_laporan']);
});

// --- middleware untuk petugas
Route::middleware(['auth', 'checkrole:petugas'])->prefix('petugas')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'petugas'])->name('petugas.dashboard');
    Route::resource('/petugas', PetugasController::class)->parameter('petugas', 'id')->names('petugas.petugas');
    Route::post('/status/data', [StatusController::class, 'data_status_admin']);

    Route::resource('/pelanggan', PelangganController::class)->parameter('pelanggan', 'id')->names('petugas.pelanggan');
    Route::post('/pelanggan/data', [PelangganController::class, 'data']);

    Route::resource('/status_petugas', StatusPetugasController::class)->parameter('status', 'id')->names('petugas.status_petugas');
    Route::post('/update_status/{id}', [StatusPetugasController::class, 'update_status']);
});

// --- middleware untuk pelanggan
Route::middleware(['auth', 'checkrole:pelanggan'])->prefix('pelanggan')->group(function () {
    Route::resource('/status', StatusController::class)->parameter('status', 'id')->names('petugas.status');
    Route::resource('/komplain', KomplainController::class)->parameters(['komplain' => 'id'])->names(['pelanggan.komplain'])->except(['create']);
    Route::resource('/ayalaundry', HomePageController::class)->parameters(['index' => 'id'])->names(['index' => 'pelanggan.index']);

    Route::post('/komplain/data', [KomplainController::class, 'data']);
    Route::post('/status/data', [StatusController::class, 'data_status_pelanggan']);

    Route::get('/dashboard', [DashboardController::class, 'pelanggan'])->name('pelanggan.dashboard');
    Route::get('/komplain/create/{id}', [KomplainController::class, 'create']);
    Route::get('/status/{id}', [StatusController::class, 'status_pelanggan']);

    Route::get('/profile', [PelangganController::class, 'profile']);
    Route::get('/edit_data', [PelangganController::class, 'edit_data']);
    Route::post('/update_data/{id}', [PelangganController::class, 'update_data']);

    Route::get('/transaksi/cetakNotaLaundry/{id}', [TransaksiController::class, 'cetakNotaLaundry'])->name('notaLaundry.cetak');
});
