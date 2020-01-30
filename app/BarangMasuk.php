<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';

    protected $fillable = ['supplier_id', 'smartphone_id', 'jumlah', 'bukti'];

    public function smartphone()
    {
        return $this->belongsTo('App\Smartphone');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
