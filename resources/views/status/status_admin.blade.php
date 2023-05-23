@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">STATUS LAUNDRY</h3>
        </div>
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Order </th>
                            <th>Nama Pelanggan </th>
                            <th>Jenis Laundry</th>
                            <th>Berat</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        @if($status_admin->count() > 0)
                            @foreach($status_admin as $s => $si)
                            <tr>
                                <td>{{++$s}}</td>
                                <td>{{$si->kode_order}}</td>
                                <td>{{$si->pelanggan->nama}}</td>
                                <td>{{$si->jenis_laundry->nama}}</td>
                                <td>{{$si->berat}}</td>
                                <td>{{$si->total}}</td>
                                <td>{{ $si->order->status ?? 'Cuci' }}</td>
                                <td>
                             {{-- Bikin simbol edit dan delete --}}
                                    <a href="{{ url( auth()->user()->role . '/komplain/create' ) }}" class="btn btn-sm btn-primary">
                                        Komplain
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9" class="text-center">Data Tidak Ada</td></tr>
                        @endif
                    </body>
            </table>
            <div class="pagination justify-content-end mt-2">  {{ $status_admin->withQueryString()->links() }}</div>
        </div>
    </div>
    </section>
@endsection
