@extends('layouts.template')

@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">KOMPLAIN</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <form action="{{ $url_form }}" method="POST" enctype="multipart/form-data">
                @csrf
               {!!(isset($komplain))?method_field('PUT'):'' !!}

                <div class="form-group">
                  
                    <label>Kode Pelanggan</label>
                    <input class="form-control @error('kode_komplain') is-invalid @enderror" value="{{$komplain->kode_komplain}}" name="kode_komplain" type="text"/>
                    @error('kode_komplain')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                 
              </div>
               
              <div class="form-group">
                
                  <label>Id Pelanggan</label>
                  <input class="form-control @error('id_pelanggan') is-invalid @enderror" value="{{$komplain->id_pelanggan}}" name="id_pelanggan" type="text"/>
                  @error('id_pelanggan')
                      <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
               
            </div>
            <div class="form-group">
                
                <label>Nama Pelanggan</label>
                <input class="form-control @error('nama') is-invalid @enderror" value="{{$komplain->pelanggan->nama}}" type="text"/>
                @error('nama')
                    <span class="error invalid-feedback">{{ $message }} </span>
                @enderror
             
          </div>
           
            <div class="form-group">
                
                  <label>Komplain</label>
                  <input class="form-control @error('pesan') is-invalid @enderror" value="{{$komplain->pesan}}" name="pesan" type="text"/>
                  @error('pesan')
                      <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
               
            </div>
            <div class="form-group">
                <img src="{{asset('storage/'.$komplain->gambar)}}"  width="100px" alt="">
                
                <div>
                  <label>Gambar</label>
                  {{-- <input class="form-control @error('gambar') is-invalid @enderror" value="{{isset($komplain)?$komplain->gambar:old('gambar')}}" name="gambar" type="file"/> --}}
                </div>
                  @error('gambar')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                 
            </div>
            <div class="form-group">
                
                  <label>Balasan</label>
                  <input class="form-control @error('balasan') is-invalid @enderror" value="" placeholder="{{$komplain->balasan ? '' : 'Masukan Balasan..'}}" name="balasan" type="text"/>
                  @error('balasan')
                      <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
               
            </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
