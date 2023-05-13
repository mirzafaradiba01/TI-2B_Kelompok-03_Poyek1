@extends('layouts.template')

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Kode Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Laundry</th>
                    <th>Jenis Laundry</th>
                    <th>Total Biaya Laundry</th>
                    <th>No Hp</th>
                    <th>Status</th>
                </thead>
                <body>
                    @if ($status->count() > 0)
                        @foreach($status as $st => $s)
                            <tr>
                                <td>{{$s->kode_status}}</td>
                                <td>{{$s->order->tanggal_laundry}}</td>
                                <td>{{$s->jenis_laundry->nama}}</td>
                                <td>{{$s->jenis_laundry->biaya}}</td>
                                <td>{{$s->order->total_laundry}}</td>
                                <td>{{$s->pelanggan->no_hp}}</td>
                                <td>{{$s->status}}</td>
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
