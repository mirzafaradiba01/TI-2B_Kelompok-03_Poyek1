@extends('layouts.template')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">STATUS LAUNDRY</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data-status-admin">
                <thead>
                    <th>No</th>
                    <th>Kode Status</th>
                    <th>Nama Pelanggan </th>
                    <th>Jenis Laundry</th>
                    <th>Berat</th>
                    <th>Total Pembayaran</th>
                    <th>Status</th>
                </thead>
            </table>
        </div>
    </div>
    </section>
@endsection

@push('js')

    <script>
        
        $(document).ready(function() {
            var dataPelanggan = $('#data-status-admin').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': '{{ url(auth()->user()->role . '/status/data') }}',
                    'dataType': 'json',
                    'type': 'POST',
                    'data': {
                        '_token': '{{ csrf_token() }}',
                        'id_user': '{{ auth()->user()->id }}'
                    }
                },
                columns: [
                    {
                        data: 'nomor',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_status',
                        name: 'kode_status',
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
                        data: 'status',
                        name: 'status',
                        searchable: true,
                        sortable: false
                    },
                ]
            });
        }); 
    </script>

@endpush