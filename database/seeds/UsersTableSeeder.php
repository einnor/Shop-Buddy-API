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

        User::create([
            'name'      =>  'Athman Gude',
            'email'     =>  'athmangude@gmail.com',
            'password'  =>  bcrypt('password')
        ])->roles()->attach(1); //Role 1 is Customer

        User::create([
            'name'      =>  'Derrick Mushangi',
            'email'     =>  'derrickmushangi@gmail.com',
            'password'  =>  bcrypt('password')
        ])->roles()->attach(1); //Role 1 is Customer
    }
}
