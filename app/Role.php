<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $table = 'role';

    protected $fillable = ['nama_role'];

    public function client()
    {
        return $this->hasMany('App\Client');
    }
}
