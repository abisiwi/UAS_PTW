<!DOCTYPE html>
<head>
    <title>Cetak PDF Data Barang</title>
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
    <h2 align="center">Cetak Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 10%">Kode</th>
                <th style="width: 16.66%">Nama Barang</th>
                <th style="width: 10%">Gambar</th>
                <th style="width: 12%">Harga</th>
                <th style="width: 14%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($barang as $data)
            <tr align="center">
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>
                <img src="{{ url('uploads') }}/{{ $data->gambar }}" width="100" alt="...">
                </td>
                <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ $data->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>