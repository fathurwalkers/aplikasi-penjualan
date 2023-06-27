<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function daftar_produk($kategori)
    {
        switch ($kategori) {
            case 'SD':
                $barang = Barang::where('barang_kategori', 'SD')->get();
                break;
            case 'SMP':
                $barang = Barang::where('barang_kategori', 'SMP')->get();
                break;
            case 'SMA':
                $barang = Barang::where('barang_kategori', 'SMA')->get();
                break;
        }
        return view('dashboard.produk.daftar-produk', [
            'barang' => $barang
        ]);
    }
}
