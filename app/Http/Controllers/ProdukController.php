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
        $produk = Barang::find($id);
        $kategori = $produk->barang_kategori;
        $update_produk = $produk->update([
            'barang_nama' => $request->barang_nama,
            'barang_nama' => $request->barang_nama,
            'barang_kategori' => $request->barang_kategori,
            'barang_ukuran' => $request->barang_ukuran,
            'updated_at' => now()
        ]);
        if ($update_produk == true) {
            return redirect()->route('daftar-produk', $produk->barang_kategori)->with('status', 'Produk telah berhasil diubah.');
        } else {
            return redirect()->route('daftar-produk', $kategori)->with('status', 'Terjadi kesalahan. Data tidak dapat diubah.');
        }
    }

    public function tambah_produk(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $produk = new Barang;
        $kategori = $request->kategori;
        $random_kode = "BRG" . Str::random(5);
        $kode_produk = strtoupper($random_kode);
        $save_produk = $produk->create([
            'barang_kode' => $kode_produk,
            'barang_nama' => $request->barang_nama,
            'barang_kategori' => $request->barang_kategori,
            'barang_ukuran' => $request->barang_ukuran,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if ($save_produk == true) {
            return redirect()->route('daftar-produk', $save_produk->barang_kategori)->with('status', 'Produk telah berhasil dibuat.');
        } else {
            return redirect()->route('daftar-produk', $kategori)->with('status', 'Terjadi kesalahan. Data tidak dapat dibuat.');
        }
    }
}
