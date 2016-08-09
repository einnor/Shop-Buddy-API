<?php

use App\ShopBuddy\Payment\Payment;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'cart_id'                   =>  1,
            'transaction_tracking_id'   =>  'QY38567899GHJHGHJB01FFQEWE8',
            'merchant_reference'        =>  'xxxxxxx',
            'status'                    =>  'COMPLETED'
        ]);

        Payment::create([
            'cart_id'       =>  2,
            'transaction_tracking_id'     =>  'QZ89KKLB01FFQEWE8HRTSD678',
            'merchant_reference'        =>  'yyyyyyy',
            'status'                    =>  'PENDING'
        ]);
    }
}
