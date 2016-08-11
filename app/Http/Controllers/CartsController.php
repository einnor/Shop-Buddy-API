<?php

namespace App\Http\Controllers;

use App\ShopBuddy\Cart\CartRepository;
use App\ShopBuddy\Transformers\CartTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartsController extends Controller
{
    /**
     * @var CartRepository
     */
    protected $cartRepository;

    /**
     * CartsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    //FETCH CARTS
    /**
     * @api {get} /api/carts Fetch all carts
     * @apiName GetCarts
     * @apiGroup Cart
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                }
                ]
            }
     *
     */

    /**
     * @api {get} /api/carts?include=user Fetch all carts - Include owner
     * @apiName GetCartsIncludeOwner
     * @apiGroup Cart Extension
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
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAT": "2016-07-21 11:27:36",
                    "user": {
                        "data": {
                            "userId": 1,
                            "roles": null,
                            "name": "Ronnie Nyaga",
                            "email": "ronnienyaga@gmail.com"
                        }
                    }
                }
                ]
            }
     *
     */

    /**
     * @api {get} /api/carts?include=payment Fetch all carts - Include payment
     * @apiName GetCartsIncludePayment
     * @apiGroup Cart Extension
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {object} payment  Payment of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36",
                    "payment": {
                        "data": {
                            "paymentId": 4,
                            "transaction_tracking_id": "",
                            "merchant_reference": "4",
                            "status": "PENDING"
                        }
                    }
                }
                ]
            }
     *
     */

    /**
     * @api {get} /api/carts?include=products Fetch all carts - Include products
     * @apiName GetCartsIncludeProducts
     * @apiGroup Cart Extension
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {object} products  Products of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36",
                    "products": {
                        "data": [
                        {
                            "productId": 10,
                            "asinCode": "B01FFQEWE8",
                            "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
                            "price": 9999.99,
                            "quantity": 1,
                            "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
                            "color": "Black",
                            "weight": "67.50",
                            "length": "999.99",
                            "width": "999.99",
                            "height": "800.00",
                            "size": "50.00"
                        }
                        ]
                    }
                }
                ]
            }
     *
     */

    /**
     * @api {get} /api/carts?include=shipments Fetch all carts - Include shipments
     * @apiName GetCartsIncludeShipments
     * @apiGroup Cart Extension
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {objects} shipments  Shipments of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data": [
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36",
                    "shipments": {
                        "data": [
                        {
                            "shipmentId": 1,
                            "status": "In warehouse",
                            "comment": "No comment",
                            "date": "2016-07-21 11:25:24"
                        }
                        ]
                    }
                }
                ]
            }
     *
     */

    public function getAllCarts()
    {
        $this->cartRepository = new CartRepository();

        $carts = $this->cartRepository->getAllCarts();

        return $this->collection($carts, new CartTransformer())->setStatusCode(200);
    }

    /**
     * @api {get} /api/carts/{$id} Fetch one cart
     * @apiName GetCart
     * @apiGroup Cart
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                }
            }
     *
     */

    /**
     * @api {get} /api/carts/{$id}?include=user Fetch one cart - Include owner
     * @apiName GetCartIncludeOwner
     * @apiGroup Cart Extension
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
                "data":
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                    "user": {
                        "data": {
                            "userId": 1,
                            "roles": null,
                            "name": "Ronnie Nyaga",
                            "email": "ronnienyaga@gmail.com"
                        }
                    }
                }
            }
     *
     */

    /**
     * @api {get} /api/carts/{$id}?include=payment Fetch one cart - Include payment
     * @apiName GetCartIncludePayment
     * @apiGroup Cart Extension
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {object} payment  Payment of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                    "payment": {
                        "data": {
                            "paymentId": 4,
                            "transaction_tracking_id": "",
                            "merchant_reference": "4",
                            "status": "PENDING"
                        }
                    }
                }
            }
     *
     */

    /**
     * @api {get} /api/carts/{$id}?include=products Fetch one cart - Include products
     * @apiName GetCartIncludeProducts
     * @apiGroup Cart Extension
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {object} products  Products of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                    "products": {
                        "data": [
                        {
                            "productId": 10,
                            "asinCode": "B01FFQEWE8",
                            "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
                            "price": 9999.99,
                            "quantity": 1,
                            "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
                            "color": "Black",
                            "weight": "67.50",
                            "length": "999.99",
                            "width": "999.99",
                            "height": "800.00",
                            "size": "50.00"
                        }
                        ]
                    }
                }
            }
     *
     */

    /**
     * @api {get} /api/carts/{$id}?include=shipments Fetch one cart - Include shipments
     * @apiName GetCartIncludeShipments
     * @apiGroup Cart Extension
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     * @apiSuccess {objects} shipments  Shipments of the cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                    "shipments": {
                        "data": [
                        {
                            "shipmentId": 1,
                            "status": "In warehouse",
                            "comment": "No comment",
                            "date": "2016-07-21 11:25:24"
                        }
                        ]
                    }
                }
            }
     *
     */

    /**
     * @param $id
     * @return mixed
     */
    public function getCartById($id)
    {
        $this->cartRepository = new CartRepository();

        $cart = $this->cartRepository->getCartById($id);

        return $this->item($cart, new CartTransformer())->setStatusCode(200);
    }

    /**
     * @api {put} /api/carts/{$id} Update cart
     * @apiName UpdateCart
     * @apiGroup Cart
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                }
            }
     *
     */

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateCartById(Request $request, $id)
    {
        $this->cartRepository = new CartRepository();

        $this->validate($request, [
            'store_name' => 'required|max:255',
            'store_url' => 'required|max:255',
            'total_price' => 'required|numeric',
        ]);

        $cart = $this->cartRepository->updateCart($request->all(), $id);

        return $this->item($cart, new CartTransformer())->setStatusCode(200);
    }

    /**
     * @api {delete} /api/carts/{$id} Delete cart
     * @apiName DeleteCart
     * @apiGroup Cart
     *
     *
     * @apiSuccess {Number} cartId ID of the Cart.
     * @apiSuccess {String} storeName  Store name of the Cart.
     * @apiSuccess {String} storeURL  Store URL of the Cart.
     * @apiSuccess {Number} totalPrice  Total price of the Cart.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
                "data":
                {
                    "cartId": 4,
                    "storeName": "Amazon",
                    "storeURL": "https:://www.amazon.com",
                    "totalPrice": 9999.99,
                    "createdAt": "2016-07-21 11:27:36"
                }
            }
     *
     */
    /**
     * @param $id
     * @return mixed
     */
    public function deleteCartById($id)
    {
        $this->cartRepository = new CartRepository();

        $cart = $this->cartRepository->removeCart($id);

        return $this->item($cart, new CartTransformer())->setStatusCode(200);
    }






    // GET TRANSACTION HISTORY
    /**
     * @api {get} /api/users/transactions/{id}?include=products,payment,shipments User Transaction History
     * @apiName GetUserTransactionHistory
     * @apiGroup User Extension
     *
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *
    {
    "data": [
    {
    "cartId": 1,
    "storeName": "Amazon",
    "storeURL": "https:://www.amazon.com",
    "totalPrice": "9999.99",
    "payment": {
    "data": {
    "paymentId": 1,
    "transaction_tracking_id": "",
    "merchant_reference": "1",
    "status": ""
    }
    },
    "shipments": {
    "data": [
    {
    "shipmentId": 1,
    "status": "In warehouse",
    "comment": "No comment",
    "date": "2016-07-21 11:25:24"
    },
    {
    "shipmentId": 2,
    "status": "On Transit",
    "comment": "Expected to arrive in 3 days",
    "date": "2016-07-21 11:26:46"
    },
    {
    "shipmentId": 3,
    "status": "Arrived",
    "comment": "Arrived at final checkpoint",
    "date": "2016-07-21 11:27:13"
    },
    {
    "shipmentId": 4,
    "status": "Delivered",
    "comment": "Received by the customer",
    "date": "2016-07-21 11:27:36"
    }
    ]
    },
    "products": {
    "data": [
    {
    "productId": 1,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 2,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 3,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    }
    ]
    }
    },
    {
    "cartId": 2,
    "storeName": "Amazon",
    "storeURL": "https:://www.amazon.com",
    "totalPrice": "9999.99",
    "payment": {
    "data": {
    "paymentId": 2,
    "transaction_tracking_id": "",
    "merchant_reference": "2",
    "status": ""
    }
    },
    "shipments": {
    "data": []
    },
    "products": {
    "data": [
    {
    "productId": 4,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 5,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 6,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    }
    ]
    }
    },
    {
    "cartId": 3,
    "storeName": "Amazon",
    "storeURL": "https:://www.amazon.com",
    "totalPrice": "9999.99",
    "payment": {
    "data": {
    "paymentId": 3,
    "transaction_tracking_id": "",
    "merchant_reference": "3",
    "status": ""
    }
    },
    "shipments": {
    "data": []
    },
    "products": {
    "data": [
    {
    "productId": 7,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 8,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 9,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    }
    ]
    }
    },
    {
    "cartId": 4,
    "storeName": "Amazon",
    "storeURL": "https:://www.amazon.com",
    "totalPrice": "9999.99",
    "payment": {
    "data": {
    "paymentId": 4,
    "transaction_tracking_id": "",
    "merchant_reference": "4",
    "status": "PENDING"
    }
    },
    "shipments": {
    "data": []
    },
    "products": {
    "data": [
    {
    "productId": 10,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 11,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    },
    {
    "productId": 12,
    "asinCode": "B01FFQEWE8",
    "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
    "price": 9999.99,
    "quantity": 1,
    "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
    "color": "Black",
    "weight": "67.50",
    "length": "999.99",
    "width": "999.99",
    "height": "800.00",
    "size": "50.00"
    }
    ]
    }
    }
    ]
    }
     *
     * @apiError Exception Something went wrong.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 500 Exception
     *     {
     *          "message": "Something went wrong",
     *          "status_code": 500,
     *     }
     *
     *
     */
    /**
     * @param $userId
     * @return mixed
     */
    public function userTransactionHistory($userId)
    {
        $this->cartRepository = new CartRepository();

        $carts = $this->cartRepository->userTransactionHistory($userId);

        return $this->collection($carts, new CartTransformer())->setStatusCode(200);
    }
}
