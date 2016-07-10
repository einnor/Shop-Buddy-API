<?php

use Illuminate\Database\Seeder;
use App\Permission;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $createCart = new Permission();
        $createCart->name = 'create-cart';
        $createCart->display_name = 'Create Carts'; // optional
        // Allow a customer to create cart
        $createCart->description  = 'Create new carts'; // optional
        $createCart->save();

        $editCart = new Permission();
        $editCart->name = 'edit-cart';
        $editCart->display_name = 'Edit Carts'; // optional
        // Allow an admin to edit cart
        $editCart->description  = 'Edit existing carts'; // optional
        $editCart->save();

        $deleteCart = new Permission();
        $deleteCart->name = 'delete-cart';
        $deleteCart->display_name = 'Delete Carts'; // optional
        // Allow an admin to delete cart
        $deleteCart->description  = 'Delete existing carts'; // optional
        $deleteCart->save();
    }
}
