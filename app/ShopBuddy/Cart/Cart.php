<?php

namespace App\ShopBuddy\Cart;

use App\ShopBuddy\Payment\Payment;
use App\ShopBuddy\Shipment\Shipment;
use App\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ShopBuddy\Product\Product;

class Cart extends Model
{
    use Uuids;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'store_name',
        'store_url',
        'total_price'
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function shipments() {
        return $this->hasMany(Shipment::class);
    }
}
