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

    public function userTransactionHistory($userId)
    {
        $this->cartRepository = new CartRepository();

        $carts = $this->cartRepository->userTransactionHistory($userId);

        return $this->collection($carts, new CartTransformer());
    }
}
