@extends('layouts.template')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DATA JENIS</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="data-jenis-laundry">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jenis</th>
                            <th>Nama </th>
                            <th>Biaya</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-jenis-laundry" style="display: none;" aria-hidden="true">
        <form method="post" action="{{ url(auth()->user()->role . '/jenis_laundry') }}" role="form"
            class="form-horizontal" id="form-jenis-laundry">
            @csrf
            <div class="modal-dialog modal-">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jenis Layanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-message"></div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                    value="" />
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label">Biaya</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="biaya" name="biaya"
                                    value="" />
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="confirm-delete-data" tabindex="-1" aria-labelledby="confirm-modal-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm-modal-label">Hapus Data Jenis Laundry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Yakin Ingin Hapus Data Ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function updateData(th) {
            $('#modal-jenis-laundry').modal('show');
            $('#modal-jenis-laundry .modal-title').html('Edit Data Jenis Layanan Laundry');
            $('#modal-jenis-laundry #nama').val($(th).data('nama'));
            $('#modal-jenis-laundry #biaya').val($(th).data('biaya'));
            $('#modal-jenis-laundry #form-jenis-laundry').attr('action', $(th).data('url'));
            $('#modal-jenis-laundry #form-jenis-laundry').append('<input type="hidden" name="_method" value="PUT">');
        }

        function showData(element) {
            $.ajax({
                url: '{{ url(auth()->user()->role . '/jenis_laundry') }}' + '/' + element,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#modal_show_jenisLaundry').modal('show');
                    $('#show_nama').text(data.nama);
                    $('#show_biaya').text(data.biaya);
                },
                error: function() {
                    alert('Error occurred while retrieving data.');
                }
            });
        }

        function deleteData(element) {
            $('#confirm-delete-data').modal('show');

            $('#confirm-delete').off().on('click', function() {
                $.ajax({
                    url: '{{ url(auth()->user()->role . '/jenis_laundry/delete') }}' + '/' + element,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        alert(data.message);
                        location.reload();
                    },
                    error: function() {
                        alert('Error occurred while deleting data.');
                    }
                });
            });
        }

        $(document).ready(function() {
            var datajenisLaundry = $('#data-jenis-laundry').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': '{{ url(auth()->user()->role . '/jenis_laundry/data') }}',
                    'dataType': 'json',
                    'type': 'POST',
                },
                columns: [{
                        data: 'nomor',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_jenis_laundry',
                        name: 'kode_jenis_laundry',
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
                        data: 'biaya',
                        name: 'biaya',
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
                                `<button data-url="{{ url(auth()->user()->role . '/jenis_laundry') }}/` +
                                data +
                                `" class="btn btn-xs btn-warning mr-2 ml-2" onclick="updateData(this)" data-id="` +
                                row.id + `" data-nama="` + row.nama + `"  data-biaya="` + row
                                .biaya + `"><i class="fa fa-edit"></i>Edit</button>` +
                                `<button class="btn btn-xs btn-danger" onclick="deleteData(` +
                                data + `)"><i class="fa fa-trash mr-2 ml-2"></i>Hapus</button>`;
                            return btn;
                        }
                    }
                ]
            });

            $('#form-jenis-laundry').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(data) {
                        $('.form-message').html('');
                        if (data.status) {
                            $('.form-message').html(
                                '<span class="alert alert-success" style="width: 100%">' +
                                data.message + '</span>');
                            $('#form-jenis-laundry')[0].reset();
                            datajenisLaundry.draw(
                                false
                                ); // Reload tabel sesuai dengan halaman pagination yang sedang aktif
                            $('#form-jenis-laundry').attr('action',
                                '{{ url('jenis_laundry') }}');
                            $('#form-jenis-laundry').find('input[name="_method"]').remove();
                        } else {
                            $('.form-message').html(
                                '<span class="alert alert-danger" style="width: 100%">' +
                                data.message + '</span>');
                            alert('error');
                        }

                        if (data.modal_close) {
                            $('.form-message').html('');
                            $('#modal-jenis-laundry').modal('hide');
                        }
                    }
                });
            });
        });
    </script>
@endpush
