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

    public function hapus_produk(Request $request, $id)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $produk = Barang::find($id);
        die;
    }

    public function update_produk(Request $request, $id)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $produk = Barang::find($id);
        die;
    }

    public function tambah_produk(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $produk = new Barang;
        die;
    }
}
