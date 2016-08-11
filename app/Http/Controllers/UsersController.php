<?php

namespace App\Http\Controllers;

use App\ShopBuddy\Transformers\UserTransformer;
use App\ShopBuddy\User\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    /**
     * @var CartRepository
     */
    protected $userRepository;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers()
    {
        $this->userRepository = new UserRepository();

        $users = $this->userRepository->getAllUsers();

        return $this->collection($users, new UserTransformer())->setStatusCode(200);
    }

    public function getUserById($id)
    {
        $this->userRepository = new UserRepository();

        $user = $this->userRepository->getUserById($id);

        return $this->item($user, new UserTransformer())->setStatusCode(200);
    }

    public function updateUserById(Request $request, $id)
    {
        $this->userRepository = new UserRepository();

        $user = $this->userRepository->updateUser($request->all(), $id);

        return $this->item($user, new UserTransformer())->setStatusCode(200);
    }

    public function deleteUser($id)
    {
        $this->userRepository = new UserRepository();

        $user = $this->userRepository->removeUser($id);

        return $this->item($user, new UserTransformer())->setStatusCode(200);
    }
}
