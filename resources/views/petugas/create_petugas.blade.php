@extends('layouts.template')

@section('content')
<section class="content">
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
            <form method="POST" action="{{ $url_form }}">
                @csrf
                {!! (isset($petugas))? method_field('PUT') : '' !!}
                <div class="form-group">
                    <label>Nama Petugas</label>
                    <input class="form-control @error('nama') is-invalid @enderror" value="{{isset($petugas)? $petugas->nama:old('nama') }}" name="nama" type="text"/>
                    @error('nama')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input class="form-control @error('no_hp') is-invalid @enderror" value="{{ isset($petugas)? $petugas->no_hp:old('no_hp') }}" name="no_hp" type="text"/>
                    @error('no_hp')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-primary ml-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
