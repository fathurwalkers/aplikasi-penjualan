<?php

use App\Http\Controllers\{BackController, LaporanController, ProdukController, PenjualanController, PeramalanController};
// use App\Http\Controllers\LaporanController;
// use App\Http\Controllers\ProdukController;
// use App\Http\Controllers\PenjualanController;
// use App\Http\Controllers\PeramalanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/login/post-login', [BackController::class, 'postlogin'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::get('/', fn () => redirect()->route('dashboard'));
// Route::get('/', function () {
//     $string = "hayatsipalingenskripsi";
//     $string2 = "hayatsipalingenskripsi";

//     $hashString1 = Hash::make($string, [
//         'rounds' => 12,
//     ]);
//     $hashString2 = Hash::make($string2, [
//         'rounds' => 12,
//     ]);

//     dump($string);
//     dump($string2);
//     dump($hashString1);
//     dump($hashString2);
//     die;
// });

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
