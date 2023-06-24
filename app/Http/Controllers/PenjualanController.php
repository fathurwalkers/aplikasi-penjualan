<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function daftar_penjualan()
    {
        return view('dashboard.penjualan.daftar-penjualan');
    }
}
