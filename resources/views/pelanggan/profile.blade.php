@extends('layouts.template')

@section('content')
    <section class="content">

        <form method="GET" class="p-3 d-flex flex-column align-items-center justify-content-center" action="{{ url( auth()->user()->role . '/edit_data') }}">
            @csrf
            <div class="form-group w-50">
                <label for="id_user">Username</label>
                <input id="id_user" name="id_user" class="form-control @error('id_user') is-invalid @enderror" value="{{ $pelanggan->id_user ? auth()->user()->username : '' }}" readonly>
                @error('id_user')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label>Nama</label>
                <input class="form-control @error('nama') is-invalid @enderror"
                    value="{{ isset($pelanggan) ? $pelanggan->nama : old('nama') }}" name="nama" type="text" readonly/>
                @error('nama')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label>No Telepon</label>
                <input class="form-control @error('no_hp') is-invalid @enderror"
                    value="{{ isset($pelanggan) ? $pelanggan->no_hp : old('no_hp') }}" name="no_hp" type="text" readonly/>
                @error('no_hp')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label>Email</label>
                <input class="form-control @error('email') is-invalid @enderror"
                    value="{{ isset($pelanggan) ? auth()->user()->email : old('email') }}" name="email" type="text" readonly/>
                @error('email')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-primary mt-5">Perbarui Profile</button>
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
