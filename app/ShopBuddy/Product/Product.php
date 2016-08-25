<?php

namespace App\ShopBuddy\Product;

use App\ShopBuddy\Traits\UuidModel;
use Illuminate\Database\Eloquent\Model;
use App\ShopBuddy\Cart\Cart;

class Product extends Model
{
    use UuidModel;

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
