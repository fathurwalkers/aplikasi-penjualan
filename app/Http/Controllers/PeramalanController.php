<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Penjualan, Barang};
use Illuminate\Support\{Str, Arr};

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

        // $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', '>=', $bulan_awal)->whereMonth('penjualan_bulan_akhir', '<=', $bulan_akhir)->whereHas('barang', function ($query) use ($barang_id) {
        //     $query->where('id', $barang_id);
        // })->get()->toArray();

        // $penjualan = $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', '>=', $bulan_awal)->whereMonth('penjualan_bulan_akhir', '<=', $bulan_akhir)->whereHas('barang', function ($query) use ($barang_id) {
        //     $query->where('id', $barang_id);
        // })->get();

        // $totalData = count($penjualan);
        // $hasilMovingAverage = [];

        // for ($i = 0; $i < $totalData; $i++) {
        //     $start = max(0, $i - $periode + 1);
        //     $end = $i + 1;
        //     $jumlahData = $end - $start;

        //     $totalJumlah = $penjualan->slice($start, $jumlahData)->sum('penjualan_jumlah');
        //     $movingAverage = $totalJumlah / $jumlahData;

        //     $hasilMovingAverage[$i] = $movingAverage;
        // }

        // $totalMAPE = 0;
        // $totalDataPenjualan = $totalData;

        // for ($i = $periode; $i < $totalDataPenjualan; $i++) {
        //     $nilaiAktual = $penjualan[$i]->penjualan_jumlah;
        //     $nilaiRamalan = $hasilMovingAverage[$i];

        //     $mape = abs(($nilaiAktual - $nilaiRamalan) / $nilaiAktual) * 100;
        //     $totalMAPE += $mape;
        // }

        // =========================================================================================================
        // =========================================================================================================

        $penjualan = Penjualan::where('penjualan_tahun', $tahun)->whereMonth('penjualan_bulan_awal', '>=', $bulan_awal)->whereMonth('penjualan_bulan_akhir', '<=', $bulan_akhir)->whereHas('barang', function ($query) use ($barang_id) {
            $query->where('id', $barang_id);
        })->get()->toArray();


        $array_jumlah_penjualan = [];
        foreach ($penjualan as $itemsss) {
            $array_jumlah_penjualan = Arr::prepend($array_jumlah_penjualan, $itemsss['penjualan_jumlah']);
        }

        $totalData = count($penjualan);

        for ($i=0; $i < $totalData; $i++) {
            // // Define the sales data
            $sales = $array_jumlah_penjualan;

            // // Define the number of periods to forecast
            $periods = 3;

            // // Calculate the SMA
            $sma = collect($sales)->take(-$periods)->average();

            // // Define the actual sales data for the forecast period
            $actual = $penjualan[$i]['penjualan_jumlah'];

            // // Calculate the forecast sales data for the forecast period
            $forecast = array_fill(0, $periods, $sma);

            // Calculate the MAPE
            $mape = collect($actual)->zip($forecast)->map(function ($item) {
                if ($item[0] != 0) {
                    return abs(($item[0] - $item[1]) / $item[0]);
                } else {
                    return 0; // or handle the case when the divisor is zero
                }
            })->average();

            dump($sales);
            dump($periods);
            dump($sma);
            dump($forecast);
            dump($mape);
            dd($actual);

        }

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
