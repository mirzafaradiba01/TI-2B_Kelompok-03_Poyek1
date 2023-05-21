@extends('layouts.template')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-4">
                        <span>Selamat Datang,
                            <span class="font-weight-bold">
                                {{auth()->user()->username; }}
                            </span>
                        </span>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-danger">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Dalam Proses Cuci</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-bars fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-danger">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Dalam Proses Setrika</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-copy fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 bg-danger">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p>Dalam Proses Packing</p>
                                    <div class="h5 mb-0 font-weight-bold">Laundry</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ellipsis-h fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
