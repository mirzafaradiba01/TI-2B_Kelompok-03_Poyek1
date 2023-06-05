@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA PETUGAS</h3>
        </div>

        <div class="card-body">
           <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_petugas">Tambah Data</button>
           <table class="table table-bordered table-striped" id="data_petugas">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Petugas</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            </table>
        </div>
    </div>

    </section>
    <div class="modal fade" id="modal_petugas" style="display: none;" aria-hidden="true">
        <form method="post" action="{{ url ( auth()->user()->role . '/petugas') }}" role="form" class="form-horizontal" id="form_petugas">
        @csrf
        <div class="modal-dialog modal-">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Petugas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-message"></div>
                 <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" value="" />
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

    <div class="modal fade" id="modal_show_petugas" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Petugas</h4>
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
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <span id="show_alamat"></span>
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
                    <h5 class="modal-title" id="confirmModalLabel">Hapus Data Petugas</h5>
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
        $('#modal_petugas').modal('show');
        $('#modal_petugas .modal-title').html('Tambah Data Petugas');
        $('#modal_petugas #nama').val('');
        $('#modal_petugas #alamat').val('');
        $('#modal_petugas #no_hp').val('');
    }

    function updateData(th){
        $('#modal_petugas').modal('show');
        $('#modal_petugas .modal-title').html('Edit Data petugas');
        $('#modal_petugas #nama').val($(th).data('nama'));
        $('#modal_petugas #alamat').val($(th).data('alamat'));
        $('#modal_petugas #no_hp').val($(th).data('no_hp'));
        $('#modal_petugas #form_petugas').attr('action', $(th).data('url'));
        $('#modal_petugas #form_petugas').append('<input type="hidden" name="_method" value="PUT">');
    }

        function showData(element) {
        $.ajax({
            url: '{{ url ( auth()->user()->role . '/petugas') }}' + '/' + element,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#modal_show_petugas').modal('show');
                $('#show_nama').text(data.nama);
                $('#show_alamat').text(data.alamat);
                $('#show_no_hp').text(data.no_hp);
            },
            error: function () {
                alert('Error occurred while retrieving data.');
            }
        });
    }

    function deleteData(element) {
        $('#confirmModal').modal('show');

        $('#confirmDelete').off().on('click', function () {
            $.ajax({
                url: '{{ url ( auth()->user()->role . '/petugas/delete') }}' + '/' + element,
                method: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    alert(data.message);
                    location.reload();
                },
                error: function () {
                    alert('Error occurred while deleting data.');
                }
            });
        });
    }
    
    $(document).ready(function () {
    var dataPetugas = $('#data_petugas').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': '{{ url ( auth()->user()->role . '/petugas/data') }}',
            'dataType': 'json',
            'type': 'POST',
        },
        columns: [
            {data: 'nomor', searchable: false, sortable: false},
            {data: 'kode_petugas', name: 'kode_petugas', searchable: true, sortable: false},
            {data: 'nama', name: 'nama', searchable: true, sortable: false},
            {data: 'alamat', name: 'alamat', searchable: true, sortable: false},
            {data: 'no_hp', name: 'no_hp', searchable: true, sortable: false},
            {
                data: 'id',
                name: 'id',
                sortable: false,
                searchable: false,
                render: function (data, type, row) {
                    var btn = `<button data-url="{{ url ( auth()->user()->role . '/petugas')}}/` + data + `" class="btn btn-xs btn-warning mr-2 ml-2" onclick="updateData(this)" data-id="` + row.id + `" data-nama="` + row.nama + `"  data-alamat="` + row.alamat + `" data-no_hp="` + row.no_hp + `"><i class="fa fa-edit"></i>Edit</button>` +
                        `<button href="{{ url ( auth()->user()->role. '/petugas/') }}/` + data + ` " onclick="showData(` + data + `)" class="btn btn-xs btn-info mr-2 ml-2"><i class="fa fa-list"></i>Detail</button>` +
                        `<button class="btn btn-xs btn-danger" onclick="deleteData(` + data + `)"><i class="fa fa-trash mr-2 ml-2"></i>Hapus</button>`;
                    return btn;
                }
            }
        ]
    });

    $('#form_petugas').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                $('.form-message').html('');
                if (data.status) {
                    $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                    $('#form_petugas')[0].reset();
                    dataPetugas.draw(false); // Reload tabel sesuai dengan halaman pagination yang sedang aktif
                    $('#form_petugas').attr('action', '{{ url('petugas') }}');
                    $('#form_petugas').find('input[name="_method"]').remove();
                } else {
                    $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                    alert('error');
                }

                if (data.modal_close) {
                    $('.form-message').html('');
                    $('#modal_petugas').modal('hide');
                }
            }
        });
    });
});

</script>
@endpush
