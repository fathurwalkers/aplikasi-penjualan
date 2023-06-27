@extends('layouts.dashboard-layouts')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('header-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h5 class="my-auto text-dark">Produk - Daftar Barang</h5>
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

                <form action="{{ route('tambah-produk') }}" method="post">
                    @csrf

                    <p class="text-dark">
                        Silahkan masukkan informasi Nama dan Jumlah stok barang baru.
                    </p>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="barang_nama">
                                    <h6>Nama Produk</h6>
                                </label>
                                <input type="text" class="form-control" id="barang_nama"
                                    placeholder="Masukkan nama produk baru..." name="barang_nama">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="barang_kategori">
                                        <h6>Kategori Produk</h6>
                                    </label>
                                    <select class="form-control" id="barang_kategori" name="barang_kategori">
                                        <option default value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                    </select>
                                </div>
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
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Ukuran Produk</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($barang as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_nama }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_kategori }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_ukuran }}</td>
                                        <td class="text-center text-dark">
                                            <button class="btn btn-sm btn-info mr-1" type="button">
                                                Ubah
                                            </button>
                                            <button class="btn btn-sm btn-danger mr-1" type="button">
                                                Hapus
                                            </button>
                                        </td>
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
