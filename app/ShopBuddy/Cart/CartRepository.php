<?php


namespace App\ShopBuddy\Cart;

use App\Http\Controllers\Auth\AuthController;
use App\User;

class CartRepository
{

    protected $user;

    public function __construct()
    {
        $auth = new AuthController();
        $this->user = $auth->showUser();
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

    //TODO checkout method
    public function checkOut(array $data) {
        //Get cart details only
        $cart_details_array = array_except($data, ['items']);

        //Persist cart details in DB
        $cart = $this->createCart($cart_details_array);

        //Get cart items (products)
        $products_array = array_only($data, ['items']);

        //Persist cart items(products) in DB
        return $cart->products()->saveMany($products_array);
    }
}