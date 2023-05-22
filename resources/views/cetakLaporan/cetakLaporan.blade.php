<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styling for the PDF */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table thead th {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table tbody td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi Laundry</h1>
    <h3>Tanggal: {{ $tanggal }}</h3>
    <table>
        <thead>
            <tr>
                <th>Kode Order</th>
                <th>Kode Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Jenis Laundry</th>
                <th>Berat</th>
                <th>Total Biaya</th>
                <th>Catatan</th>
                <th>No Hp</th>
                <th>Status Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $l)
            <tr>
                <td>{{ $l->kode_order }}</td>
                <td>{{ $l->pelanggan->kode_pelanggan }}</td>
                <td>{{ $l->pelanggan->nama }}</td>
                <td>{{ $l->tanggal_laundry }}</td>
                <td>{{ $l->jenis_laundry->nama }}</td>
                <td>{{ $l->berat }}</td>
                <td>{{ $l->total }}</td>
                <td>{{ $l->catatan }}</td>
                <td>{{ $l->pelanggan->no_hp }}</td>
                <td>{{ $l->status_bayar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
