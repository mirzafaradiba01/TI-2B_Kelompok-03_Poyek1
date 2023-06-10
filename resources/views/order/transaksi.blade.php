@extends('layouts.template')

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data-transaksi">
                <thead>
                    <th>No</th>
                    <th>Kode Order</th> `
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Jenis Laundry</th>
                    <th>Berat</th>
                    <th>Total Biaya</th>
                    <th>Catatan</th>
                    <th>No Hp</th>
                    <th>Status Bayar</th>
                    <th>Action</th>
                </thead>
            </table>
        </div>
    </section>

    <div class="modal fade" id="modal-transaksi" style="display: none;" aria-hidden="true">
        <form method="post" action="{{ url(auth()->user()->role . '/transaksi') }}" role="form" class="form-horizontal"
            id="form-transaksi">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-capitalize">tambah data transaksi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-message"></div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">kode order</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="kode-order" name="kode_order"
                                    value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="tanggal-laundry" name="tanggal_laundry"
                                    value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">jenis laundry</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="jenis-laundry" name="jenis_laundry"
                                    value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">berat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="berat-laundry" name="berat"
                                    value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">total biaya</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="total-bayar" name="total"
                                    value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">catatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="catatan-laundry" name="catatan"
                                    value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">no. hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="no-hp" name="no_hp"
                                    value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label text-capitalize">status bayar</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm" id="status-bayar" name="status_bayar">
                                    <option value="">---Pilih Status Bayar---</option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas" selected>Belum Lunas</option>
                                    <option value="Bayar di Akhir">Bayar di Akhir</option>
                                </select>
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
@endsection

@push('js')

    <script>

        function updateData(th) {
            var statusBayar = $(th).data('status_bayar');
            
            $('#modal-transaksi').modal('show');
            $('#modal-transaksi .modal-title').html('Edit Data Transaksi');
            $('#modal-transaksi #kode-order').val($(th).data('kode_order'));
            $('#modal-transaksi #nama').val($(th).data('nama'));
            $('#modal-transaksi #tanggal-laundry').val($(th).data('tanggal_laundry'));
            $('#modal-transaksi #jenis-laundry').val($(th).data('jenis_laundry'));
            $('#modal-transaksi #berat-laundry').val($(th).data('berat'));
            $('#modal-transaksi #total-bayar').val($(th).data('total'));
            $('#modal-transaksi #catatan-laundry').val($(th).data('catatan'));
            $('#modal-transaksi #no-hp').val($(th).data('no_hp'));
            $('#modal-transaksi #status-bayar').val(statusBayar);
            $('#modal-transaksi #form-transaksi').attr('action', $(th).data('url'));
            $('#modal-transaksi #form-transaksi').append('<input type="hidden" name="_method" value="PUT">');
        }

        $(document).ready(function() {
            var dataPelanggan = $('#data-transaksi').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': '{{ url(auth()->user()->role . '/transaksi/data') }}',
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

            $('#form-transaksi').submit(function(e) {
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
                            $('#form-transaksi')[0].reset();
                            dataPelanggan.draw(
                                false
                                ); // Reload tabel sesuai dengan halaman pagination yang sedang aktif
                            $('#form-transaksi').attr('action', '{{ url('pelanggan') }}');
                            $('#form-transaksi').find('input[name="_method"]').remove();
                        } else {
                            $('.form-message').html(
                                '<span class="alert alert-danger" style="width: 100%">' +
                                data.message + '</span>');
                            alert('error');
                        }

                        if (data.modal_close) {
                            $('.form-message').html('');
                            $('#modal-transaksi').modal('hide');
                        }
                    }
                });
            });
        });

    </script>

@endpush
