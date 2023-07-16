<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Penjualan, Barang};

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

        $totalMAPE = 0;
        $totalDataPenjualan = $totalData;

        for ($i = $periode; $i < $totalDataPenjualan; $i++) {
            $nilaiAktual = $penjualan[$i]->penjualan_jumlah;
            $nilaiRamalan = $hasilMovingAverage[$i];

            $mape = abs(($nilaiAktual - $nilaiRamalan) / $nilaiAktual) * 100;
            $totalMAPE += $mape;
        }

        // =========================================================================================================
        // =========================================================================================================

        // // Define the sales data
        // $sales = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

        // // Define the number of periods to forecast
        // $periods = 3;

        // // Calculate the SMA
        // $sma = collect($sales)->take(-$periods)->average();

        // // Define the actual sales data for the forecast period
        // $actual = [110, 120, 130];

        // // Calculate the forecast sales data for the forecast period
        // $forecast = array_fill(0, $periods, $sma);

        // // Calculate the MAPE
        // $mape = collect($actual)->zip($forecast)->map(function ($item) {
        //     return abs(($item[0] - $item[1]) / $item[0]);
        // })->average() * 100;

        // // Output the results
        // echo "SMA: " . $sma . "\n";
        // echo "Forecast: " . implode(", ", $forecast) . "\n";
        // echo "Actual: " . implode(", ", $actual) . "\n";
        // echo "MAPE: " . $mape . "%\n";

        // =========================================================================================================
        // =========================================================================================================

        $maper = $totalMAPE / ($totalDataPenjualan - $periode);
        $session_hasilmovingaverage = session(['hasilMovingAverage' => $hasilMovingAverage]);
        $session_penjualan = session(['penjualan' => $penjualan]);
        $session_maper = session(['maper' => $maper]);
        return view('dashboard.peramalan.hasil-peramalan', [
            'hasilMovingAverage' => $hasilMovingAverage,
            'penjualan' => $penjualan,
            'maper' => $maper
        ]);
    }

    public function print_peramalan_penjualan()
    {
        $penjualan = session('penjualan');
        $hasilMovingAverage = session('hasilMovingAverage');
        $maper = session('maper');
        return view('dashboard.peramalan.print-laporan-peramalan', [
            'penjualan' => $penjualan,
            'hasilMovingAverage' => $hasilMovingAverage,
            'maper' => $maper,
        ]);
    }
}
