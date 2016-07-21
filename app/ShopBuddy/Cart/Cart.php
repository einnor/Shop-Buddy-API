<?php

namespace App\ShopBuddy\Cart;

use App\ShopBuddy\Payment\Payment;
use App\ShopBuddy\Shipment\Shipment;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ShopBuddy\Product\Product;

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
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function shipment() {
        return $this->hasOne(Shipment::class);
    }
}
