<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\{Str, Arr};
use App\Models\Barang;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function daftar_penjualan($kategori)
    {
        $array_bulan = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $penjualan = Penjualan::whereHas('barang', function ($query) use ($kategori) {
            $query->where('barang_kategori', $kategori);
        })->get();
        $produk = Barang::all();
        return view('dashboard.penjualan.daftar-penjualan', [
            'penjualan' => $penjualan,
            'array_bulan' => $array_bulan,
            'array_bulan1' => $array_bulan,
            'array_bulan2' => $array_bulan,
            'produk' => $produk,
        ]);
    }

    public function hapus_penjualan(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);
        $kategori = $penjualan->barang->barang_kategori;
        $hapus_produk = $penjualan->forceDelete();
        if ($hapus_produk == true) {
            return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Penjualan telah berhasil dihapus!');
        } else {
            return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }

    public function update_penjualan(Request $request, $id)
    {
        $tahun = $request->tahun;
        $jumlah_penjualan = $request->jumlah_penjualan;
        $penjualan = Penjualan::find($id);
        $kategori = $penjualan->barang->barang_kategori;
        // dump($penjualan);

        if ($tahun == null || $jumlah_penjualan == null) {
            $th = $penjualan->penjualan_tahun;
            $jp = $penjualan->penjualan_jumlah;
            $update_penjualan = $penjualan->update([
                'penjualan_tahun' => $th,
                'penjualan_jumlah' => $jp,
                'updated_at' => now()
            ]);
            // dd($update_penjualan);
            if ($update_penjualan == true) {
                return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Penjualan telah berhasil diubah!');
            } else {
                return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Terjadi kesalahan. Data tidak dapat diubah.');
            }
        } else {
            $th = intval($tahun);
            $jp = intval($jumlah_penjualan);

            $update_penjualan = $penjualan->update([
                'penjualan_tahun' => $th,
                'penjualan_jumlah' => $jp,
                'updated_at' => now()
            ]);
            // dd($update_penjualan);
            if ($update_penjualan == true) {
                return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Penjualan telah berhasil diubah!');
            } else {
                return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Terjadi kesalahan. Data tidak dapat diubah.');
            }
        }
    }

    public function tambah_penjualan(Request $request)
    {
        $req_bulan_awal = $request->bulan_awal;
        $req_bulan_akhir = $request->bulan_akhir;
        $barang_id = intval($request->id_produk);

        $barang = Barang::find($barang_id);
        $kategori = $barang->barang_kategori;

        $tahun = $request->tahun;
        $jumlah_penjualan = $request->jumlah_penjualan;

        $bulan_awal = $tahun . '-' . $req_bulan_awal . '-01';
        $bulan_akhir = $tahun . '-' . $req_bulan_akhir . '-01';

        $penjualan = new Penjualan;
        $save_penjualan = $penjualan->create([
            'penjualan_tahun' => intval($tahun),
            'penjualan_jumlah' => intval($jumlah_penjualan),
            'penjualan_bulan_awal' => date("Y-m-d", strtotime($bulan_awal)),
            'penjualan_bulan_akhir' => date("Y-m-d", strtotime($bulan_akhir)),
            'barang_id' => $barang->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_penjualan->save();
        if ($save_penjualan == true) {
            return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Penjualan telah berhasil dibuat.');
        } else {
            return redirect()->route('daftar-penjualan', $kategori)->with('status', 'Terjadi kesalahan. Data tidak dapat dibuat.');
        }
    }

    public function cek_penjualan(Request $request)
    {
        $session_users = session('data_login');
        $session_penjualan = session('penjualan');

        if ($session_penjualan !== null) {
            $request->session()->forget(['penjualan', 'bulan_awal', 'bulan_akhir']);
        }
        $array_bulan = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $array_kategori = ['SD', 'SMP', 'SMA'];
        return view('dashboard.penjualan.cek-penjualan', [
            'array_bulan' => $array_bulan,
            'array_kategori' => $array_kategori
        ]);
    }

    public function print_laporan_penjualan()
    {
        $penjualan = session('penjualan');
        $bulan_awal = session('bulan_awal');
        $bulan_akhir = session('bulan_akhir');
        return view('dashboard.penjualan.print-laporan-penjualan', [
            'penjualan' => $penjualan,
            'bulan_awal' => $bulan_awal,
            'bulan_akhir' => $bulan_akhir,
        ]);
    }

    public function data_penjualan(Request $request)
    {
        $tahun = $request->tahun;
        $barangKategori = $request->kategori;
        $bulan_awal = $request->bulan_awal;
        $bulan_akhir = $request->bulan_akhir;
        $make_bulan_awal = $tahun . "-" . $bulan_awal . "-01";
        $make_bulan_akhir = $tahun . "-" . $bulan_akhir . "-01";
        if ($bulan_awal == $bulan_akhir) {
            $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', $bulan_awal)->whereHas('barang', function ($query) use ($barangKategori) {
                $query->where('barang_kategori', $barangKategori);
            })->get();
            $session_penjualan = session(['penjualan' => $penjualan]);
            $session_bulan_awal = session(['bulan_awal' => $make_bulan_awal]);
            $session_bulan_akhir = session(['bulan_akhir' => $make_bulan_akhir]);
        } else {
            $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', '>=', $bulan_awal)->whereMonth('penjualan_bulan_akhir', '<=', $bulan_akhir)->whereHas('barang', function ($query) use ($barangKategori) {
                $query->where('barang_kategori', $barangKategori);
            })->get();
            $session_penjualan = session(['penjualan' => $penjualan]);
            $session_bulan_awal = session(['bulan_awal' => $make_bulan_awal]);
            $session_bulan_akhir = session(['bulan_akhir' => $make_bulan_akhir]);
        }
        $index_count = 1;
        return view('dashboard.penjualan.data-penjualan', [
            'penjualan' => $penjualan,
            'index_count' => $index_count,
            'bulan_awal' => $make_bulan_awal,
            'bulan_akhir' => $make_bulan_akhir,
            'tahun' => $tahun,
        ]);
    }

    public function generate_penjualan_1()
    {
        $faker = Faker::create('id_ID');
        $produk = Barang::all();
        foreach ($produk as $item) {
            $array_bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $cek_val = intval($item1) + 1;
                if ($cek_val >= 12) {
                    $cek_val = 12;
                }
                $bulan_awal = '2023-' . $item1 . '-01';
                $bulan_akhir = '2023-' . $cek_val . '-01';
                $save_penjualan = $penjualan->create([
                    'penjualan_tahun' => 2023,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan_awal' => date("Y-m-d", strtotime($bulan_awal)),
                    'penjualan_bulan_akhir' => date("Y-m-d", strtotime($bulan_akhir)),
                    'barang_id' => $item->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $save_penjualan->save();
            }
        }
    }

    public function generate_penjualan_2()
    {
        $faker = Faker::create('id_ID');
        $produk = Barang::all();
        foreach ($produk as $item) {
            $array_bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $cek_val = intval($item1) + 1;
                if ($cek_val >= 12) {
                    $cek_val = 12;
                }
                $bulan_awal = '2023-' . $item1 . '-01';
                $bulan_akhir = '2023-' . $cek_val . '-01';
                $save_penjualan = $penjualan->create([
                    'penjualan_tahun' => 2023,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan_awal' => date("Y-m-d", strtotime($bulan_awal)),
                    'penjualan_bulan_akhir' => date("Y-m-d", strtotime($bulan_akhir)),
                    'barang_id' => $item->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $save_penjualan->save();
            }
        }
    }

    public function generate_penjualan_3()
    {
        $faker = Faker::create('id_ID');
        $produk = Barang::all();
        foreach ($produk as $item) {
            $array_bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $cek_val = intval($item1) + 1;
                if ($cek_val >= 12) {
                    $cek_val = 12;
                }
                $bulan_awal = '2023-' . $item1 . '-01';
                $bulan_akhir = '2023-' . $cek_val . '-01';
                $save_penjualan = $penjualan->create([
                    'penjualan_tahun' => 2023,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan_awal' => date("Y-m-d", strtotime($bulan_awal)),
                    'penjualan_bulan_akhir' => date("Y-m-d", strtotime($bulan_akhir)),
                    'barang_id' => $item->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $save_penjualan->save();
            }
        }
    }

    public function generate_penjualan_4()
    {
        $faker = Faker::create('id_ID');
        $produk = Barang::all();
        foreach ($produk as $item) {
            $array_bulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $cek_val = intval($item1) + 1;
                if ($cek_val >= 12) {
                    $cek_val = 12;
                }
                $bulan_awal = '2023-' . $item1 . '-01';
                $bulan_akhir = '2023-' . $cek_val . '-01';
                $save_penjualan = $penjualan->create([
                    'penjualan_tahun' => 2023,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan_awal' => date("Y-m-d", strtotime($bulan_awal)),
                    'penjualan_bulan_akhir' => date("Y-m-d", strtotime($bulan_akhir)),
                    'barang_id' => $item->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $save_penjualan->save();
            }
        }
    }
}
