<?php

namespace App\ShopBuddy\Cart;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'store_name',
        'store_url',
        'total_price'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
