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
     * @api {get} /carts/shipments/{cartId} Request Order status for a specific cart
     * @apiName GetCartShipments
     * @apiGroup OrderStatus
     *
     *
     * @apiSuccess {Number} shipmentID ID of the Shipment/Order.
     * @apiSuccess {String} status  The status of the order.
     * @apiSuccess {String} comment  A comment on the status of the order.
     * @apiSuccess {String} date The date the status was changed.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                        "shipmentID": 4,
                        "status": "In Warehouse",
                        "comment": "Order awaiting shipping",
                        "date": "20th June 2016"
                }
                ]
        }
     *
     */

    /**
     * @api {get} /carts/shipments/{cartId}?include=cart Request Shipping/Order status for a specific cart With Cart information
     * @apiName GetCartShipmentsWithCart
     * @apiGroup OrderStatus
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {object} user  Owner of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "shipmentId": 4,
                    "status": "In Warehouse",
                    "comment": "Order awaiting shipping",
                    "date": "20th June 2016",
                    "data": {
                        "cartId": 4,
                        "storeName": "Amazon",
                        "storeURL": "https:://www.amazon.com",
                        "totalPrice": 9999.99,
                        "createdAt": "16th June 2016"
                    }
                }
                ]
    }
     *
     */
    /**
     * @param $cartId
     * @return mixed
     */
    public function cartShipments($cartId)
    {
        $this->shipmentRepository = new ShipmentRepository();
        $shipments = $this->shipmentRepository->getAllShipments($cartId);

        return $this->collection($shipments, new ShipmentTransformer());
    }

    /**
     * @api {get} /shipments/{shipmentId} Request information of a specific order status
     * @apiName GetShipmentById
     * @apiGroup OrderStatus
     *
     *
     * @apiSuccess {Number} shipmentID ID of the Shipment/Order.
     * @apiSuccess {String} status  The status of the order.
     * @apiSuccess {String} comment  A comment on the status of the order.
     * @apiSuccess {String} date The date the status was changed.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "shipmentId": 4,
                    "status": "Delivered",
                    "comment": "Received by the customer",
                    "date": "2016-07-21 11:27:36"
                }
                ]
            }
     *
     */

    /**
     * @api {get} /shipments/{shipmentId}?include=cart Request Shipping/Order status With Cart information
     * @apiName GetShipmentStatusWithCart
     * @apiGroup OrderStatus
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {object} user  Owner of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "shipmentID": 4,
                    "status": "In Warehouse",
                    "comment": "Order awaiting shipping",
                    "date": "20th June 2016",
                    "data": {
                        "cartId": 4,
                        "storeName": "Amazon",
                        "storeURL": "https:://www.amazon.com",
                        "totalPrice": 9999.99,
                        "createdAt": "16th June 2016"
                    }
                }
                ]
            }
     *
     */
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
     * @api {post} /carts/shipments/{cartId} Create/Add order status for a specific cart
     * @apiName CreateCartShipment
     * @apiGroup OrderStatus
     *
     *
     * @apiSuccess {Number} shipmentID ID of the Shipment/Order.
     * @apiSuccess {String} status  The status of the order.
     * @apiSuccess {String} comment  A comment on the status of the order.
     * @apiSuccess {String} date The date the status was changed.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "shipmentId": 4,
                    "status": "Delivered",
                    "comment": "Received by the customer",
                    "date": "2016-07-21 11:27:36"
                }
                ]
            }
     *
     */
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
     * @api {put} /shipments/{shipmentId} Update Shipment/Order status
     * @apiName UpdateShipment
     * @apiGroup OrderStatus
     *
     *
     * @apiSuccess {Number} shipmentID ID of the Shipment/Order.
     * @apiSuccess {String} status  The status of the order.
     * @apiSuccess {String} comment  A comment on the status of the order.
     * @apiSuccess {String} date The date the status was changed.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "shipmentId": 4,
                    "status": "Delivered",
                    "comment": "Received by the customer",
                    "date": "2016-07-21 11:27:36"
                }
                ]
            }
     *
     */
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

    /**
     * @api {delete} /shipments/{shipmentId} Delete order status with specific ID
     * @apiName DeleteShipment
     * @apiGroup OrderStatus
     *
     *
     * @apiSuccess {Number} shipmentID ID of the Shipment/Order.
     * @apiSuccess {String} status  The status of the order.
     * @apiSuccess {String} comment  A comment on the status of the order.
     * @apiSuccess {String} date The date the status was changed.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "shipmentId": 4,
                    "status": "Delivered",
                    "comment": "Received by the customer",
                    "date": "2016-07-21 11:27:36"
                }
                ]
            }
     *
     */
    /**
     * @param $id
     * @return mixed
     */
    public function deleteShipment($id)
    {
        $this->shipmentRepository = new ShipmentRepository();
        $shipment = $this->shipmentRepository->removeShipment($id);

        return $this->item($shipment, new ShipmentTransformer());
    }
}
