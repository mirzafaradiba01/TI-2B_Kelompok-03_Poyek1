@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA PELANGGAN</h3>
        </div>
        <div class="card-body">
           <a href="{{ url ('pelanggan/create')}}"class="btn btn-sm btn-info my-2">Tambah Data</a>
           <form action="" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search Pelanggan</button>
        </form>
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Pelanggan</th>
                            <th>No Hp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        @if($pelanggan->count() > 0)
                            @foreach($pelanggan as $pe => $p)
                            <tr>
                                <td>{{++$pe}}</td>
                                <td>{{$p->kode_pelanggan}}</td>
                                <td>{{$p->nama}}</td>
                                <td>{{$p->no_hp}}</td>

                                <td>
                                    {{-- Bikin simbol edit dan delete --}}
                                    <a href="{{url('/pelanggan/'.$p->id)}}"
                                        class="btn btn-sm btn-primary">show</a>

                                    <a href="{{url('/pelanggan/'.$p->id.'/edit')}}"
                                        class="btn btn-sm btn-warning">edit</a>

                                    <form method="POST" action="{{url('/pelanggan/'.$p->id)}}" onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
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
            <div class="pagination justify-content-end mt-2">  {{ $pelanggan->withQueryString()->links() }}</div>
        </div>
    </div>
    <!-- /.card -->
    <div class="card-footer">
        Footer
    </div>

    </section>
@endsection
