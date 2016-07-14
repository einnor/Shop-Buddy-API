<?php

namespace App\ShopBuddy\Product;

use Illuminate\Database\Eloquent\Model;
use App\ShopBuddy\Cart\Cart;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'store_name',
        'store_url',
        'total_price'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}
