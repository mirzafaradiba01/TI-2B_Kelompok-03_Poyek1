@extends('layouts.template')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-info">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Pelanggan</div>
                                    <div class="h5 mb-0 font-weight-bold">{{ $hitungPelanggan }} Pelanggan</div>
                                    <a href="{{ url('/pelanggan') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2 bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Order </div>
                                <div class="h5 mb-0 font-weight-bold">{{ $hitungOrder }} Order</div>
                                <a href="{{ url('/order') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-scroll fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2 bg-info">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Komplain</div>
                                        <div class="h5 mb-0 font-weight-bold">{{ $hitungKomplain }} Komplain</div>
                                        <a href="{{ url('/komplain') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-secondary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Dalam Proses Cuci</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                    <a href="{{ url('/pelanggan') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-bars fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-secondary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Dalam Proses Setrika</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                    <a href="{{ url('/pelanggan') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-copy fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-secondary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Dalam Proses Packing</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                    <a href="{{ url('/pelanggan') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ellipsis-h fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-warning">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Selesai, Belum Diambil</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                    <a href="{{ url('/pelanggan') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-arrow-down fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-success">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Selesai, Sudah Diambil</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                    <a href="{{ url('/pelanggan') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-arrow-up fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
