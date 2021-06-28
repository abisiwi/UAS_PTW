<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{

	protected $table = 'pesanan_details';
    protected $primaryKey = 'id';

    public function barang()
	{
	      return $this->belongsTo('App\Barang','barang_id', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\Pesanan','pesanan_id', 'id');
	}
}
