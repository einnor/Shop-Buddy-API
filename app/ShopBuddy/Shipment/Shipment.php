<?php

namespace App\ShopBuddy\Shipment;

use App\ShopBuddy\Cart\Cart;
use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use Uuids;

    protected $table = 'shipments';

    protected $fillable = [
        'cart_id',
        'status',
        'comment'
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
