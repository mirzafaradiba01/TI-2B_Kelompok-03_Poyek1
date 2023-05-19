@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">STATUS LAUNDRY</h3>
        </div>

        {{-- <div class="card-body">
           <a href="{{ url ('petugas/create')}}"class="btn btn-sm btn-info my-2">Tambah Data</a>
           <form action="" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search Petugas</button>
        </form> --}}
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Jenis Laundry</th>
                            <th>Berat</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        {{-- @if($petugas->count() > 0) --}}
                        {{-- @foreach($petugas as $i => $p) --}}
                        @if($statuslaundry->count() > 0)
                            @foreach($statuslaundry as $s => $si)
                            <tr>
                                <td>{{++$s}}</td>
                                <td>{{$si->kode_petugas}}</td>
                                <td>{{$si->jenis_laundry}}</td>
                                <td>{{$si->berat}}</td>
                                <td>{{$si->total}}</td>
                                <td>{{$si->Status}}</td>
                                  
                                
                         
                                
                                <td>
                                    

                             {{-- Bikin simbol edit dan delete --}}
                                    <a href="{{url('/komplain/'.$p->id)}}" class="btn btn-sm btn-primary">
                                        Komplain
                                    </a>
                                    <a href="{{url('/status/'.$p->id)}}" class="btn btn-sm btn-primary">
                                        show
                                    </a>
                                    
                                    
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        @else
                            <tr><td colspan="8" class="text-center">Data Tidak Ada</td></tr>
                        @endif
                    </body>
            </table>
            <div class="pagination justify-content-end mt-2">  {{ $petugas->withQueryString()->links() }}</div>
        </div>
    </div>

    </section>
@endsection