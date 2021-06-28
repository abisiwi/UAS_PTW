<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertrx extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = 'id';
    protected $fillable =['id','user_id','status','kode','jumlah_harga'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
