@extends('layouts.template')

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">CETAK LAPORAN TRANSAKSI</h3>
        </div>
        <div class="card-body">
            <h1>Pilih Tanggal Laporan</h1>
            <form action="{{ route('admin.form_cetak') }}" method="post">
                @csrf
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" required>
                <button type="submit">Cetak Laporan Transaksi</button>
            </form>
        </div>
    </div>
</section>
@endsection
