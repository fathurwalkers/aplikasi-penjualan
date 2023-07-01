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
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h5 class="my-auto text-dark">Daftar User</h5>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ml-auto">
                        <button type="button" class="btn btn-md btn-primary d-flex my-auto ml-auto" data-toggle="modal"
                            data-target="#modaltambah">
                            Tambah User
                        </button>
                    </div>
                </div>

                <!-- Modal Ubah -->
                <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('post-register') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <p class="text-dark">
                                        Silahkan mengisikan data user yang akan ditambah.
                                    </p>

                                    <div class="form-group">
                                        <label for="login_nama">Nama Lengkap</label>
                                        <input name="login_nama" id="login_nama" type="text" class="form-control"
                                            value="{{ old('login_nama') }}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_email">Email</label>
                                        <input name="login_email" id="login_email" type="email"
                                            value="{{ old('login_email') }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_telepon">No. Telepon / HP</label>
                                        <input name="login_telepon" id="login_telepon" type="text" class="form-control"
                                            value="{{ old('login_telepon') }}" required>
                                    </div>

                                    <hr />

                                    <div class="form-group">
                                        <label for="login_username">Username</label>
                                        <input name="login_username" id="login_username" type="text" class="form-control"
                                            value="{{ old('login_username') }}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_password">Password</label>
                                        <input name="login_password" id="login_password" type="password"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="login_password2">Konfirmasi Password</label>
                                        <input name="login_password2" id="login_password2" type="password"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-danger">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Modal Ubah -->

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
                                    <div class="modal fade" id="modalubah{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('update-user', $item->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p class="text-dark">
                                                            Silahkan mengisikan data user yang akan diubah.
                                                        </p>

                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="login_nama">
                                                                        <h6>Nama User</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="login_nama"
                                                                        placeholder="Masukkan nama produk baru..."
                                                                        name="login_nama"
                                                                        value="{{ $item->login_nama }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="login_username">
                                                                        <h6>Username</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="login_username"
                                                                        placeholder="Masukkan nama produk baru..."
                                                                        name="login_username"
                                                                        value="{{ $item->login_username }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="login_email">
                                                                        <h6>Email</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="login_email"
                                                                        placeholder="Masukkan nama produk baru..."
                                                                        name="login_email"
                                                                        value="{{ $item->login_email }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="login_telepon">
                                                                        <h6>No. HP / Telepon</h6>
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        id="login_telepon"
                                                                        placeholder="Masukkan nama produk baru..."
                                                                        name="login_telepon"
                                                                        value="{{ $item->login_telepon }}">
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
