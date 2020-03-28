<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ForbiddenException extends HttpException
{
    /**
     * ForbiddenException constructor.
     *
     * @param  string|null  $message
     * @return void
     */
    public function __construct($message = null) {
        parent::__construct(Response::HTTP_FORBIDDEN, $message, null, [], Response::HTTP_FORBIDDEN);
    }
}