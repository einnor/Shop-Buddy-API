<?php


namespace App\ShopBuddy\Product;


use App\ShopBuddy\Cart\Cart;

class ProductRepository
{

    public function __construct()
    {

    }

    /**
     * Add a product record in the products table and associate it with a cart
     * @param array $data
     * @param Cart $cart
     * @return mixed
     */
    public function createProduct(array $data, Cart $cart) {
        $product = new Product($data);
        return $cart->products()->save($product);
    }

    /**
     * Update product details
     * @param array $data
     * @param Cart $cart
     * @param $id
     * @return mixed
     */
    public function updateProduct(array $data, Cart $cart, $id){
        $product = new Product($data);
        return $cart->products()->filter(function($oldProduct) use($id){
            return $oldProduct->findOrFail($id);
        })->update($product);
    }

    /*
     * Delete a product record in the products table
     * @param $id
     */
    public function removeProduct($id) {
        return Product::findOrFail($id)->delete();
    }

    /**
     * Get all the products
     * @return mixed
     */
    public function getAllProducts(){
        return Product::latest()->get();
    }

    /**
     * Get details of a specific product by the id
     * @param $id
     * @return mixed
     */
    public function getProductById($id){
        return Product::findOrFail($id)->get();
    }
}