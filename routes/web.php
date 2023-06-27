<?php

use App\Http\Controllers\{BackController, LaporanController, ProdukController, PenjualanController, PeramalanController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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
        Route::get('/', fn () => redirect()->route('daftar-produk', 'SD'));
        Route::get('/daftar-produk/{kategori}', [ProdukController::class, 'daftar_produk'])->name('daftar-produk');
        Route::post('/tambah-produk', [ProdukController::class, 'tambah_produk'])->name('tambah-produk');
        Route::post('/update-produk/{id}', [ProdukController::class, 'update_produk'])->name('update-produk');
        Route::post('/hapus-produk/{id}', [ProdukController::class, 'hapus_produk'])->name('hapus-produk');
    });

    Route::group(['prefix' => '/penjualan'], function () {
        Route::get('/', fn () => redirect()->route('daftar-penjualan'));
        Route::get('/daftar-penjualan/{kategori}', [PenjualanController::class, 'daftar_penjualan'])->name('daftar-penjualan');
        Route::get('/cek-penjualan', [PenjualanController::class, 'cek_penjualan'])->name('cek-penjualan');
        Route::post('/data-penjualan', [PenjualanController::class, 'data_penjualan'])->name('data-penjualan');
        Route::get('/generate-penjualan-1', [PenjualanController::class, 'generate_penjualan_1'])->name('generate-penjualan-1');
        Route::get('/generate-penjualan-2', [PenjualanController::class, 'generate_penjualan_2'])->name('generate-penjualan-2');
        Route::get('/generate-penjualan-3', [PenjualanController::class, 'generate_penjualan_3'])->name('generate-penjualan-3');
        Route::get('/generate-penjualan-4', [PenjualanController::class, 'generate_penjualan_4'])->name('generate-penjualan-4');
    });
});
