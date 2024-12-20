<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController; 
use App\Http\Controllers\ProdukController; 

// Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
// Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
// Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');

// Membuat Admin
Route::get('/make-admin', [ProdukController::class, 'makeAdmin']);


// Rute untuk halaman depan (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Rute middleware auth untuk mengakses dan mengubah profil pengguna
Route::middleware('auth', 'verified')->group(function () {
    // Rute untuk dashboard, membutuhkan autentikasi dan verifikasi email
    Route::resource('produk', ProdukController::class);
    Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');
    Route::get('/visimisi', [PageController::class, 'visimisi'])->name('visimisi');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
    Route::get('/pemesanan', [PageController::class, 'pemesanan'])->name('pemesanan');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/trashed', [ProdukController::class, 'trashed'])->name('produk.trashed');
    Route::post('/produk/{id}/restore', [ProdukController::class, 'restore'])->name('produk.restore');
    Route::delete('/produk/{id}/forceDelete', [ProdukController::class, 'forceDelete'])->name('produk.forceDelete');    


});

// Memuat rute autentikasi yang didefinisikan oleh Breeze
require __DIR__.'/auth.php';
