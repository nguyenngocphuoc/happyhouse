<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Session;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        
            // 404 page when a model is not found
            if ($exception instanceof ModelNotFoundException) {
                return response()->view('backend.layout.partials.errors', [], 404);
            }

            // custom error message
            if ($exception instanceof ErrorException) {
                return response()->view('backend.layout.partials.errors', [], 500);
            } 
            else if ($exception instanceof ValidationException) {
                return parent::render($request, $exception);
            }else {
                return parent::render($request, $exception);
            }

            return parent::render($request, $exception);
        
        //return parent::render($request, $exception);
    }
}
