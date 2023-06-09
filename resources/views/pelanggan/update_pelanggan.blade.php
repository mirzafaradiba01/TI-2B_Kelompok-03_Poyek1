@extends('layouts.template')

@section('content')
    <section class="content">

        <form method="POST" class="p-3 d-flex flex-column align-items-center justify-content-center" action="{{ $url_form . '/' . $pelanggan->id }}">
            @csrf
            {{-- {!! isset($pelanggan) ? method_field('PUT') : '' !!} --}}
            <div class="form-group w-50">
                <label for="username">Username</label>
                <input id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $pelanggan->users->username ? auth()->user()->username : '' }}">
                @error('username')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label>Nama</label>
                <input class="form-control @error('nama') is-invalid @enderror"
                    value="{{ isset($pelanggan) ? $pelanggan->nama : old('nama') }}" name="nama" type="text" />
                @error('nama')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label>No Telepon</label>
                <input class="form-control @error('no_hp') is-invalid @enderror"
                    value="{{ isset($pelanggan) ? $pelanggan->no_hp : old('no_hp') }}" name="no_hp" type="text" />
                @error('no_hp')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label>Email</label>
                <input class="form-control @error('email') is-invalid @enderror"
                    value="{{ isset($pelanggan) ? auth()->user()->email : old('email') }}" name="email" type="text" />
                @error('email')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-primary mt-5">Simpan</button>
            </div>
            <div class="form-group w-50">
                <input class="form-control @error('kode_pelanggan') is-invalid @enderror"
                    value="{{ isset($pelanggan) ? $pelanggan->kode_pelanggan : old('kode_pelanggan') }}"
                    name="kode_pelanggan" type="text" hidden />
                @error('kode_pelanggan')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
        </form>
    </section>
@endsection
