@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-left">
        @foreach($barangs as $barang)
        <div class="col-md-4 mt-4">
            <div class="card">
              <img src="{{ url('uploads') }}/{{ $barang->gambar }}" width="500" height="300" class="card-img-top" alt="Image">
              <div class="card-body">
                <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($barang->harga)}} <br>
                    
                    <hr>
                    <strong>Keterangan :</strong> <br>
                    {{ $barang->keterangan }} 
                </p>
                <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary">Pesan</a>
              </div>
            </div> 
        </div>
        @endforeach
    </div>
</div>
@endsection
