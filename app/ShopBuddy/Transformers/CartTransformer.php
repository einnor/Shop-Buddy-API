<?php

namespace App\ShopBuddy\Transformers;

use App\ShopBuddy\Cart\Cart;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class CartTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'user',
        'payment',
        'shipments',
        'products',
    ];

    /**
     * Turn this item object into a generic array
     * @param Cart $cart
     * @return array
     */
    public function transform(Cart $cart) {
        return [
            'cartId'            =>      (int) $cart->id,
            'storeName'         =>      $cart->store_name,
            'storeURL'          =>      $cart->store_url,
            'totalPrice'        =>      (double) $cart->total_price,
            'createdAt'         =>      (new Carbon($cart->created_at))->toDateString()
        ];
    }

    /**
     * Include User
     * @param Cart $cart
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Cart $cart)
    {
        $user = $cart->user;
        return $this->item($user, new UserTransformer);
    }

    /**
     * Include Payment
     * @param Cart $cart
     * @return \League\Fractal\Resource\Item
     */
    public function includePayment(Cart $cart)
    {
        $payment = $cart->payment;
        return $this->item($payment, new PaymentTransformer());
    }

    /**
     * Include Shipment
     * @param Cart $cart
     * @return \League\Fractal\Resource\Item
     */
    public function includeShipments(Cart $cart)
    {
        $shipments = $cart->shipments;
        return $this->collection($shipments, new ShipmentTransformer());
    }

    /**
     * Include Products
     * @param Cart $cart
     * @return \League\Fractal\Resource\Item
     */
    public function includeProducts(Cart $cart)
    {
        $products = $cart->products;
        return $this->collection($products, new ProductTransformer);
    }
}