@extends('layouts.dashboard-layouts')

@push('css')
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('header-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h5 class="my-auto text-dark">Penjualan - Cek Penjualan</h5>
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

                <form action="{{ route('data-penjualan') }}" method="post">
                    @csrf

                    <p class="text-dark">
                        Silahkan masukkan Bulan dan Periode penjualan yang akan dicek.
                    </p>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="kategori">
                                    <h6>Kategori</h6>
                                </label>
                                <select class="form-control" id="kategori" name="kategori">
                                    @foreach ($array_kategori as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="tahun">
                                    <h6>Tahun</h6>
                                </label>
                                <input type="number" class="form-control" id="tahun"
                                    placeholder="Masukkan periode tahun..." name="tahun">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="bulan_awal">
                                    <h6>Bulan Awal</h6>
                                </label>
                                <select class="form-control" id="bulan_awal" name="bulan_awal">
                                    @foreach ($array_bulan as $item1)
                                        <option value="{{ date('m', strtotime($item1)) }}">{{ $item1 }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="bulan_akhir">
                                    <h6>Bulan Akhir</h6>
                                </label>
                                <select class="form-control" id="bulan_akhir" name="bulan_akhir">
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
                                Proses
                            </button>
                        </div>
                    </div>
                </form>

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
