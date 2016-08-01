<?php

use Illuminate\Database\Seeder;
use App\User;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'      =>  'Ronnie Nyaga',
            'email'     =>  'ronnienyaga@gmail.com',
            'password'  =>  bcrypt('password')
        ])->roles()->attach(2); //Role 2 is Admin
    }
}
