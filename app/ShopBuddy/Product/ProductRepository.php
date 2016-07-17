<?php


namespace App\ShopBuddy\Product;


use App\ShopBuddy\Cart\Cart;
use Illuminate\Support\Collection;

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

    /**
     * Takes a json array of asin code(s)
     * @param array $data
     * @return string
     */
    public function getAmazonProductAttributes(array $data){

//        $public = env('AMAZON_PUBLIC_KEY'); //amazon public key here
        $public = 'AKIAIX4VTDIKSWDU3RCA'; //amazon public key here
        $private = 'ReQt6CWiC2ediNGTzOHNQHb0zsbXZv9Hw1+9gAhT'; //amazon private/secret key here
        $site = 'com'; //amazon region
        $affiliate_id = 'ASSOCIATE TAG'; //amazon affiliate id

        $amazon = new AmazonProductAPI($public, $private, $site, $affiliate_id);

        $asin_codes = new Collection($data['asin_codes']);

        $attributes = $asin_codes->map(function($asin_code) use($amazon){
            $result = $amazon->getItemByAsin($asin_code);

            $attr = [];

            $attr[$asin_code]['weight'] = $result->Items->Item->ItemAttributes->PackageDimensions->Weight;
            $attr[$asin_code]['length'] = $result->Items->Item->ItemAttributes->PackageDimensions->Length;
            $attr[$asin_code]['width'] = $result->Items->Item->ItemAttributes->PackageDimensions->Width;
            $attr[$asin_code]['height'] = $result->Items->Item->ItemAttributes->PackageDimensions->Height;
            $attr[$asin_code]['color'] = $result->Items->Item->ItemAttributes->Color;
            $attr[$asin_code]['amount'] = $result->Items->Item->OfferSummary->LowestNewPrice->Amount;
            $attr[$asin_code]['currency_code'] = $result->Items->Item->OfferSummary->LowestNewPrice->CurrencyCode;
            $attr[$asin_code]['formatted_price'] = $result->Items->Item->OfferSummary->LowestNewPrice->FormattedPrice;

            return $attr;
        });

        return $attributes;
    }
}