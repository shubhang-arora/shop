<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    protected $fillable = [
        'shop_id',
        'title',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
