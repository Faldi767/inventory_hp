<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toko extends Model
{
    use SoftDeletes;
    protected $table = 'toko';

    protected $fillable = ['nama_toko'];

    public function client()
    {
        return $this->hasMany('App\Client');
    }
}
