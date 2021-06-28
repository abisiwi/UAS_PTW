@extends('layouts.master')
@section('content')
<div class="container">
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
    <form method="post" enctype="multipart/form-data" action="{{ route('usertrx.update', $trx->id) }}">
        @csrf

            <div class="form-group row">
                <div class="col-sm-10">
                <input type="hidden"name="user_id" id="user_id" value="{{$trx->user_id}}">
                </div>
            </div>

            <div class="form-group row">
              <label for="status" class="col-sm-2 col-form-label">Status Sebelumnya</label>
                  <div class="col-sm-10">
                  <input type="text" class="col-sm-2 form-control"
                  @if ($trx->status == 0)
                      value="Sudah Dibayar"
                  @else
                    value="Belum Dibayar"
                  @endif
                   disabled>
                  </div>
              </div>
  
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status Pembayaran </label>
                <div class="col-sm-10">
                <select class="custom-select col-sm-2 col-form-label" name="status" id="status">
                  <option value="0">Dibayar</option>
                  <option value="1">Belum Dibayar</option>
                </select>
                </div>
              </div>


            <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                <input type="text" class="col-sm-5 form-control" name="kode" id="kode" value="{{$trx->kode}}">
                </div>
            </div>
            <div class="form-group row">
            <label for="jumlah_harga" class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-sm-10">
                <input type="text" class="col-sm-5 form-control" name="jumlah_harga" id="jumlah_harga" value="{{$trx->jumlah_harga}}">
                </div>
            </div>
            <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
        </form>

    </section>
</div>
@endsection

