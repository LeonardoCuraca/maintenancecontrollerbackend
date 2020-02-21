<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    


    public function render($request, Exception $exception)
    {
      // PLEASE ADD THIS LINES
        if ($exception instanceof UnauthorizedHttpException) {

            $preException = $exception->getPrevious();

            if ($preException instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
            {
                return response()->json(['error' => 'TOKEN_EXPIRED']);
            }
            else if ($preException instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
            {

                return response()->json(['error' => 'TOKEN_INVALID']);
            }
            else if ($preException instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {

                return response()->json(['error' => 'TOKEN_BLACKLISTED']);
            }
        }

        if ($exception->getMessage() === 'Token not provided')
        {
            return response()->json(['error' => 'Token not provided']);
        }

        return parent::render($request, $exception);
    }
}
