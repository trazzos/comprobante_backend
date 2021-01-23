<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Modules\Api\Exceptions\Interfaces\ApiExceptionInterface;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $e
     * @return void
     *
     * @throws \Exception
     */
    public function report(\Throwable $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, \Throwable $e)
    {
        //API request. Overriding exceptions, we want to return a json response for all these cases
        if($request->is('api/*')) {
            //if(!($e instanceof ApiExceptionInterface)) {
                //$errorMessage = config('app.debug') ? $e->getMessage() : trans('api::api.exceptions.serverError');
                $errorMessage = $e->getMessage();
                $e = new HttpException(Response::HTTP_INTERNAL_SERVER_ERROR, $errorMessage, null, [], Response::HTTP_INTERNAL_SERVER_ERROR);
            //}

            //$apiResponse = ApiReply::fail($e);

            return response()->json($e->getMessage(), $e->getCode(), [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }

        return parent::render($request, $e);
    }
}
