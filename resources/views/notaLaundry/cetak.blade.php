<!DOCTYPE html>
<html>
    <head>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .nota-container {
        width: 300px;
        margin: 0 auto;
    }

    .header {
        text-align: center;
    }

    .info {
        margin-top: 20px;
    }

    .footer {
        margin-top: 40px;
    }

    .thank-you {
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }
</style>
</head>
<div class="nota-container">
    <div class="header">
        <h1>NOTA LAUNDRY</h1>
        <h2>**** AYA LAUNDRY ****</h2>
    </div>

    <div class="info">
        @foreach($transaksi as $notaLaundry)
        <p>Tanggal : {{ $notaLaundry->tanggal_laundry }}</p>
        <p>Kode Order : {{ $notaLaundry->kode_order }}</p>
        <p>Nama Pelanggan : {{ $notaLaundry->pelanggan->nama }}</p>
        <p>Jenis Layanan : {{ $notaLaundry->jenis_laundry->nama}}</p>
        <p>Berat Cucian : {{ $notaLaundry->berat }} Kg</p>
        <p>Total Harga : Rp {{ number_format($notaLaundry->total, 0, ',', '.') }}</p>
        
        <p>{{ $notaLaundry->order }}</p>
        @endforeach
        
    </div>

    <div class="footer">
        <p>Terima kasih atas kunjungan Anda!</p>
    </div>

    <div class="thank-you">
        <p>Terima kasih!</p>
    </div>
</div>
