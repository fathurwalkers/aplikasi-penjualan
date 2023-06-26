<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PeramalanController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/login/post-login', [BackController::class, 'postlogin'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::get('/', fn () => redirect()->route('dashboard'));

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => '/peramalan'], function () {
        Route::get('/perhitungan-peramalan', [PeramalanController::class, 'perhitungan_peramalan'])->name('perhitungan-peramalan');
    });

    Route::group(['prefix' => '/laporan'], function () {
        Route::get('/laporan-penjualan', [LaporanController::class, 'laporan_penjualan'])->name('laporan-penjualan');
    });

    Route::group(['prefix' => '/produk'], function () {
        Route::get('/daftar-produk', [ProdukController::class, 'daftar_produk'])->name('daftar-produk');
    });

    Route::group(['prefix' => '/penjualan'], function () {
        Route::get('/daftar-penjualan', [PenjualanController::class, 'daftar_penjualan'])->name('daftar-penjualan');
    });
});
