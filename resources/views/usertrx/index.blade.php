@extends('layouts.master')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Transaksi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Transaksi</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>User Id</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Kode</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = $trx->firstItem() - 1 ; ?>
                  @foreach ($trx as $data)
                  <?php $no++ ;?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data->user->name }}</td>
                      <td>{{ $data->tanggal }}</td>
                      <td>
                      @if($data->status == 1)
                      Sudah Pesan & Belum dibayar
                      @else
                      Sudah dibayar 
                      @endif
                      </td>
                      <td>{{ $data->kode }}</td>
                      <td>Rp. {{ number_format($data->jumlah_harga, 0, ',', '.') }}</td>
                      <td><form action="{{ route('usertrx.destroy', $data->id) }}" method="post">@csrf
                        <a href="{{ route('usertrx.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <button class="btn btn-sm btn-danger pull-right" 
                        onClick="Return confirm('Apakah anda yakin?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <div>Jumlah Transaksi : {{ $jumlah_trx }}</div>
					      <div> {{ $trx->links() }} </div>
                <br>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
@endsection