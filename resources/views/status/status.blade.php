@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">

            {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div> --}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Kode Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Laundry</th>
                    <th>Jenis Laundry</th>
                    <th>Total Biaya Laundry</th>
                    <th>No Hp</th>
                    <th>Status</th>
                </thead>
                <body>
                    @foreach($status as $st => $s)
                    <tr>
                        <td>{{$s->kode_status}}</td>
                        <td>{{$s->tanggal_laundry}}</td>
                        <td>{{$s->jenis_laundry}}</td>
                        <td>{{$s->biaya_JL}}</td>
                        <td>{{$s->total_laundry}}</td>
                        <td>{{$s->no_hp}}</td>

                        </tr>
                    </td>
                    </body>
                    @endforeach
                {{-- @else --}}
                <tr><td colspan="9" class="text-center">Data Tidak Ada</td></tr>
                {{-- @endif --}}
            </tbody>
              </table>
    </div>
    <!-- /.card -->

    </section>
@endsection
