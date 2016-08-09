<?php

use App\ShopBuddy\Product\Product;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'cart_id'       =>  1,
            'asin_code'     =>  'B01FFQEWE8',
            'name'          =>  'Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV',
            'quantity'      =>  '1',
            'url'           =>  'https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V',
            'color'         =>  'Black',
            'weight'        =>  '67.50',
            'length'        =>  '999.99',
            'width'         =>  '999.99',
            'height'        =>  '800.00',
            'size'          =>  '50.00'
        ]);

        Product::create([
            'cart_id'       =>  2,
            'asin_code'     =>  'B01FFQEWE8',
            'name'          =>  'Samsung UN65KU7500 Curved 65-Inch 4K Ultra HD Smart LED TV',
            'quantity'      =>  '1',
            'url'           =>  'https://www.amazon.com/dp/B01FFQEWE8/ref=gbph_img_m-5_3602_1795ae87?smid=ATVPDKIKX0DER&pf_rd_p=2532983602&pf_rd_s=merchandised-search-5&pf_rd_t=101&pf_rd_i=1266092011&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=D2VKTKRZRMGWB64F9X3V',
            'color'         =>  'Black',
            'weight'        =>  '67.50',
            'length'        =>  '999.99',
            'width'         =>  '999.99',
            'height'        =>  '800.00',
            'size'          =>  '50.00'
        ]);
    }
}
