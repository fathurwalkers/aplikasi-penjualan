<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/login/post-login', [BackController::class, 'postlogin'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => '/produk'], function () {
        Route::get('/daftar-produk', [ProdukController::class, 'daftar_produk'])->name('daftar-produk');
    });

    Route::group(['prefix' => '/penjualan'], function () {
        Route::get('/daftar-penjualan', [PenjualanController::class, 'daftar_penjualan'])->name('daftar-penjualan');
    });
});
