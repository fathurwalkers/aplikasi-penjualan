<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
});
