@extends('layouts.dashboard-layouts')


@section('header-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h5 class="my-auto text-dark">Index Page - Dashboard</h5>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">

            </div>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="container mt-2">

        <div class="row">

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Keluar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">240</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Laporan Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">39</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Berita</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">39</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
