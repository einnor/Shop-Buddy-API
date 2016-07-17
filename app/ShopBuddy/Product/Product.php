<?php

namespace App\ShopBuddy\Product;

use Illuminate\Database\Eloquent\Model;
use App\ShopBuddy\Cart\Cart;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'asin_code',
        'name',
        'price',
        'quantity',
        'url',
        'color',
        'weight',
        'length',
        'width',
        'height',
        'size'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}
