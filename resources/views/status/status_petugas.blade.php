@extends('layouts.template')

@section('content')
<script src="index.js"></script>
    <section>
        <div class="container-fluid text-center mb-2 mt-5">
            <h1>
                <b>Status Laundry</b>
            </h1>
        </div>
    </section>
    <br> <br>

    <section class="content">
        <div class="container-fluid">
            <div class="">
                <section>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4 text-center mb-2">
                                <h2>CUCI</h2>
                            </div>
                            <div class="col-4 text-center mb-2">
                                <h2>SETRIKA</h2>
                            </div>
                            <div class="col-4 text-center mb-2">
                                <h2>PACKING</h2>
                            </div>
                            <div class="col-4">
                                @foreach($statusCuci as $sc)
                                    <form method="POST" action="{{ url('/petugas/update_status/'.$sc->id) }}">
                                        @csrf
                                        <div class="card border-left-info shadow h-70 py-2 bg-info">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="h5 mb-5 font-weight-bold">Nota Order
                                                            <span class="float-right">{{$sc->kode_order}}</span> <br>
                                                        </div>
                                                        <div class="h5 mb-4 font-weight-bold">Nama
                                                            <span class="float-right">{{$sp->pelanggan->nama}}</span>
                                                        </div>
                                                        <div class="div d-flex justify-content-center">
                                                            <a href="#" class="btn btn-light btn-block" data-toggle="modal" data-target="#statusModal{{ $sc->id }}">{{ $sc->status }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="statusModal{{ $sc->id }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel{{ $sc->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="statusModalLabel{{ $sc->id }}">Update {{ $sc->status }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin sudah di{{ $sc->status }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary">Yakin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>

                            <div class="col-4">
                                @foreach($statusSetrika as $ss)
                                    <form method="POST" action="{{ url('/petugas/update_status/'.$ss->id) }}">
                                        @csrf
                                        <div class="card border-left-info shadow h-70 py-2 bg-info">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="h5 mb-5 font-weight-bold">Nota Order
                                                            <span class="float-right">{{$ss->kode_order}}</span>
                                                        </div>
                                                        <div class="h5 mb-4 font-weight-bold">Nama
                                                            <span class="float-right">{{$sp->pelanggan->nama}}</span>
                                                        </div>
                                                        <div class="div d-flex justify-content-center">
                                                            <a href="#" class="btn btn-light btn-block" data-toggle="modal" data-target="#statusModal{{ $ss->id }}">{{ $ss->status }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="statusModal{{ $ss->id }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel{{ $ss->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="statusModalLabel{{ $ss->id }}">Update {{ $ss->status }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin sudah di{{ $ss->status }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary">Yakin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>

                            <div class="col-4">
                                @foreach($statusPacking as $sp)
                                    <form method="POST" action="{{ url('/petugas/update_status/'.$sp->id) }}">
                                        @csrf
                                        <div class="card border-left-info shadow h-70 py-2 bg-info">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="h5 font-weight-bold">Nota Order
                                                            <span class="float-right">{{$sp->kode_order}}</span>
                                                        </div>
                                                        <div class="h5 mb-4 font-weight-bold">Nama
                                                            <span class="float-right">{{$sp->pelanggan->nama}}</span>
                                                        </div>
                                                        <div class="div d-flex justify-content-center">
                                                            <a href="#" class="btn btn-light btn-block" data-toggle="modal" data-target="#statusModal{{ $sp->id }}">{{ $sp->status }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="statusModal{{ $sp->id }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel{{ $sp->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="statusModalLabel{{ $sp->id }}">Update {{ $sp->status }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin sudah di{{ $sp->status }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary">Yakin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection








