<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => '/produk'], function () {
        Route::get('/daftar-produk', [ProdukController::class, 'daftar_produk'])->name('daftar-produk');
    });

    Route::group(['prefix' => '/penjualan'], function () {
        Route::get('/daftar-penjualan', [PenjualanController::class, 'daftar_penjualan'])->name('daftar-penjualan');
    });
});
