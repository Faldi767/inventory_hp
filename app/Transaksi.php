<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['smartphone_id', 'toko_id', 'jumlah', 'bukti', 'status'];

    public function smartphone()
    {
        return $this->belongsTo('App\Smartphone');
    }

    public function toko()
    {
        return $this->belongsTo('App\Toko');
    }
}
