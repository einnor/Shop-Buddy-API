<?php

namespace App\ShopBuddy\Shipment;

use App\ShopBuddy\Cart\Cart;
use App\ShopBuddy\Traits\UuidModel;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use UuidModel;

    protected $table = 'shipments';

    protected $fillable = [
        'cart_id',
        'status',
        'comment'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}
