<?php

namespace App\ShopBuddy\User;

use App\Http\Controllers\Auth\AuthController;
use App\User;
use Illuminate\Support\Collection;

class UserRepository
{

    protected $user;

    public function __construct()
    {
        $auth = new AuthController();
        $this->user = $auth->authenticateRequest();
    }

    /**
     * Add a user record in the user table
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data) {
        return User::create($data);
    }

    /**
     * Update user details
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateUser(array $data, $id){
        $user = User::findOrFail($id);
        $user->update($data);
    }

    /*
     * Delete a user record in the users table
     * @param $id
     */
    public function removeUser($id) {
        return User::findOrFail($id)->delete();
    }

    /**
     * Get all the user
     * @return mixed
     */
    public function getAllUsers(){
        return User::latest()->get();
    }

    /**
     * Get details of a specific user by the id
     * @param $id
     * @return mixed
     */
    public function getUserById($id){
        return User::findOrFail($id)->first();
    }
}