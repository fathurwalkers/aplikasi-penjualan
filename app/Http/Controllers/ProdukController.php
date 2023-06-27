<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Barang, Login};

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
        $kategori = $produk->barang_kategori;
        $hapus_produk = $produk->forceDelete();
        if ($hapus_produk == true) {
            return redirect()->route('daftar-produk', $kategori)->with('status', 'Produk telah berhasil dihapus!');
        } else {
            return redirect()->route('daftar-produk', $kategori)->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
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
