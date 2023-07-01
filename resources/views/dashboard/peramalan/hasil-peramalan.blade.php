@extends('layouts.dashboard-layouts')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('header-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h5 class="my-auto text-dark">Peramalan - Hasil Perhitungan Simple Moving Average</h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">

            </div>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">

                        <table id="" class="display table table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-dark mr-auto">
                                        Total MAPE : {{ round($maper, 2) }}
                                    </th>
                                </tr>
                            </thead>
                        </table>

                        <table id="" class="display table table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-dark">No.</th>
                                    <th scope="col" class="text-dark">Nama Produk</th>
                                    <th scope="col" class="text-dark">Kategori</th>
                                    <th scope="col" class="text-dark">Ukuran</th>
                                    <th scope="col" class="text-dark">Jumlah Penjualan Aktual</th>
                                    <th scope="col" class="text-dark">Periode</th>
                                    <th scope="col" class="text-dark">Perhitungan Simple Moving Average</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($penjualan as $index => $data)
                                    <tr>
                                        <td class="text-dark">{{ $index + 1 }}</td>
                                        <td class="text-dark">{{ $data->barang->barang_nama }}</td>
                                        <td class="text-dark">{{ $data->barang->barang_kategori }}</td>
                                        <td class="text-dark">{{ $data->barang->barang_ukuran }}</td>
                                        <td class="text-dark">{{ $data->penjualan_jumlah }}</td>
                                        <td class="text-dark">{{ date('M', strtotime($data->penjualan_bulan_awal)) }}</td>
                                        <td class="text-dark">{{ $hasilMovingAverage[$index] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
