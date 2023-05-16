@extends('layouts.template')

@section('content')
<section class="content">

    <form method="POST" action="{{ $url_form }}">
        @csrf
        {!! (isset($pelanggan))? method_field('PUT') : '' !!}
        <div class="form-group">
            <label>Kode Pelanggan</label>
            <input class="form-control @error('kode_pelanggan') is-invalid @enderror" value="{{ isset($pelanggan)? $pelanggan->kode_pelanggan: old('kode_pelanggan') }}" name="kode_pelanggan" type="text" />
            @error('kode_pelanggan')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
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
        <div>
            <label for="id_user">User</label>
            <input id="id_user" name="id_user" class="form-control @error('id_user') is-invalid @enderror" value="{{ $pelanggan->id_user >= 3 ? 'pelanggan' : '' }}" readonly disabled>
            @error('id_user')
                <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-primary mt-5">Simpan</button>
        </div>
    </form>

</section>
@endsection
