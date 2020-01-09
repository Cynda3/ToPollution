<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Datas()
    {
        return $this->belongsToMany('App\Data', 'meassurements');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
