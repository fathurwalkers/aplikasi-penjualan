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
    <div class="card">
        <div class="card-body">
            <div class="container">

                <form action="{{ route('tambah-penjualan') }}" method="post">
                    @csrf

                    <input type="hidden" name="id_produk" id="id_produk">

                    <p class="text-dark">
                        Silahkan masukkan informasi Nama dan Jumlah stok barang baru.
                    </p>

                    <div class="row">
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <div class="form-group">
                                <label for="produk_kode">
                                    <h6>Produk</h6>
                                </label>
                                <input type="text" class="form-control" id="produk_kode" placeholder="..."
                                    name="produk_kode" disabled required>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="produk_kode">
                                <h6 style="color:#fff;">ke Tabel Produk</h6>
                            </label>
                            <a href="#daftarbarang" class="btn btn-info btn-md" width="100%">
                                Tabel Produk
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="tahun">
                                    <h6>Tahun</h6>
                                </label>
                                <input type="number" class="form-control" id="tahun"
                                    placeholder="Masukkan periode tahun..." name="tahun" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="jumlah_penjualan">
                                    <h6>Jumlah Penjualan</h6>
                                </label>
                                <input type="number" class="form-control" id="jumlah_penjualan"
                                    placeholder="Masukkan jumlah penjualan..." name="jumlah_penjualan" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="bulan_awal">
                                    <h6>Bulan Awal</h6>
                                </label>
                                <select class="form-control" id="bulan_awal" name="bulan_awal" required>
                                    @foreach ($array_bulan as $item1)
                                        <option value="{{ date('m', strtotime($item1)) }}">{{ $item1 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="bulan_akhir">
                                    <h6>Bulan Akhir</h6>
                                </label>
                                <select class="form-control" id="bulan_akhir" name="bulan_akhir" required>
                                    @foreach ($array_bulan as $item1)
                                        <option value="{{ date('m', strtotime($item1)) }}">{{ $item1 }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-md">
                                Tambah Penjualan
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

    <div class="card mb-3" id="daftarbarang">
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
                        <table id="example2" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Ukuran Produk</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($produk as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_kode }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_nama }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_kategori }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_ukuran }}</td>
                                        <td class="text-center text-dark">
                                            <button class="btn btn-sm btn-info mr-1" type="button"
                                                onclick="setproduk('{{ $item->id }}','{{ $item->barang_nama }}','{{ $item->barang_kode }}')">
                                                Pilih
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
        function setproduk(id, nama, kode) {
            $('#produk_kode').val(kode);
            $('#id_produk').val(id);
        }

        $(document).ready(function() {
            $('#example').DataTable();
            $('#example2').DataTable();
        });
    </script>
@endpush
