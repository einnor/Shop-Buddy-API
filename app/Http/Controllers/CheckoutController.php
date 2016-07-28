<?php

namespace App\Http\Controllers;

use App\ShopBuddy\Cart\CartRepository;
use App\ShopBuddy\PesapalIntegration;
use App\ShopBuddy\Product\ProductRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class CheckoutController extends Controller
{
    /**
     * @var cartRepository
     */
    protected $cartRepository;

    /**
     * @var $productRepository
     */
    protected $productRepository;

    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @api {post} /api/user/checkout Checkout action
     * @apiName CheckOut
     * @apiGroup CheckOut
     *
     * @apiExample Example Usage
     * {
        "store_name": "Amazon",
        "store_url": "https:://www.amazon.com",
        "total_price": 120000,
        "items": [
            {
                "asin_code": "B01FFQEWE8",
                "name": "Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV",
                "price": 189799,
                "quantity": 1,
                "url": "https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V",
                "color": "Black",
                "weight": 67.5,
                "length": 6220,
                "width": 3700,
                "height": 800,
                "size": "50x30"
            }
        ]
     }
     *
     * @apiSuccess {String} iframeSource Pesapal iframe source.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "iframeSource": {
     *              "GET&http%3A%2F%2Fdemo.pesapal.com%2Fapi%2FPostPesapalDirectOrderV4&oauth_callback%3Dhttp%253A%252F%252Fshopbuddy.co.ke%252Fpayments%252Fcallback%26oauth_consumer_key%3D2WVcrLQku%252Fh1dgOU0oTUOgTjGYq%252BZity%26oauth_nonce%3D%257BEBF66D2C-FC11-5D37-0854-BF20278E1E7C%257D%26oauth_signature_method%3DHMAC-SHA1%26oauth_timestamp%3D1469730513%26oauth_version%3D1.0%26pesapal_request_data%3D%2526lt%253B%253Fxml%2520version%253D%2526quot%253B1.0%2526quot%253B%2520encoding%253D%2526quot%253Butf-8%2526quot%253B%253F%2526gt%253B%2526lt%253BPesapalDirectOrderInfo%2520xmlns%253Axsi%253D%2526quot%253Bhttp%253A%252F%252Fwww.w3.org%252F2001%252FXMLSchema-instance%2526quot%253B%2520xmlns%253Axsd%253D%2526quot%253Bhttp%253A%252F%252Fwww.w3.org%252F2001%252FXMLSchema%2526quot%253B%2520Amount%253D%2526quot%253B120000%2526quot%253B%2520Description%253D%2526quot%253BORDER%2520DESCRIPTION%2526quot%253B%2520Type%253D%2526quot%253BMERCHANT%2526quot%253B%2520Reference%253D%2526quot%253B4%2526quot%253B%2520FirstName%253D%2526quot%253BRonnie%2526quot%253B%2520LastName%253D%2526quot%253BNyaga%2526quot%253B%2520Email%253D%2526quot%253Bronnienyaga%2540gmail.com%2526quot%253B%2520PhoneNumber%253D%2526quot%253B%2526quot%253B%2520xmlns%253D%2526quot%253Bhttp%253A%252F%252Fwww.pesapal.com%2526quot%253B%2520%252F%2526gt%253B"
                }
     *     }
     *
     * @apiError Exception Something went wrong.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 500 Exception
     *     {
     *          "message": "Something went wrong.",
     *           "status_code": 500
     *     }
     */
    /**
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function checkout(Request $request){
        $this->cartRepository = new CartRepository();
        $this->validate($request, [
            'store_name' => 'required|max:255',
            'store_url' => 'required|max:255',
            'total_price' => 'required|numeric',
        ]);

        $iframeSource = $this->cartRepository->checkOut($request->all());

        return $this->response->array(compact('iframeSource'))->setStatusCode(200);
    }

    /**
     * @api {post} /api/products/attributes Query attributes of Amazon products
     * @apiName GetAmazonProducts
     * @apiGroup CheckOut
     *
     * @apiExample Example Usage
     *  {
            "asin_codes": [
                "B01FFQEWE8",
                "B01FFQEWE8"
            ]
     *  }
     *
     * @apiSuccess {json} attributes Attributes JSON response.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *
{
    "attributes": [
    {
        "B01FFQEWE8": {
            "weight": {
                "0": "7900",
                      "@attributes": {
                    "Units": "hundredths-pounds"
                      }
                    },
            "length": {
                "0": "6220",
                      "@attributes": {
                    "Units": "hundredths-inches"
                      }
                    },
                    "width": {
                "0": "3700",
                      "@attributes": {
                    "Units": "hundredths-inches"
                      }
                    },
                    "height": {
                "0": "800",
                      "@attributes": {
                    "Units": "hundredths-inches"
                      }
                    },
                    "color": {
                "0": "Black"
                    },
                    "amount": {
                "0": "198929"
                    },
                    "currency_code": {
                "0": "USD"
                    },
                    "formatted_price": {
                "0": "$1,989.29"
                    }
                  }
                },
                {
                    "B01FFQEWE8": {
                    "weight": {
                        "0": "7900",
                      "@attributes": {
                            "Units": "hundredths-pounds"
                      }
                    },
                    "length": {
                        "0": "6220",
                      "@attributes": {
                            "Units": "hundredths-inches"
                      }
                    },
                    "width": {
                        "0": "3700",
                      "@attributes": {
                            "Units": "hundredths-inches"
                      }
                    },
                    "height": {
                        "0": "800",
                      "@attributes": {
                            "Units": "hundredths-inches"
                      }
                    },
                    "color": {
                        "0": "Black"
                    },
                    "amount": {
                        "0": "198929"
                    },
                    "currency_code": {
                        "0": "USD"
                    },
                    "formatted_price": {
                        "0": "$1,989.29"
                    }
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
     *          "message": "Something went wrong.",
     *           "status_code": 500
     *     }
     */
    /**
     * Get Attributes of Amazon Products using their ASIN codes
     * @param Request $request
     * @return mixed
     */
    public function getAmazonProductAttributes(Request $request) {
        $this->productRepository = new ProductRepository();
        $attributes = [];
        $attributes = $this->productRepository->getAmazonProductAttributes($request->all());

        return $this->response->array(compact('attributes'))->setStatusCode(200);
    }

    /**
     * Listen from response from Pesapal
     */
    public function listen() {
        $pesapal = new PesapalIntegration();
        $pesapal->listen();
    }
}
