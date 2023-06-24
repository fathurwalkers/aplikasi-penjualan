<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeramalanController extends Controller
{
    public function perhitungan_peramalan()
    {
        return view('dashboard.peramalan.perhitungan-peramalan');
    }
}
