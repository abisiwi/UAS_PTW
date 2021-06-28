@extends('layouts.master')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Barang</h3>
                <p align="right"><a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary pull-right"
                style="margin-top: -8px">Tambah Data</a></p>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Gambar</th>
                      <th>Harga</th>
                      <th>Stock</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = $barang->firstItem() - 1 ; ?>
                  @foreach ($barang as $data)
                  <?php $no++ ;?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data->nama_barang }}</td>
                      <td>{{ $data->gambar }}</td>
                      <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                      <td>{{ $data->stok }}</td>
                      <td>{{ $data->keterangan }}</td>
                      <td><form action="{{ route('barang.destroy', $data->id) }}" method="post">@csrf
                        <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <button class="btn btn-sm btn-danger pull-right" 
                        onClick="Return confirm('Apakah anda yakin?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <div>Jumlah Barang : {{ $jumlah_data }}</div>
					      <div> {{ $barang->links() }} </div>
                <br>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
@endsection