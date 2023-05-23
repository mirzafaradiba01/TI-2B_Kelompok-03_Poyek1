@extends('layouts.template')

@section('content')
<section class="content">

    <form method="POST" action="{{ $url_form }}">
        @csrf
        {!! (isset($petugas))? method_field('PUT') : '' !!}
        <div class="form-group">
            <label>Kode petugas</label>
            <input class="form-control @error('kode_petugas') is-invalid @enderror" value="{{ isset($petugas)? $petugas->kode_petugas: old('kode_petugas') }}" name="kode_petugas" type="text" />
            @error('kode_petugas')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
          <div class="form-group">
            <label>Nama petugas</label>
            <input class="form-control @error('nama') is-invalid @enderror" value="{{isset($petugas)? $petugas->nama:old('nama') }}" name="nama" type="text"/>
            @error('nama')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control @error('alamat') is-invalid @enderror" value="{{isset($petugas)? $petugas->alamat:old('alamat') }}" name="alamat" type="text"/>
            @error('alamat')
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
        <div class="form-group">
            <button class="btn btn-sm btn-primary mt-5">Simpan</button>
        </div>
    </form>

</section>
@endsection
