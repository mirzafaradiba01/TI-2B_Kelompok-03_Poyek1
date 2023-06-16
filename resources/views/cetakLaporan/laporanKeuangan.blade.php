<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan Aya Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Laporan Keuangan Aya Laundry</h1>
    <br><br>
    <h3>Laporan Keuangan Bulanan </h3>
    <table>
        <tr>
            <th>Bulan</th>
            <th>Total Pendapatan</th>
        </tr>
        @foreach($pendapatanPerBulan as $bulan => $pendapatan)
            <tr>
                <td>{{ $bulan }}</td>
                <td>Rp {{ number_format($pendapatan, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <h3>Detail Laporan Per Bulan</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Kode Order</th>
            <th>Berat</th>
            <th>Total Biaya</th>
           
        </tr>
        @foreach($transaksi as $l)
            <tr>
                <td>{{ $l->tanggal_laundry }}</td>
                <td>{{ $l->kode_order }}</td>
                {{-- <td>{{ $k->jenis_laundry->nama }}</td> --}}
                <td>{{ $l->berat }}</td>
                <td>Rp {{ $l->total }}</td>
        @endforeach
            <tr>
               
                <th>Total Pendapatan</th>
                <td></td>
                <td></td>
                <td>Rp {{ number_format(array_sum(array_values($pendapatanPerBulan)), 0, ',', '.') }}</td>
                </tr>
    </table>
</body>
</html>
