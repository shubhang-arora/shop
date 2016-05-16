<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }

    public function zipcodes()
    {
        return $this->hasMany('App/Zipcode');
    }
}
