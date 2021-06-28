<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $fillable =['id','nama_barang','gambar','harga','keterangan','stok'];
}
