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
        $array_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $array_periode = [1,2,3,4];
        $array_kategori = ['SD', 'SMP', 'SMA'];
        return view('dashboard.penjualan.cek-penjualan', [
            'array_bulan' => $array_bulan,
            'array_periode' => $array_periode,
            'array_kategori' => $array_kategori
        ]);
    }

    public function data_penjualan(Request $request)
    {
        $barangKategori = 'SMP';
        $bulan = $request->bulan;
        $periode = $request->periode;
        $penjualan = Penjualan::where(['penjualan_bulan' => $bulan, 'penjualan_periode' => $periode])->whereHas('barang', function ($query) use ($barangKategori) {
            $query->where('barang_kategori', $barangKategori);
        })->get();
        // $penjualan = Penjualan::where(['penjualan_bulan' => $bulan, 'penjualan_periode' => $periode])->whereHas('barang', function ($query) use ($barangKategori) {
        //     $query->where('barang_kategori', $barangKategori);
        // })->get();
        $index_count = 1;
        // foreach ($penjualan->barang as $p) {
        //     $p->where('barang_kategori', 'SMP');
        //     dump($p);
        // }
        // die;
        // dd($penjualan);
        return view('dashboard.penjualan.data-penjualan', [
            'penjualan' => $penjualan,
            'index_count' => $index_count,
            'bulan' => $bulan,
            'periode' => $periode,
        ]);
    }

    public function generate_penjualan_1()
    {
        $faker = Faker::create('id_ID');
        $produk = Barang::all();
        foreach ($produk as $item) {
            $array_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $save_penjualan = $penjualan->create([
                    'penjualan_periode' => 1,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan' => $item1,
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
            $array_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $save_penjualan = $penjualan->create([
                    'penjualan_periode' => 2,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan' => $item1,
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
            $array_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $save_penjualan = $penjualan->create([
                    'penjualan_periode' => 3,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan' => $item1,
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
            $array_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            foreach ($array_bulan as $item1) {
                $penjualan = new Penjualan;
                $save_penjualan = $penjualan->create([
                    'penjualan_periode' => 4,
                    'penjualan_jumlah' => $faker->randomNumber(2),
                    'penjualan_bulan' => $item1,
                    'barang_id' => $item->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $save_penjualan->save();
            }
        }
    }
}
