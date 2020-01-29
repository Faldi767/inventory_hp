<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Smartphone extends Model
{
    use SoftDeletes;
    protected $table = 'smartphone';

    protected $fillable = ['brand_id', 'nama_smartphone'];

    public function brand() 
    {
        return $this->belongsTo('App\Brand');
    }
}