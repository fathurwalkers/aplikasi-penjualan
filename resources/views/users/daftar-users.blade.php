@extends('layouts.dashboard-layouts')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('header-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h5 class="my-auto text-dark">Kelola Users - Daftar Users</h5>
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>No. HP / Telepon</th>
                                    <th>Status</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($all_users as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->login_nama }}</td>
                                        <td class="text-center text-dark">{{ $item->login_username }}</td>
                                        <td class="text-center text-dark">{{ $item->login_email }}</td>
                                        <td class="text-center text-dark">{{ $item->login_telepon }}</td>
                                        <td class="text-center text-dark">{{ $item->login_status }}</td>
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
                                                <form action="{{ route('update-produk', $item->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p class="text-dark">
                                                            Silahkan mengisikan data produk yang akan diubah.
                                                        </p>

                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="barang_nama">
                                                                        <h6>Nama Produk</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="barang_nama"
                                                                        placeholder="Masukkan nama produk baru..."
                                                                        name="barang_nama"
                                                                        value="{{ $item->barang_nama }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="barang_kategori">
                                                                        <h6>Kategori</h6>
                                                                    </label>
                                                                    <select class="form-control" id="barang_kategori"
                                                                        name="barang_kategori">
                                                                        <option default
                                                                            value="{{ $item->barang_kategori }}">
                                                                            {{ $item->barang_kategori }}</option>
                                                                        <option value="SD">SD</option>
                                                                        <option value="SMP">SMP</option>
                                                                        <option value="SMA">SMA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="barang_ukuran">
                                                                        <h6>Ukuran</h6>
                                                                    </label>
                                                                    <select class="form-control" id="barang_ukuran"
                                                                        name="barang_ukuran">
                                                                        <option default value="{{ $item->barang_ukuran }}">
                                                                            {{ $item->barang_ukuran }}</option>
                                                                        <option value="S">S</option>
                                                                        <option value="M">M</option>
                                                                        <option value="L">L</option>
                                                                        <option value="XL">XL</option>
                                                                        <option value="XXL">XXL</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('hapus-user', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data user ini?
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
@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
