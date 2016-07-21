<?php

namespace App\Http\Controllers;

use App\ShopBuddy\Cart\Cart;
use App\ShopBuddy\Cart\CartRepository;
use App\ShopBuddy\Shipment\ShipmentRepository;
use App\ShopBuddy\Transformers\ShipmentTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShipmentsController extends Controller
{
    /**
     * @var CartRepository
     */
    protected $shipmentRepository;

    /**
     * CartsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function cartShipments($userId)
    {
        $this->shipmentRepository = new ShipmentRepository();
        $shipments = $this->shipmentRepository->getAllShipments($userId);

        return $this->collection($shipments, new ShipmentTransformer());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function shipment($id)
    {
        $this->shipmentRepository = new ShipmentRepository();
        $shipment = $this->shipmentRepository->getShipmentById($id);

        return $this->item($shipment, new ShipmentTransformer());
    }

    /**
     * @param Request $request
     * @param $cartId
     * @return mixed
     */
    public function createShipment(Request $request, $cartId)
    {
        $this->validate($request, [
            'status' => 'required|max:255',
            'comment' => 'max:500'
        ]);

        $this->shipmentRepository = new ShipmentRepository();
        $shipment = $this->shipmentRepository->createShipment($request->all(), Cart::findOrFail($cartId));

        return $this->item($shipment, new ShipmentTransformer());
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateShipment(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:255',
            'comment' => 'max:500'
        ]);

        $this->shipmentRepository = new ShipmentRepository();
        $shipment = $this->shipmentRepository->updateShipment($request->all(), $id);

        return $this->item($shipment, new ShipmentTransformer());
    }

    public function deleteShipment($id)
    {
        $this->shipmentRepository = new ShipmentRepository();
        $shipment = $this->shipmentRepository->removeShipment($id);

        return $this->item($shipment, new ShipmentTransformer());
    }
}
