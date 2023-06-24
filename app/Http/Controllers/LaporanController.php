<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan_penjualan()
    {
        return view('dashboard.laporan.laporan-penjualan');
    }
}
