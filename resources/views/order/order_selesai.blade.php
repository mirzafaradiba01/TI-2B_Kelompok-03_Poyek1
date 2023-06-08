@extends('layouts.template')

@section('content')

    <section class="content">

        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 mb-2"  type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0 mb-3" type="submit">Search Order</button>
                </form>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Jenis Laundry</th>
                        <th>Berat</th>
                        <th>Total Biaya</th>
                        <th>Catatan</th>
                        <th>No Hp</th>
                        <th>Status Bayar</th>
                        <th>Status</th>
                    </thead>
                    <body>
                        @if(isset($status) && $status->count() > 0);
                   
                            @foreach ($status as $os => $o)
                           @if  ($o->status === 'Selesai')
                                <tr>
                                    <td>{{$os+1}}</td>
                                    <td>{{$o->kode_order}}</td>
                                    <td>{{$o->pelanggan->nama}}</td>
                                    <td>{{$o->order->tanggal_laundry}}</td>
                                    <td>{{$o->order->jenis_laundry->nama}}</td>
                                    <td>{{$o->order->berat}}</td>
                                    <td>{{$o->order->total}}</td>
                                    <td>{{$o->order->catatan}}</td>
                                    <td>{{$o->pelanggan->no_hp}}</td>
                                    <td>{{$o->order->status_bayar}}</td>                  
                                    <td>{{$o->status}}</td>
                                    </tr>
                                </td>
                                @endif
                            @endforeach
                           
                        @else
                            <tr>
                                <td colspan="11" class="text-center">Data tidak ada</td>
                            </tr>
                        @endif
                    </body>
                </table>
                <div class="pagination justify-content-end mt-2">  {{ $status->withQueryString()->links() }}</div>
            </div>
        </section>
     
@endsection
