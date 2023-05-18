@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA JENIS</h3>
        </div>
        <div class="card-body">
           {{-- <a href="{{ url ('pelanggan/create')}}"class="btn btn-sm btn-info my-2">Tambah Data</a> --}}
           <form action="" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search Jenis</button>
        </form>
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jenis</th>
                            <th>Nama </th>
                            <th>Biaya</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        @if($jenisLaundry->count() > 0)
                            @foreach($jenisLaundry as $i => $j)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $j->kode_jenis_laundry}}</td>
                                <td>{{ $j->nama }}</td>
                                <td>{{ $j->biaya }}</td>

                                <td class="">
                                    {{-- Bikin simbol delete --}}
                                    
                                    <form class="d-inline" method="POST" action="{{url('/jenis_laundry/'.$j->id)}}" 
                                        onsubmit="return confirm('Apakah yakin ingin menghapus data tersebut?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        @else
                            <tr><td colspan="5" class="text-center">Data Tidak Ada</td></tr>
                        @endif
                    </body>
            </table>
            <div class="pagination justify-content-end mt-2">  {{ $jenisLaundry->withQueryString()->links() }}</div>
        </div>
    </div>
    <!-- /.card -->
    <div class="card-footer">
        Footer
    </div>

    </section>
@endsection
