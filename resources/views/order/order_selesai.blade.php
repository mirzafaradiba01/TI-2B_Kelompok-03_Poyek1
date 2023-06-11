@extends('layouts.template')

@section('content')

<section class="content">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            {{-- <form action="" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 mb-2"  type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0 mb-3" type="submit">Search Order</button>
            </form> --}}
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
                <tbody>
                    @if ($order_selesai->count() > 0)
                        @foreach ($order_selesai as $os => $so)
                           @if ($so->status === 'Selesai')
                            <tr>
                                    <td>{{ ++$os }}</td>
                                    <td>{{ $so->kode_order }}</td>
                                    <td>{{ $so->pelanggan->nama }}</td>
                                    <td>{{ $so->order->tanggal_laundry }}</td>
                                    <td>{{ $so->jenis_laundry->nama }}</td>
                                    <td>{{ $so->order->berat }}</td>
                                    <td>{{ $so->order->total }}</td>
                                    <td>{{ $so->order->catatan }}</td>
                                    <td>{{ $so->pelanggan->no_hp }}</td>
                                    <td>{{ $so->order->status_bayar }}</td>
                                    <td>{{ $so->status }}</td>
                                </tr>
                           @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- <div class="pagination justify-content-end mt-2"> {{ $status->withQueryString()->links() }}</div> --}}
    </div>
</section>
@endsection
