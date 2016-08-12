<?php

namespace App\ShopBuddy\Payment;

use App\ShopBuddy\Cart\Cart;
use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Uuids;

    protected $table = 'payments';

    protected $fillable = [
        'cart_id',
        'transaction_tracking_id',
        'merchant_reference',
        'status'
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
