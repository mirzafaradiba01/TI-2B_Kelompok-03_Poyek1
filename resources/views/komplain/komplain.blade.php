@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">KOMPLAIN</h3>
        </div>
        <div class="card-body">
           <form action="" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search Komplain</button>
        </form>
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Pesan</th>
                            <th>Gambar</th>
                            <th>Balasan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        @if($komplain->count() > 0)
                        {{-- {{ dd($pelanggan) }} --}}
                            @foreach($komplain as $i => $k)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->pesan }}</td>
                                <td>{{ $k->Gambar }}</td>
                                <td>{{ $k->Balasan }}</td>
                                <td class="">
                                    {{-- Bikin simbol edit dan delete --}}
                                    <form class="d-inline" method="POST" action="{{url('/komplain/'.$p->id)}}" onsubmit="return confirm('Apakah yakin ingin menghapus data tersebut?')">
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
            <div class="pagination justify-content-end mt-2">  {{ $komplain->withQueryString()->links() }}</div>
        </div>
    </div>
    <!-- /.card -->
    <div class="card-footer">
        Footer
    </div>

    </section>
@endsection
