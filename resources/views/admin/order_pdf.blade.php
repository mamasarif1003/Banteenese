<html>

<head>
    <title>Laporan Pemasukan - Bantenese Furniture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Laporan Pemasukkan - Bantenese Furniture</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Nama User</th>
                <th>Kurir</th>
                <th>Pembayaran</th>
                <th>Tagihan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($order as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $p->date }}</td>
                <th scope="row">{{ $p->code }}</th>
                <td>{{ $p->username }}</td>
                <td>{{ $p->kurir }}</td>
                <td>{{ $p->pembayaran }}</td>
                <td>Rp {{ number_format($p->total_tagihan) }}</td>
                
                @if($p->status=='1')
                <td>Belum Dibayar</td>
                @endif
                
                @if($p->status=='2')
                <td>Sudah Dibayar / Proses</td>
                @endif
                
                @if($p->status=='3')
                <td>Transaksi Selesai</td>
                @endif
                
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
