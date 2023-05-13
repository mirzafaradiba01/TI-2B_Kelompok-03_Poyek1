@extends('layouts.template')

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 mb-2"  type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0 mb-3" type="submit">Search Transaksi</button>
            </form>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Kode Order</th>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Jenis Laundry</th>
                    <th>Berat</th>
                    <th>Catatan</th>
                    <th>Total Biaya</th>
                    <th>No Hp</th>
                    <th>Status Bayar</th>
                </thead>
                <body>
                    @if ($order->count() > 0)
                        @foreach($order as $or => $o)
                            <tr>
                                <td>{{$o->kode_order}}</td>
                                <td>{{$o->pelanggan->kode_pelanggan}}</td>
                                <td>{{$o->pelanggan->nama}}</td>
                                <td>{{$o->tanggal_laundry}}</td>
                                <td>{{$o->jenis_laundry->nama}}</td>
                                <td>{{$o->berat}}</td>
                                <td>{{$o->total}}</td>
                                <td>{{$o->catatan}}</td>
                                <td>{{$o->pelanggan->no_hp}}</td>
                                <td>{{$o->status_bayar}}</td>
                                </tr>
                            </td>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11" class="text-center">Data tidak ada</td>
                        </tr>
                    @endif
                </body>
            </table>
        </div>
    </section>
@endsection
