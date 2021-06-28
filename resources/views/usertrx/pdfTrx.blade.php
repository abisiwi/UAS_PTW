<!DOCTYPE html>
<head>
    <title>Cetak PDF Data Transaksi</title>
</head>
<body>
    <style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th,
        table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }
        a{
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
        .tengah{
            text-align: center;
        }
    </style>
    <h2 align="center">Cetak Data Transaksi</h2>
    <table>
        <thead>
                <th style="width: 12%">Nama User</th>
                <th style="width: 12%">Tanggal</th>
                <th style="width: 10%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($trx as $data)
            <tr>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>Rp. {{ number_format($data->jumlah_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <center>
            <p><strong>Total Pendapatan : Rp. {{ $tot }}</strong></p>
        </center>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>