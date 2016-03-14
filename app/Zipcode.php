<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    public function cities()
    {
        return $this->belongsTo('App/City');
    }
}
