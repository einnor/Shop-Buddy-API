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
     * Checkout action
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
