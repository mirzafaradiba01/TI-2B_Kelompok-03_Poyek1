@extends('layouts.template')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA PELANGGAN</h3>

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
            <form method="POST" action="{{ url( auth()->user()->role . '/pelanggan') }}" enctype="multipart/form-data">
                @csrf
                {!! (isset($pelanggan))? method_field('PUT') : '' !!}
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input class="form-control @error('nama') is-invalid @enderror" value="{{isset($pelanggan)? $pelanggan->nama:old('nama') }}" name="nama" type="text"/>
                    @error('nama')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input class="form-control @error('no_hp') is-invalid @enderror" value="{{ isset($pelanggan)? $pelanggan->no_hp:old('no_hp') }}" name="no_hp" type="text"/>
                    @error('no_hp')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_user">User</label>
                    <select id="id_user" name="id_user" class="form-control @error('id_user') is-invalid @enderror">
                        @foreach($users as $akun_user)
                            <option value="{{ $akun_user->id }}">
                                {{ $akun_user->username }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_user')
                        <span class="error invalid-feedback">{{ $message }} </span>
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
