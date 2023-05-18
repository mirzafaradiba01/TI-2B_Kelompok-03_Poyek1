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
                                    Order </div>
                                <div class="h5 mb-0 font-weight-bold">{{ $hitungOrder }} Order</div>
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
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-scroll fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </section>
@endsection
