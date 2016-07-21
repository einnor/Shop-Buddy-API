<?php


namespace App\ShopBuddy\Cart;


use App\Http\Controllers\Auth\AuthController;
use App\ShopBuddy\Payment\Payment;
use App\ShopBuddy\PesapalIntegration;
use App\ShopBuddy\Product\Product;
use Illuminate\Support\Collection;


class CartRepository
{

    protected $user;

    public function __construct()
    {
        $auth = new AuthController();
        $this->user = $auth->authenticateRequest();
    }

    /**
     * Add a cart record in the carts table and associate it with a user
     * @param array $data
     * @return mixed
     */
    public function createCart(array $data) {
        $cart = new Cart($data);
        return $this->user->carts()->save($cart);
    }

    /**
     * Update cart details
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateCart(array $data, $id){
        $cart = new Cart($data);
        return $this->user->carts()->filter(function($oldCart) use($id){
            return $oldCart->findOrFail($id);
        })->update($cart);
    }

    /*
     * Delete a cart record in the carts table
     * @param $id
     */
    public function removeCart($id) {
        return Cart::findOrFail($id)->delete();
    }

    /**
     * Get all the carts
     * @return mixed
     */
    public function getAllCarts(){
        return Cart::latest()->get();
    }

    /**
     * Get details of a specific cart by the id
     * @param $id
     * @return mixed
     */
    public function getCartById($id){
        return Cart::findOrFail($id)->get();
    }

    /**
     * Checkout method
     * @param array $data
     * @return mixed
     */
    public function checkOut(array $data) {
        //Get cart details only
        $cart_details_array = array_except($data, ['items']);

        //Persist cart details in DB
        $cart = $this->createCart($cart_details_array);

        //Get cart items (products)
        $products_array = array_only($data, ['items']);
        $products = new Collection($products_array['items']);

        //Persist cart items(products) in DB
        $cart->products()->saveMany($products->map(function($product){
            return new Product($product);
        }));

        //Persist preliminary payment details
        $payment = new Payment([
            'merchant_reference' => $cart->id,
            'status' => 'PENDING'
        ]);
        $cart->payment()->save($payment);

        $pesapal = new PesapalIntegration();

        return $pesapal->getIframeSource($data, $cart, $this->user);
    }

    /**
     * @param $status
     * @param $pesapal_transaction_tracking_id
     * @param $id
     */
    public function changePesapalTransactionStatus($status, $pesapal_transaction_tracking_id, $id) {
        $cart = Cart::findOrFail($id);
        $cart->payment->status = $status;
        $cart->payment->transaction_tracking_id = $pesapal_transaction_tracking_id;
        $cart->save();
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function userTransactionHistory($userId) {
        return Cart::where(['user_id' => $userId])->get();
    }
}