<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = ['kode_suplier', 'nama_suplier', 'alamat', 'telepon', 'opsional'];

    public function barang()
    {
    	return $this->hasMany('App\Barang');
    }
}
