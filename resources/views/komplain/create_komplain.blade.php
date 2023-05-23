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
                <div class="form-group">
                  <label>ID Pelanggan</label>
                  <input class="form-control @error('id_pelanggan') is-invalid @enderror" value="{{$komplain}}" name="id_pelanggan" type="text"/>
                  @error('id_pelanggan')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
              </div>
                <div class="form-group">
                  <label for="komplain">Komplain: </label>
                  <textarea type="text" class="form-control @error('komplain') is-invalid @enderror" required="required" name="komplain"></textarea></br>
                  @error('komplain')
                      <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="gambar">Image</label>
                <input type="file" id="gambar" class="form-control" name="gambar" value="" required="required">
                @error('gambar')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
