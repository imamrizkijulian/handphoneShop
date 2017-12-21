<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxBeli extends Model
{
     protected $fillable = ['kode_trx_beli', 'user_id', 'suplier_id', 'keterangan'];

    public function suplier()
    {
    	return $this->belongsTo('App\Suplier');
    }
}
