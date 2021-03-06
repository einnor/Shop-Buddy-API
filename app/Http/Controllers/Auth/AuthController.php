<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * @api {post} /api/user/authenticate Authenticate user
     * @apiVersion 0.1.0
     * @apiName AuthenticateUser
     * @apiGroup Authentication
     *
     * @param Request $request
     * @apiParam {String} email Users unique email.
     * @apiParam {String} password Users password.
     *
     * @apiSuccess {String} token Session token of the User.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "currentUser":
     *          {
     *              "id": 8,
     *              "name": "Tom Keen",
     *              "email": "tom.keen@gmail.com",
     *              "created_at": "2016-08-01 06:07:20",
     *              "updated_at": "2016-08-01 06:07:20"
     *          },
     *          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY"
     *     }
     *
     * @apiError Unauthorized User credentials are not correct!.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 401 Unauthorized Access
     *     {
     *          "message": "User credentials are not correct!",
     *          "status_code": 401
     *     }
     */

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return $this->response->error('User credentials are not correct!', 401);
            }
        }catch(JWTException $ex){
            return $this->response->error('Something went wrong!', 500);
        }

        $currentUser =  JWTAuth::toUser($token);

        return $this->response->array(compact('token', 'currentUser'))->setStatusCode(200);
    }

    /**
     * @api {post} /api/authenticated/user Fetch authenticated user
     * @apiVersion 0.1.0
     * @apiName GetAuthenticatedUser
     * @apiGroup User Extension
     *
     * @apiParam {String} token Users unique token.
     *
     * @return \Dingo\Api\Http\Response\Factory|void
     *
     * @apiSuccess {String} name Name of the User.
     * @apiSuccess {String} email  Email of the User.
     * @apiSuccess {Datetime} created_at  Date and time when the User was created.
     * @apiSuccess {Datetime} updated_at  Date and time when the User was updated.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "currentUser": [
     *              "name": "John Doe",
     *              "email": "john.doe@gmail.com",
     *              "created_at": "2016-07-21 05:33:49",
     *              "updated_at": "2016-07-21 05:33:49"
     *          ],
                "refreshToken": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY"
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 401 Not Found
     *     {
     *          "message": "Token is invalid",
     *          "status_code": 500,
     *     }
     *
     *
     */

    public function showUser(){
        try{
            $currentUser =  JWTAuth::parseToken()->toUser();
            if(! $currentUser){
                return $this->response->errorNotFound('User not found');
            }
            $oldToken = JWTAuth::getToken();
            $token = JWTAuth::refresh($oldToken);
        }catch(TokenInvalidException $ex){
            return $this->response->error('Token is invalid', 401);
        }catch(TokenExpiredException $ex){
            return $this->response->error('Token has expired', 401);
        }catch(TokenBlacklistedException $ex){
            return $this->response->error('Token is blacklisted', 401);
        }

        return $this->response->array(compact('currentUser'))->setStatusCode(200);
    }

    public function authenticateRequest() {
        $user =  JWTAuth::parseToken()->toUser();
        if(! $user){
            return false;
        }
        return $user;
    }

    /**
     * @api {post} /api/users Create new user
     * @apiVersion 0.1.0
     * @apiName CreateUser
     * @apiGroup User
     *
     * @param Request $request
     * @apiParam {String} name Users name.
     * @apiParam {String} email Users email.
     * @apiParam {String} password Users password.
     * @apiParam {String} password_confirmation Users password confirmation.
     *
     * @apiSuccess {String} token User token.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY",
                "currentUser": {
                    "id": 8,
                    "name": "Tom Keen",
                    "email": "tom.keen@gmail.com",
                    "created_at": "2016-08-01 06:07:20",
                    "updated_at": "2016-08-01 06:07:20"
                }
     *     }
     *
     * @apiError ValidationException Input failed validation.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 400 Bad Request
     *     {
     *          "message": "The given data failed to pass validation.",
    *           "status_code": 500
     *     }
     */

    public function registerUser(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        $currentUser = $this->attachUserRole($user->id,'customer');

        if($currentUser){
            return $this->authenticate($request);
        }
    }

    /**
     * @api {post} /api/users/sign-in-or-sign-up Login/Create new user
     * @apiVersion 0.1.0
     * @apiName LoginOrCreateUser
     * @apiGroup User
     *
     * @param Request $request
     * @apiParam {String} email Users email.
     * @apiParam {String} password Users password.
     *
     * @apiSuccess {String} token User token.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY",
                "currentUser": {
                "id": 8,
                "name": "",
                "email": "tom.keen@gmail.com",
                "created_at": "2016-08-01 06:07:20",
                "updated_at": "2016-08-01 06:07:20"
                }
     *     }
     *
     * @apiError ValidationException Input failed validation.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 400 Bad Request
     *     {
     *          "message": "The given data failed to pass validation.",
     *           "status_code": 500
     *     }
     */

    public function signInOrSignUpUser(Request $request)
    {
        $validator = $this->validatorForSignInOrSignUp($request->all());
        if ($validator->fails()) {
            return $this->throwValidationException(
                $request, $validator
            );
        }

        // If user exists, sign them in, else sign them up then sign them in
        if(User::where('email', $request->email)->exists()) {
            return $this->authenticate($request);
        }
        else {
            $request->name = null;
            $user = $this->create($request->all());
            $currentUser = $this->attachUserRole($user->id,'customer');
            if($currentUser){
                return $this->authenticate($request);
            }
        }
    }

    /**
     * Attach a role to a user
     *
     * @param $userId
     * @param $role
     * @return mixed
     */
    private function attachUserRole($userId, $role){
        $user = User::findOrFail($userId);
        $roleId = Role::where(['name' => $role])->first();

        $user->roles()->attach($roleId);
        return $user;
    }

    /**
     * @api {post} /api/token/refresh Refresh token
     * @apiVersion 0.1.0
     * @apiName RefreshToken
     * @apiGroup Authentication
     *
     * @apiParam {String} token User unique token.
     *
     * @apiSuccess {String} token User token.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "refreshToken": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cL3Nob3BidWRkeS5kZXZcL2FwaVwvdXNlclwvcmVnaXN0ZXIiLCJpYXQiOjE0NzAwMzE2NDAsImV4cCI6MTQ3MDAzNTI0MCwibmJmIjoxNDcwMDMxNjQwLCJqdGkiOiIwNWM0ZWZjNTdmMDNiZmMwZGY4M2QwZWNkODUwYmNiZiJ9.422Hp7oxcd_lG07us1nnuGfbVtyqVsLp_CNpO4n-qhY"
     *     }
     *
     * @apiError Unauthorized Token is invalid.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 401 Unauthorized
     *     {
     *          "message": "Token is invalid | Token has expired | Token is blacklisted",
     *          "status_code": 401
     *     }
     */

    public function refreshToken(){
        $token = JWTAuth::getToken();
        if(! $token){
            return $this->response->errorUnauthorized('Token is invalid');
        }

        try{
            $refreshToken = JWTAuth::refresh($token);
        }catch(JWTException $ex){
            return $this->response->error('Something went wrong!');
        }

        return $this->response->array(compact('refreshToken'))->setStatusCode(200);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Get a validator for an incoming registration/login request.
     * @param array $data
     * @return mixed
     */
    protected function validatorForSignInOrSignUp(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
