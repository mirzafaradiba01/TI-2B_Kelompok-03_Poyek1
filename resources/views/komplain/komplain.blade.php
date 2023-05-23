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
                    <th>Kode Komplain</th>
                    <th>Kode Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Laundry</th>
                    <th>Jenis Laundry</th>
                    <th>Komplain</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                 
                </thead>
                <body>
                    @if ($komplain->count() > 0)
                        @foreach($komplain as $st => $s)
                            <tr>
                                <td> {{ $st+1}}</td>
                                <td>{{$s->kode_komplain}}</td>
                                <td>{{$s->order->kode_order}}</td>
                                <td>{{$s->pelanggan->nama}}</td>
                                <td>{{$s->order->tanggal_laundry}}</td>
                                <td>{{$s->jenis_laundry->nama}}</td>
                                <td>{{$s->balasan}}</td>
                                <td>{{$s->Gambar}}</td>
                                </tr>
                            </td>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">Data tidak ada</td>
                        </tr>
                    @endif
                </body>
            </table>
        </div>
    </section>
@endsection
