@extends('layouts.template')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DETAIL DATA PELANGGAN</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Kode Pelanggan : </b>{{$pelanggan->kode_pelanggan}}</li>
                <li class="list-group-item"><b>Nama Pelanggan : </b>{{$pelanggan->nama}}</li>
                <li class="list-group-item"><b>No Telepon : </b>{{$pelanggan->no_hp}}</li>
            </ul>
        </div>
    </div>
</section>
@endsection
