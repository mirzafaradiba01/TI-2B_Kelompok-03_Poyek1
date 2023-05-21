@extends('layouts.template')

@section('content')
    <section class="content">

        <!--Default box-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DATA PETUGAS</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $url_form }}" enctype="multipart/form-data">
                    @csrf
                    @isset($petugas)
                        @method('PUT')
                    @endisset
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <input class="form-control @error('nama') is-invalid @enderror"
                            value="{{ isset($petugas) ? $petugas->nama : old('nama') }}" name="nama" type="text" />
                        @error('nama')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror"
                            value="{{ isset($petugas) ? $petugas->alamat : old('alamat') }}" name="alamat"
                            type="text" />
                        @error('alamat')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input class="form-control @error('no_hp') is-invalid @enderror"
                            value="{{ isset($petugas) ? $petugas->no_hp : old('no_hp') }}" name="no_hp" type="text" />
                        @error('no_hp')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary mt-5">Simpan</button>
                    </div>
                </form>
                <div class="card-footer"></div>
            </div>
        </div>
    </section>
@endsection
