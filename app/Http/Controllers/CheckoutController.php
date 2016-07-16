<?php

namespace App\Http\Controllers;

use App\ShopBuddy\Cart\CartRepository;
use App\ShopBuddy\Transformers\V1\CartTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;

class CheckoutController extends Controller
{
    /**
     * @var cartRepository
     */
    protected $cartRepository;

    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->cartRepository = new CartRepository();
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function checkout(Request $request){
        $this->validate($request, [
            'store_name' => 'required|max:255',
            'store_url' => 'required|url|max:255',
            'total_price' => 'required|numeric|max:255',
        ]);

        $cart = $this->cartRepository->checkOut($request->all());

        return $this->response->item($cart, new CartTransformer())->setStatusCode(201);
    }
}
