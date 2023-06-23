@extends('layouts.template')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">STATUS LAUNDRY</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data-status-pelanggan">
                <thead>
                    <th>No</th>
                    <th>Kode Status</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Laundry</th>
                    <th>Berat</th>
                    <th>Total Pembayaran</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
            </table>
        </div>
    </div>
</section>
@endsection

@push('js')

    <script>

        $(document).ready(function() {
            var dataPelanggan = $('#data-status-pelanggan').DataTable({
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
                        sortable: false,
                        render: function(data, type, row) {
                                var statusClass = '';
                                if (data === 'Selesai') {
                                    statusClass = 'bg-success p-2' ;
                                } else if (data === 'Proses') {
                                    statusClass = 'bg-warning';
                                } else if (data === 'Belum Diproses') {
                                    statusClass = 'bg-info';
                                } else {
                                    statusClass = 'bg-warning'; // Ubah menjadi 'bg-warning' untuk status 'Proses'
                                }
                                return '<span class="badge ' + statusClass + '">' + data + '</span>';
                            }

                    },
                    {
                        data: 'id',
                        name: 'id',
                        sortable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var urlKomplain = "{{ url(auth()->user()->role . '/komplain/create') }}";
                            var urlCetakNota = "{{ url(auth()->user()->role . '/transaksi/cetakNotaLaundry') }}";
                            var idPelanggan = row.pelanggan.id; 
                            var status = row.status;
                            var btn = '';

                            if (status === 'Selesai') {
                                btn += `<a href="${urlKomplain}/${idPelanggan}" class="mr-2 btn btn-sm btn-primary">Komplain</a>`;
                            }

                            btn += `<a href="${urlCetakNota}/${data}" class="btn btn-sm btn-info">Cetak Nota</a>`;

                            return btn;
                        }
                    }
                ]
            });
        });

    </script>

@endpush
