<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = ['kode_supplier', 'nama_supplier', 'alamat', 'telepon', 'opsional'];

    public function barang()
    {
    	return $this->hasMany('App\Barang');
    }
}
