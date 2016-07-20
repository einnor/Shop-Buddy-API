<?php

namespace App\ShopBuddy\Payment;

use App\ShopBuddy\Cart\Cart;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'cart_id',
        'transaction_tracking_id',
        'merchant_reference',
        'status'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }
}
