<?php

namespace App\ShopBuddy\Transformers;

use App\ShopBuddy\Product\Product;

use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
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
     * @param Product $product
     * @return array
     */
    public function transform(Product $product) {
        return [
            'productId'         =>      (int) $product->id,
            'asinCode'          =>      $product->asin_code,
            'name'              =>      $product->name,
            'price'             =>      (double) $product->price,
            'quantity'          =>      $product->quantity,
            'url'               =>      $product->url,
            'color'             =>      $product->color,
            'weight'            =>      $product->weight,
            'length'            =>      $product->length,
            'width'             =>      $product->width,
            'height'            =>      $product->height,
            'size'              =>      $product->size,
        ];
    }

    /**
     * Include Cart
     * @param Product $product
     * @return \League\Fractal\Resource\Item
     */
    public function includeCart(Product $product)
    {
        $cart = $product->cart;
        return $this->item($cart, new CartTransformer);
    }
}