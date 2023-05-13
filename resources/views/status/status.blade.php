@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">CEK STATUS LAUNDRY</h3>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Status</th>
                    <th>Tanggal Laundry</th>
                    <th>Jenis Laundry</th>
                    <th>Total Biaya Laundry</th>
                    <th>No Hp</th>
                </thead>
                <body>
                    @if($status -> count() > 0)
                    @foreach($status as $st => $s)
                    <tr>
                        <td>{{++$st}}</td>
                        <td>{{$s->nama_pelanggan}}</td>
                        <td>{{$s->kode_status}}</td>
                        <td>{{$s->tanggal_laundry}}</td>
                        <td>{{$s->jenis_laundry}}</td>
                        <td>{{$s->total_laundry}}</td>
                        <td>{{$s->no_hp}}</td>

                    </tr>
                  </td>
                </body>
                @endforeach

                @else
                <tr><td colspan="9" class="text-center">Data Tidak Ada</td></tr>
                    
                @endif
            </tbody>      
              </table>   
    </div>
    <!-- /.card -->

    </section>
@endsection