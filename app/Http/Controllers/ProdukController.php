<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class ProdukController extends Controller
{
    public function daftar_produk($kategori)
    {
        $barang = Barang::where('barang_kategori', $kategori)->get();
        return view('dashboard.produk.daftar-produk', [
            'barang' => $barang,
            'kategori' => $kategori
        ]);
    }
}
