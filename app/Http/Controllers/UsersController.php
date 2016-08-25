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

    /**
     * @api {get} /api/users Fetch all users
     * @apiVersion 0.2.0
     * @apiName GetUsers
     * @apiGroup User
     *
     * @apiParam {Number} id Users unique ID.
     *
     * @apiSuccess {String} roles Role of the User.
     * @apiSuccess {String} name  Name of the User.
     * @apiSuccess {String} email  Email of the User.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *       {
     *              "userId": 1,
     *              "roles": "customer",
     *              "name": "John Doe",
     *              "email": "john.doe@gmail.com"
     *          }
     *          ]
     *     }
     */

    /**
     * @api {get} /api/users?include=carts Fetch all users - Include carts
     * @apiVersion 0.2.0
     * @apiName GetUsersIncludeCarts
     * @apiGroup User Extension
     *
     * @apiParam {Number} id Users unique ID.
     *
     * @apiSuccess {String} roles Role of the User.
     * @apiSuccess {String} name  Name of the User.
     * @apiSuccess {String} email  Email of the User.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *       {
     *              "userId": 1,
     *              "roles": "customer",
     *              "name": "John Doe",
     *              "email": "john.doe@gmail.com",
     *              "carts": [
     *              {
                        "cartId": 4,
                        "storeName": "Amazon",
                        "storeURL": "https:://www.amazon.com",
                        "totalPrice": 9999.99,
                        "createdAt": "2016-07-21 11:27:36"
     *              }
     *              ]
     *          }
     *          ]
     *     }
     */

    /**
     * @return mixed
     */
    public function getAllUsers()
    {
        $this->userRepository = new UserRepository();

        $users = $this->userRepository->getAllUsers();

        return $this->collection($users, new UserTransformer())->setStatusCode(200);
    }

    /**
     * @api {get} /api/users/:id Fetch one user
     * @apiVersion 0.2.0
     * @apiName GetUser
     * @apiGroup User
     *
     * @apiParam {Number} id Users unique ID.
     *
     * @apiSuccess {number} userId ID of the User.
     * @apiSuccess {String} roles Role of the User.
     * @apiSuccess {String} name  Name of the User.
     * @apiSuccess {String} email  Email of the User.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *              "userId": 1,
     *              "roles": "customer",
     *              "name": "John Doe",
     *              "email": "john.doe@gmail.com"
     *          ]
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "UserNotFound"
     *     }
     */

    /**
     * @api {get} /api/users/:id?include=carts Fetch one user - Include carts
     * @apiVersion 0.2.0
     * @apiName GetUserIncludeCarts
     * @apiGroup User Extension
     *
     * @apiParam {Number} id Users unique ID.
     *
     * @apiSuccess {String} roles Role of the User.
     * @apiSuccess {String} name  Name of the User.
     * @apiSuccess {String} email  Email of the User.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data":
     *       {
     *              "userId": 1,
     *              "roles": "customer",
     *              "name": "John Doe",
     *              "email": "john.doe@gmail.com",
     *              "carts": [
     *              {
     *                  "cartId": 4,
     *                  "storeName": "Amazon",
     *                  "storeURL": "https:://www.amazon.com",
    *                   "totalPrice": 9999.99,
    *                   "createdAt": "2016-07-21 11:27:36"
     *              }
     *              ]
     *          }
     *     }
     */

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        $this->userRepository = new UserRepository();

        $user = $this->userRepository->getUserById($id);

        return $this->item($user, new UserTransformer())->setStatusCode(200);
    }

    /**
     * @api {put} /api/users/:id Update user
     * @apiVersion 0.2.0
     * @apiName UpdateUser
     * @apiGroup User
     *
     * @apiParam {Number} id Users unique ID.
     * @apiParam {String} role Role of the User.
     * @apiParam {String} name  Name of the User.
     * @apiParam {String} email  Email of the User.
     *
     * @apiSuccess {number} userId ID of the User.
     * @apiSuccess {String} roles Role of the User.
     * @apiSuccess {String} name  Name of the User.
     * @apiSuccess {String} email  Email of the User.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *              "userId": 1,
     *              "roles": "customer",
     *              "name": "John Doe",
     *              "email": "john.doe@gmail.com"
     *          ]
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "UserNotFound"
     *     }
     */
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateUserById(Request $request, $id)
    {
        $this->userRepository = new UserRepository();

        $user = $this->userRepository->updateUser($request->all(), $id);

        return $this->item($user, new UserTransformer())->setStatusCode(200);
    }

    /**
     * @api {delete} /api/users/:id Delete user
     * @apiVersion 0.2.0
     * @apiName DeleteUser
     * @apiGroup User
     *
     * @apiParam {Number} id Users unique ID.
     *
     * @apiSuccess {number} userId ID of the User.
     * @apiSuccess {String} roles Role of the User.
     * @apiSuccess {String} name  Name of the User.
     * @apiSuccess {String} email  Email of the User.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "data": [
     *              "userId": 1,
     *              "roles": "customer",
     *              "name": "John Doe",
     *              "email": "john.doe@gmail.com"
     *          ]
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "UserNotFound"
     *     }
     */
    /**
     * @param $id
     * @return mixed
     */
    public function deleteUser($id)
    {
        $this->userRepository = new UserRepository();

        $user = $this->userRepository->removeUser($id);

        return $this->item($user, new UserTransformer())->setStatusCode(200);
    }
}
