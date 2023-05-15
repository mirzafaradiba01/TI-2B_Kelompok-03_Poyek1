@extends('layouts.template') 
 
@section('content') 
<div class="container"> 
  <form action="/order" method="post" enctype="multipart/form-data">     
    @csrf 
    <div class="form-group"> 
        <label for="kode_order"></label><input type="text" class="form-control" required="required" name="title"></br> 
        <label for="tanggal_laundry">Tanggal Laundry: </label><textarea type="text" class="form-control" required="required" name="tanggal_laundry"></textarea></br> 
        <label for="berat">Berat Laundry: </label><input type="text" class="form-control" required="required" name="berat"></br> 
        <label for="total">Total Bayar: </label><input type="text" class="form-control" required="required" name="total"></br> 
        <label for="catatan">Catatan: </label><input type="text" class="form-control" required="required" name="catatan"></br> 
        <label for="status_bayar">Status Pembayaran: </label><input type="text" class="form-control" required="required" name="status_bayar"></br> 
        <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button> 
    </div> 
  </form> 
</div> 
@endsection 
