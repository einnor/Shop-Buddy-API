<?php

namespace App\ShopBuddy\Transformers;

use App\ShopBuddy\Cart\Cart;

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
            'totalPrice'        =>      $cart->total_price,
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