<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{

    protected $fillable = ['code','city_id'];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
