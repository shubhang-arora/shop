<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'shop_id',
        'link',
        'fav'
    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

}
