<?php


namespace App\ShopBuddy\Cart;


class ClientRepository
{

    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Add a cart record in the carts table
     * @param array $data
     * @return mixed
     */
    public function createCart(array $data) {

        return Cart::create([
            'user_id'           =>         $this->user->id,
            'store_name'        =>         $data['store_name'],
            'store_url'         =>         $data['store_url'],
            'total_price'       =>         $data['totla_price'],
        ]);
    }

    /**
     * Update cart details
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateCart(array $data, $id){
        $cart = Cart::findOrFail($id);
        return $cart->update([
            'store_name'        =>         $data['store_name'],
            'store_url'         =>         $data['store_url'],
            'total_price'       =>         $data['totla_price'],
        ]);
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
}