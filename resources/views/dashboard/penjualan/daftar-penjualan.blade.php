@extends('layouts.dashboard-layouts')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('header-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h5 class="my-auto text-dark">Penjualan - Daftar Penjualan</h5>
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
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h5 class="my-auto text-dark">Daftar Penjualan</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Ukuran</th>
                                    <th>Bulan Awal</th>
                                    <th>Bulan Akhir</th>
                                    <th>Tahun</th>
                                    <th>Jumlah Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($penjualan as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->barang->barang_nama }}</td>
                                        <td class="text-center text-dark">{{ $item->barang->barang_kategori }}</td>
                                        <td class="text-center text-dark">{{ $item->barang->barang_ukuran }}</td>
                                        <td class="text-center text-dark">
                                            {{ date('d-M-Y', strtotime($item->penjualan_bulan_awal)) }}
                                        </td>
                                        <td class="text-center text-dark">
                                            {{ date('d-M-Y', strtotime($item->penjualan_bulan_akhir)) }}
                                        </td>
                                        <td class="text-center text-dark">{{ $item->penjualan_tahun }}</td>
                                        <td class="text-center text-dark">{{ $item->penjualan_jumlah }}</td>
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
