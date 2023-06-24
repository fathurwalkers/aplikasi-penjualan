<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function daftar_produk()
    {
        return view('dashboard.produk.daftar-produk');
    }
}
