<?php

namespace App\ShopBuddy\Transformers;

use App\ShopBuddy\Payment\Payment;
use League\Fractal\TransformerAbstract;

class PaymentTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'cart',
    ];

    /**
     * Turn this item object into a generic array
     * @param Payment $payment
     * @return array
     */
    public function transform(Payment $payment) {
        return [
            'paymentId'                 =>      (int) $payment->id,
            'transaction_tracking_id'   =>      $payment->transaction_tracking_id,
            'merchant_reference'        =>      $payment->merchant_reference,
            'status'                    =>      $payment->status,
        ];
    }

    /**
     * Include Cart
     * @param Payment $payment
     * @return \League\Fractal\Resource\Item
     */
    public function includeCart(Payment $payment)
    {
        $cart = $payment->cart;
        return $this->collection($cart, new CartTransformer);
    }
}