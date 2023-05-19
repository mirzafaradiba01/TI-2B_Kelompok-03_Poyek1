@extends('layouts.template')

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search </button>
            </form>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <th>No</th>
                    <th>Kode Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Komplain</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                 
                </thead>
                <body>
                    @if ($komplain->count() > 0)
                        @foreach($komplain as $st => $s)
                            <tr>
                                <td>{{$s->kode_status}}</td>
                                <td>{{$s->order->tanggal_laundry}}</td>
                                <td>{{$s->jenis_laundry->nama}}</td>
                                <td>{{$s->komplain->komplain}}</td>
                                <td>{{$s->komplain->Gambar}}</td>
                                <td>{{$s->opsi}}</td>
                                </tr>
                            </td>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                    @endif
                </body>
            </table>
        </div>
    </section>
@endsection
