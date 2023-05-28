@extends('layouts.template')

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3>DATA KOMPLAIN</h3>
        </div>
        <div class="card-body">
            <form action="" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search </button>
            </form>
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <th>No</th>
                    <th>Kode Komplain</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Komplain</th>
                    <th>Gambar</th>
                    @if( auth()->user()->role === 'pelanggan' )
                        <th>Balasan</th>
                    @endif
                    @if( auth()->user()->role === 'admin' )
                        <th>Opsi</th>
                    @endif
                </thead>
                <body>
                    @if ($komplain->count() > 0)
                        @foreach($komplain as $st => $s)
                            <tr>
                                <td> {{ $st + 1}}</td>
                                <td>{{$s->kode_komplain}}</td>
                                <td>{{$s->id_pelanggan}}</td>
                                <td>{{$s->pelanggan->nama}}</td>
                                <td>{{$s->pesan}}</td>
                                <td>
                                  <center>
                                    <img src="{{ asset('storage/' . $s->gambar) }}" alt="" style="width: 100px; height: 100px;">
                                  </center>
                                </td>
                                @if( auth()->user()->role === 'pelanggan' )
                                <td>{{$s->balasan ? $s->balasan : ' mohon maaf admin belum membalas pesan anda'}}</td>
                            @endif
                                @if( auth()->user()->role === 'admin' )
                                    <td class="">
                                        <a href="{{ url(auth()->user()->role . '/komplain/'  . $s->id .'/edit') }}"
                                            class="btn btn-sm btn-warning">
                                            Balasan
                                        </a>
                                        <form class="d-inline" method="POST" action="{{ url(auth()->user()->role . '/komplain/' . $s->id  ) }}"
                                            onsubmit="return confirm('Apakah yakin ingin menghapus data tersebut?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Data tidak ada</td>
                        </tr>
                    @endif
                </body>
            </table>
            <div class="pagination justify-content-end mt-2"> {{ $komplain->withQueryString()->links() }}</div>
        </div>
    </section>
@endsection
