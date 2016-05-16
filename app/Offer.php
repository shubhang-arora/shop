<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'shop_id',
        'title',
        'city',
        'description',
        'premium_offer',
        'start_date',
        'end_date'
    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
