<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\{Str, Arr};
use App\Models\Barang;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function daftar_penjualan()
    {
        $penjualan = Penjualan::all()->count();
        dd($penjualan);
        return view('dashboard.penjualan.daftar-penjualan', [
            'penjualan' => $penjualan
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
