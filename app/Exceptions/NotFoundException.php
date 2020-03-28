<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NotFoundException extends HttpException
{
    /**
     * NotFoundException constructor.
     *
     * @param  string|null  $message
     * @return void
     */
    public function __construct($message = null) {
        parent::__construct(Response::HTTP_NOT_FOUND, $message, null, [], Response::HTTP_NOT_FOUND);
    }
}