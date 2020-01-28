<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $table = 'client';

    protected $fillable = ['role_id', 'user_nama', 'username', 'password', 'avatar'];

    public function role() 
    {
        return $this->belongsTo('App\Role');
    }
}
