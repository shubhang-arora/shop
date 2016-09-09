<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $fillable = ['state_name'];

    public function cities()
    {
        return $this->hasMany('App\City');
    }



}
