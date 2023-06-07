@extends('layouts.template')

@section('content')
    <section class="content">

        <!--Default box-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DATA pelanggan</h3>
            </div>

            <div class="card-body">
                <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_pelanggan">Tambah
                    Data</button>
                <table class="table table-bordered table-striped" id="data_pelanggan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Pelanggan</th>
                            <th>Username</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </section>
    <div class="modal fade" id="modal_pelanggan" style="display: none;" aria-hidden="true">
        <form method="post" action="{{ url(auth()->user()->role . '/pelanggan') }}" role="form"
            class="form-horizontal" id="form_pelanggan">
            @csrf
            <div class="modal-dialog modal-">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Pelanggan</h4>
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
                            <label class="col-sm-2 control-label col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="username" name="username"
                                    value="" />
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label">No. HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"
                                    value="" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="modal_show_pelanggan" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <span id="show_nama"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">No. HP</label>
                        <div class="col-sm-10">
                            <span id="show_no_hp"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Hapus Data Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Yakin Ingin Hapus Data Ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

<script>

    function tambahData() {
        $('#modal_pelanggan').modal('show');
        $('#modal_pelanggan .modal-title').html('Tambah Data Pelanggan');
        $('#modal_pelanggan #nama').val('');
        $('#modal_pelanggan #no_hp').val('');
    }

    function updateData(th) {
        $('#modal_pelanggan').modal('show');
        $('#modal_pelanggan .modal-title').html('Edit Data Pelanggan');
        $('#modal_pelanggan #nama').val($(th).data('nama'));
        $('#modal_pelanggan #username').val($(th).data('username'));
        $('#modal_pelanggan #no_hp').val($(th).data('no_hp'));
        $('#modal_pelanggan #form_pelanggan').attr('action', $(th).data('url'));
        $('#modal_pelanggan #form_pelanggan').append('<input type="hidden" name="_method" value="PUT">');
    }

    function showData(element) {
        $.ajax({
            url: '{{ url(auth()->user()->role . '/pelanggan') }}' + '/' + element,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#modal_show_pelanggan').modal('show');
                $('#show_nama').text(data.nama);
                $('#show_username').text(data.username);
                $('#show_no_hp').text(data.no_hp);
            },
            error: function() {
                alert('Error occurred while retrieving data.');
            }
        });
    }

    function deleteData(element) {
        $('#confirmModal').modal('show');

        $('#confirmDelete').off().on('click', function() {
            $.ajax({
                url: '{{ url(auth()->user()->role . '/pelanggan/delete') }}' + '/' + element,
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
        var dataPelanggan = $('#data_pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                'url': '{{ url(auth()->user()->role . '/pelanggan/data') }}',
                'dataType': 'json',
                'type': 'POST',
            },
            columns: [{
                    data: 'nomor',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'kode_pelanggan',
                    name: 'kode_pelanggan',
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
                    data: 'username',
                    name: 'username',
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
                    data: 'id',
                    name: 'id',
                    sortable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        var btn =
                            `<button data-url="{{ url(auth()->user()->role . '/petugas') }}/` + data +
                            `" class="btn btn-xs btn-warning mr-2 ml-2" onclick="updateData(this)" data-id="` +
                            row.id + `" data-nama="` + row.nama + `"  data-username="` + row.username + `" data-no_hp="` + row.no_hp + `"><i class="fa fa-edit"></i>Edit</button>` + `<button href="{{ url(auth()->user()->role . '/petugas/') }}/` + data + ` " onclick="showData(` + data + `)" class="btn btn-xs btn-info mr-2 ml-2"><i class="fa fa-list"></i>Detail</button>` + `<button class="btn btn-xs btn-danger" onclick="deleteData(` + data + `)"><i class="fa fa-trash mr-2 ml-2"></i>Hapus</button>`;
                        return btn;
                    }
                }
            ]
        });
    });

</script>
@endpush
