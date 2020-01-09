<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public function Device()
    {
        return $this->belongsToMany('App\Device', 'meassurements');
    }
}
