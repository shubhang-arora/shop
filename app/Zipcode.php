<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
