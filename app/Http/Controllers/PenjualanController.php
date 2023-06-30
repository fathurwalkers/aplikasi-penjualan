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
        $penjualan = Penjualan::whereHas('barang', function ($query) use ($kategori) {
            $query->where('barang_kategori', $kategori);
        })->get();
        return view('dashboard.penjualan.daftar-penjualan', [
            'penjualan' => $penjualan,
            'kategori' => $kategori
        ]);
    }

    public function cek_penjualan()
    {
        $array_bulan = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $array_kategori = ['SD', 'SMP', 'SMA'];
        return view('dashboard.penjualan.cek-penjualan', [
            'array_bulan' => $array_bulan,
            'array_kategori' => $array_kategori
        ]);
    }

    public function data_penjualan(Request $request)
    {
        $barangKategori = $request->kategori;
        $bulan_awal = $request->bulan_awal;
        $bulan_akhir = $request->bulan_akhir;
        $tahun = $request->tahun;
        if ($bulan_awal == $bulan_akhir) {
            $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', $bulan_awal)->whereHas('barang', function ($query) use ($barangKategori) {
                $query->where('barang_kategori', $barangKategori);
            })->get();
        } else {
            $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', '>=', $bulan_awal)->whereMonth('penjualan_bulan_akhir', '<=', $bulan_akhir)->whereHas('barang', function ($query) use ($barangKategori) {
                $query->where('barang_kategori', $barangKategori);
            })->get();
        }
        $index_count = 1;
        return view('dashboard.penjualan.data-penjualan', [
            'penjualan' => $penjualan,
            'index_count' => $index_count,
            'bulan_awal' => $bulan_awal,
            'bulan_akhir' => $bulan_akhir,
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
