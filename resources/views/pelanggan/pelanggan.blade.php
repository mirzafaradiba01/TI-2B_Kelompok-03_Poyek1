@extends('layouts.template')

@section('content')
    <section class="content">

        <!--Default box-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DATA PELANGGAN</h3>
            </div>
            <div class="card-body">
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search Pelanggan</button>
                </form>
                <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Pelanggan</th>
                            <th>Username</th>
                            <th>No Hp</th>
                            @if (auth()->user()->role === 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>

                    <body>
                        @if ($pelanggan->count() > 0)
                            {{-- {{ dd($pelanggan) }} --}}
                            @foreach ($pelanggan as $i => $p)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $p->kode_pelanggan }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->users->username }}</td>
                                    <td>{{ $p->no_hp }}</td>

                                    @if (auth()->user()->role === 'admin')
                                        <td class="">
                                            {{-- Bikin simbol edit dan delete --}}
                                            <a href="{{ url(auth()->user()->role . '/pelanggan/' . $p->id) }}"
                                                class="btn btn-sm btn-primary">
                                                show
                                            </a>
                                            <a href="{{ url(auth()->user()->role . '/pelanggan/' . $p->id . '/edit') }}"
                                                class="btn btn-sm btn-warning">
                                                edit
                                            </a>
                                            <form class="d-inline" method="POST" action="{{ url(auth()->user()->role . '/pelanggan/' . $p->id) }}"
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
                                <td colspan="7" class="text-center">Data Tidak Ada</td>
                            </tr>
                        @endif
                    </body>
                </table>
                <div class="pagination justify-content-end mt-2"> {{ $pelanggan->withQueryString()->links() }}</div>
            </div>
        </div>
    </section>
@endsection
