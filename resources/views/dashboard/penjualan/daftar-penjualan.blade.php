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
                                    @foreach ($array_bulan as $bulanbulan)
                                        <option value="{{ date('m', strtotime($bulanbulan)) }}">{{ $bulanbulan }}</option>
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
                                    @foreach ($array_bulan as $tanggaltanggal)
                                        <option value="{{ date('m', strtotime($tanggaltanggal)) }}">{{ $tanggaltanggal }}
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
                                    <th>Kelola</th>
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
                                        <td class="text-center text-dark">
                                            <button class="btn btn-sm btn-info mr-1" type="button" data-toggle="modal"
                                                data-target="#modalubah{{ $item->id }}">
                                                Ubah
                                            </button>
                                            <button class="btn btn-sm btn-danger mr-1" type="button" data-toggle="modal"
                                                data-target="#modalhapus{{ $item->id }}">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Ubah -->
                                    <div class="modal fade" id="modalubah{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('update-penjualan', $item->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p class="text-dark">
                                                            Silahkan mengisikan data penjualan yang akan diubah.
                                                        </p>

                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="tahun">
                                                                        <h6>Tahun</h6>
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        id="tahun"
                                                                        value="{{ $item->penjualan_tahun }}"
                                                                        name="tahun">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="jumlah_penjualan">
                                                                        <h6>Jumlah Penjualan</h6>
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        id="jumlah_penjualan"
                                                                        value="{{ $item->penjualan_jumlah }}"
                                                                        name="jumlah_penjualan">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="bulan_awal">
                                                                        <h6>Bulan Awal</h6>
                                                                    </label>
                                                                    <select class="form-control" id="bulan_awal"
                                                                        name="bulan_awal" required>
                                                                        @foreach ($array_bulan1 as $itemss)
                                                                            <option
                                                                                value="{{ date('m', strtotime($itemss)) }}">
                                                                                {{ $itemss }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="bulan_akhir">
                                                                        <h6>Bulan Akhir</h6>
                                                                    </label>
                                                                    <select class="form-control" id="bulan_akhir"
                                                                        name="bulan_akhir" required>
                                                                        @foreach ($array_bulan2 as $itemsss)
                                                                            <option
                                                                                value="{{ date('m', strtotime($itemsss)) }}">
                                                                                {{ $itemsss }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batalkan</button>
                                                        <button type="submit" class="btn btn-danger">Ubah Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Modal Ubah -->

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penjualan
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('hapus-penjualan', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data penjualan ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batalkan</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Modal Hapus -->
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
