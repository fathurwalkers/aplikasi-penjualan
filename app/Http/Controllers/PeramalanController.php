<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Penjualan, Peramalan, Barang};

class PeramalanController extends Controller
{
    public function perhitungan_peramalan()
    {
        $array_bulan = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $produk = Barang::all();
        return view('dashboard.peramalan.perhitungan-peramalan', [
            'array_bulan' => $array_bulan,
            'produk' => $produk,
        ]);
    }

    public function hasil_peramalan(Request $request)
    {
        $bulan_awal = $request->bulan_awal;
        $bulan_akhir = $request->bulan_akhir;
        $barang_id = intval($request->id_produk);
        $tahun = $request->tahun;
        $periode = $request->periode;

        $penjualan = $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', '>=', $bulan_awal)->whereMonth('penjualan_bulan_akhir', '<=', $bulan_akhir)->whereHas('barang', function ($query) use ($barang_id) {
            $query->where('id', $barang_id);
        })->get();

        $totalData = count($penjualan);
        $hasilMovingAverage = [];

        for ($i = 0; $i < $totalData; $i++) {
            $start = max(0, $i - $periode + 1);
            $end = $i + 1;
            $jumlahData = $end - $start;

            $totalJumlah = $penjualan->slice($start, $jumlahData)->sum('penjualan_jumlah');
            $movingAverage = $totalJumlah / $jumlahData;

            $hasilMovingAverage[$i] = $movingAverage;
        }
        dump($hasilMovingAverage);
        dump($penjualan);
        die;
    }
}
