<?php

use Illuminate\Database\Seeder;
use App\Role;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $customer = new Role();
        $customer->name = 'customer';
        $customer->display_name = 'Customer User'; //Optional
        $customer->description = 'Customer is owner of a given cart'; //Optional
        $customer->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin User'; //Optional
        $admin->description = 'Admin is owner everything'; //Optional
        $admin->save();
    }
}
