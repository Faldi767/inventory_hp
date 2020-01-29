<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $table = 'brand';

    protected $fillable = ['nama_brand'];

    public function smartphone()
    {
        return $this->hasMany('App\Smartphone');
    }
}
