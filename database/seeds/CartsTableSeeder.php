<?php

use App\ShopBuddy\Cart\Cart;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class CartsTableSeeder extends Seeder
{
    public function run()
    {
        Cart::create([
            'user_id'       =>  2,
            'store_name'    =>  'Amazon',
            'store_url'     =>  'www.amazon.com',
            'total_price'   =>  '12050'
        ]);

        Cart::create([
            'user_id'       =>  3,
            'store_name'    =>  'Amazon',
            'store_url'     =>  'www.amazon.com',
            'total_price'   =>  '145450'
        ]);
    }
}
