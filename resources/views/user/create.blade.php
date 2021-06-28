@extends('layouts.master')
@section('content')
<div class="container">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-5">
                <input type="text" class="col-sm-2 form-control" name="kode" id="kode">
                </div>
            </div>
            <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="nama" id="nama">
                </div>
            </div>
            <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="alamat" id="alamat">
                </div>
            </div>
            <div class="form-group row">
            <label for="nohp" class="col-sm-2 col-form-label">No Hp</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="nohp" id="nohp">
                </div>
            </div>
            <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" name="confirmation" id="confirmation">
                </div>
            </div>
            <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
            </div>
        </form>

        <!-- /.content -->
    </section>
</div>
@endsection

