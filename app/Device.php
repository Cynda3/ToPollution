<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function Datas()
    {
        return $this->belongsToMany('App\Data', 'meassurements');
    }
}
