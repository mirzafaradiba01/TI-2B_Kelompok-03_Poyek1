@extends('layout.template')

@section('content')
<section class="content">

    <!--Default box-->
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
                    <input class="form-control @error('nama_pelanggan') is-invalid @enderror" value="{{isset($pelanggan)? $pelanggan->nama_pelanggan:old('nama_pelanggan') }}" name="nama_pelanggan" type="text"/>
                    @error('nama_pelanggan')
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
                  </div>
      

                <div class="form-group">
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->

    </section>
@endsection