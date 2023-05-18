@extends('layouts.template') 
 
@section('content') 
<div class="container"> 
  <form action="/order" method="post" enctype="multipart/form-data">     
    @csrf 
    <div class="form-group"> 
        <label for="kode_order">Kode Order</label>
        <input type="text" class="form-control" required="required" name="title"></br> 

        <label for="tanggal_laundry">Tanggal Laundry: </label>
        <input type="date" class="form-control" required="required" name="tanggal_laundry"></br> 

        <label for="jenis-laundry">Jenis Laundry</label>
        <select name="id_jenis_laundry" class="form-control @error('id_jenis_laundry') is-invalid @enderror" onchange="updateInputValue(this)">
          @foreach($jenis as $js)
            <option value="{{$js->id}}" data-biaya="{{$js->biaya}}">{{$js->nama}}</option>
          @endforeach
        </select>
        @error('id_jenis_laundry')
          <span class="error invalid-feedback">{{ $message }}</span>
        @enderror

        <label for="biaya">Biaya:</label>
        <input type="text" class="form-control" required="required" name="biaya" id="inputBiaya" readonly></br>

        <label for="berat">Berat: </label>
        <input type="text" class="form-control" required="required" name="berat" oninput="hitungTotal()"></br> 

        <label for="total">Total Bayar: </label>
        <input type="text" class="form-control" required="required" name="total" id="inputTotal" readonly></br>

        <label for="catatan">Catatan: </label>
        <textarea type="text" class="form-control" required="required" name="catatan"></textarea></br>

        <label for="status_bayar">Status Pembayaran: </label>
        <input type="text" class="form-control" required="required" name="status_bayar"></br> 

        <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button> 
    </div> 
  </form> 
</div> 
@endsection 
