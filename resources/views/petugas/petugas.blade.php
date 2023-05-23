@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA PETUGAS</h3>
        </div>

        <div class="card-body">
           <a href="{{ url ( auth()->user()->role . '/petugas/create')}}"class="btn btn-sm btn-info my-2">Tambah Data</a>
           <form action="" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search Petugas</button>
        </form>
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Petugas</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        @if($petugas->count() > 0)
                            @foreach($petugas as $i => $p)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$p->kode_petugas}}</td>
                                <td>{{$p->nama}}</td>
                                <td>{{$p->alamat}}</td>
                                <td>{{$p->no_hp}}</td>
                                <td>
                                    <a href="{{ url( auth()->user()->role . '/petugas/'.$p->id)}}" class="btn btn-sm btn-primary">
                                        show
                                    </a>
                                    <a href="{{ url( auth()->user()->role . '/petugas/'. $p->id . '/edit' ) }}" class="btn btn-sm btn-warning">
                                        edit
                                    </a>
                                    <form class="d-inline" method="POST" action="{{ url('/petugas/' . $p->id) }}" onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr><td colspan="7" class="text-center">Data Tidak Ada</td></tr>
                        @endif
                    </body>
            </table>
            <div class="pagination justify-content-end mt-2">  {{ $petugas->withQueryString()->links() }}</div>
        </div>
    </div>

    </section>
@endsection
