@extends('layouts.template')

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">CETAK LAPORAN KEUANGAN</h3>
        </div>
        <div class="card-body">
            <h1>Pilih Laporan Keuangan</h1>
            <form action="{{ url( auth()->user()->role . '/cetak_keuangan') }}" method="post">
                @csrf
                <label for="tanggal_akhir">Tanggal Awal:</label>
                <input type="date" id="tanggal_awal" name="tanggal_awal" required>
                <label for="tanggal_akhir">Tanggal Akhir:</label>
                <input type="date" id="tanggal_akhir" name="tanggal_akhir" required>
                <button class="btn btn-primary" type="submit">Cetak Laporan Keuangan</button>
            </form>
        </div>
    </div>
</section>
@endsection