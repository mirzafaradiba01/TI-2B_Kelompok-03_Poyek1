@extends('layouts.template')

@section('content')

    <section class="content">

        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form action="{{ url(auth()->user()->role . '/order') }}" method="get" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 mb-2"  type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0 mb-3" type="submit">Search Order</button>
                </form>
                <table class="table table-bordered table-striped" id="data-order-selesai">
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
                    {{-- <tbody>
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
                        </tbody> --}}
                    </table>
                {{-- <div class="pagination justify-content-end mt-2">  {{ $status->withQueryString()->links() }}</div> --}}
            </div>
        </section>
@endsection

@push('js')

    <script>

        $(document).ready(function() {
            var dataOrderSelesau = $('#data-order-selesai').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': '{{ url(auth()->user()->role . '/status/order_selesai') }}',
                    'dataType': 'json',
                    'type': 'POST',
                },
                columns: [
                    {
                        data: 'nomor',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_order',
                        name: 'kode_order',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'tanggal_laundry',
                        name: 'tanggal_laundry',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'jenis_laundry',
                        name: 'jenis_laundry',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'berat',
                        name: 'berat',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'total',
                        name: 'total',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'catatan',
                        name: 'catatan',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'status_bayar',
                        name: 'status_bayar',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'id',
                        name: 'id',
                        sortable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var btn =
                                `<button data-url="{{ url(auth()->user()->role . '/transaksi') }}/` +
                                data + `" class="btn btn-xs btn-warning mr-2 ml-2 d-inline" onclick="updateData(this)" data-id="` + row.id + `" data-kode_order="` + row.kode_order + `" data-nama="` + row.nama + `"  data-tanggal_laundry="` + row.tanggal_laundry + `" data-jenis_laundry="` + row.jenis_laundry + `" data-berat="` + row.berat + `" data-total="` + row.total + `" data-catatan="` + row.catatan + `" data-no_hp="` + row.no_hp + `" data-status_bayar="` + row.status_bayar + `"><i class="fa fa-edit"></i>Edit</button>`;
                            return btn;
                        }
                    }
                ]
            });
        });

    </script>

@endpush
