<?php

namespace App\ShopBuddy\Product;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\ShopBuddy\Cart\Cart;

class Product extends Model
{
    use Uuids;

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

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}
