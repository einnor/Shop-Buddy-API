<?php

namespace App\ShopBuddy\Transformers;

use App\ShopBuddy\Shipment\Shipment;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class ShipmentTransformer extends TransformerAbstract
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
     * @param Shipment $shipment
     * @return array
     */
    public function transform(Shipment $shipment) {
        return [
            'shipmentId'    =>      (int) $shipment->id,
            'status'        =>      $shipment->status,
            'comment'       =>      $shipment->comment,
            'date'          =>      (new Carbon($shipment->created_at))->toDateTimeString(),
        ];
    }

    /**
     * Include Cart
     * @param Shipment $shipment
     * @return \League\Fractal\Resource\Item
     */
    public function includeCart(Shipment $shipment)
    {
        $cart = $shipment->cart;
        return $this->item($cart, new CartTransformer);
    }
}