<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function advertisements()
    {
        return $this->hasMany('App\Advertisement');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
