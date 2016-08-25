<?php

namespace App\Exceptions;

use Response;
use Exception;
use Dingo\Api\Contract\Debug\ExceptionHandler;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class ApiExceptionHandler implements ExceptionHandler
{
    /**
     * Handle an exception.
     *
     * @param \Exception $exception
     *
     * @return \Illuminate\Http\Response
     */
    public function handle(Exception $e) {
        if ($e instanceof TokenExpiredException) {
            return Response::make(
                ['error_code' => 23, 'message' => 'Token expired, please login.'],
                $e->getStatusCode()
            );
        }
        
        if ($e instanceof TokenInvalidException) {
            return Response::make(
                ['error_code' => 24, 'message' => 'Token invalid, please login.'],
                $e->getStatusCode()
            );
        }
    }
}
