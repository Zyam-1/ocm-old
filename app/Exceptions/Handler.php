<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

   

    // public function render($request, Throwable $exception)
    //     {
    //         if ($request->expectsJson() && $exception instanceof AuthenticationException){
    //     return response()->json(['message' => 'Custom Unauthenticated' ], $exception->getStatusCode());
    //         }


    //         if ($request->expectsJson() && $exception instanceof TokenMismatchException){
    //                 return response()->json([
    //                 'message' => 'Your session has expired. You will need to refresh the page and login again to continue using the system.'], $exception->getStatusCode());
              
    //         }

    //         if ($exception instanceof HttpException) {
    //             return response()->json([
    //                 'message' => 'Server Custom Error'], $exception->getStatusCode());
    //         }
            
            
    //     }

          
}
