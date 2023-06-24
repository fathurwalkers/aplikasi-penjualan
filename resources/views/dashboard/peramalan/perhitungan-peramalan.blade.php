@extends('layouts.dashboard-layouts')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('header-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h5 class="my-auto text-dark">Peramalan - Perhitungan Simple Moving Average</h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">

            </div>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="card">
        <div class="card-body">
            <div class="container">

                <form action="" method="post">
                    @csrf

                    <p class="text-dark">
                        Silahkan masukkan informasi terkait untuk melakukan perhitungan peramalan penjualan.
                    </p>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="produk_nama">
                                    <h6>Produk yang diramal</h6>
                                </label>
                                <input type="text" class="form-control" id="produk_nama"
                                    placeholder="Masukkan keterangan pengaduan..." name="produk_nama">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="produk_nama">
                                    <h6>Periode Sebelumnya</h6>
                                </label>
                                <input type="text" class="form-control" id="produk_nama"
                                    placeholder="Masukkan keterangan pengaduan..." name="produk_nama">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="produk_nama">
                                    <h6>Jumlah Periode Peramalan</h6>
                                </label>
                                <input type="text" class="form-control" id="produk_nama"
                                    placeholder="Masukkan keterangan pengaduan..." name="produk_nama">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="produk_nama">
                                    <h6>Tanggal Awal</h6>
                                </label>
                                <input type="text" class="form-control" id="produk_nama"
                                    placeholder="Masukkan keterangan pengaduan..." name="produk_nama">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="produk_nama">
                                    <h6>Tanggal Akhir</h6>
                                </label>
                                <input type="text" class="form-control" id="produk_nama"
                                    placeholder="Masukkan keterangan pengaduan..." name="produk_nama">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info btn-md">
                                Tambah Barang
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h5 class="my-auto text-dark">Daftar Barang</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Stok Barang</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center text-dark">#</td>
                                    <td class="text-center text-dark">BARANG23929</td>
                                    <td class="text-center text-dark">Barang 1</td>
                                    <td class="text-center text-dark">23</td>
                                    <td class="text-center text-dark">
                                        <button class="btn btn-sm btn-info mr-1" type="button">
                                            Ubah
                                        </button>
                                        <button class="btn btn-sm btn-danger mr-1" type="button">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>

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
