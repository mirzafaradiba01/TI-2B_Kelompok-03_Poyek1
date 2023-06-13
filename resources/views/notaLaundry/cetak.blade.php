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
        padding-top: 2px
    }

    .info {
        margin-top: 20px;
    }

    .footer {
        margin-top: 40px;
        text-align: center;
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
        <h3>NOTA LAUNDRY</h3>
        <h4>**** AYA LAUNDRY ****</h4>
        <p>Jl.Soekarno Hatta No.19 Malang</p>
        <p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
        <p>{{$jam_sekarang}} {{ $tanggal_sekarang }}</p>
        <p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>
    </div>

    <div class="info">
       
        @foreach($transaksi as $notaLaundry)
        <p>Tanggal : {{ $notaLaundry->tanggal_laundry }}</p>
        <p>Kode Order : {{ $notaLaundry->kode_order }}</p>
        <p>Nama Pelanggan : {{ $notaLaundry->pelanggan->nama }}</p>
        <p>Jenis Layanan : {{ $notaLaundry->jenis_laundry->nama}}</p>
        <p>Berat Cucian : {{ $notaLaundry->berat }} Kg</p>
        <p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>
        <p>Total Harga : Rp {{ number_format($notaLaundry->total, 0, ',', '.') }}</p>
        
        <p>{{ $notaLaundry->order }}</p>
        @endforeach
        
    </div>
    <div class="div-note">
        <p> <i>Note:Silahkan tunjukkan nota pada saat pengambilan laundry</i></p>
    </div>

    <div class="footer">
        <p>Terima kasih atas kunjungan Anda!</p>
    </div>

    <div class="thank-you">
        <p>Terima kasih!</p>
    </div>
</div>
