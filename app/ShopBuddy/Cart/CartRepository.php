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
     * @param User $user
     * @return mixed
     */
    public function createCart(array $data, User $user) {
        $cart = new Cart($data);
        return $user->carts()->save($cart);
    }

    /**
     * Update cart details
     * @param array $data
     * @param User $user
     * @param $id
     * @return mixed
     */
    public function updateCart(array $data, User $user, $id){
        $cart = new Cart($data);
        return $user->carts()->filter(function($oldCart) use($id){
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
    public function checkOut() {

    }
}