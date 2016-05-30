<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    protected $fillable = [
        'shop_id',
        'title',
        'description',
        'amount',
        'deleted',
        'approved',
        'banner'

    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
