<?php

namespace App\Services;

use App\Exceptions\ForbiddenException;
use App\Exceptions\NotFoundException;

/**
 * Class ThrowExceptionService
 * @package ilos\Services
 */
class ThrowExceptionService {
    public function forbidden($message = null) {
        $message = $message ?? trans('exceptions.forbidden');
        throw new ForbiddenException($message);
    }

    public function notFound($message = null) {
        $message = $message ?? trans('exceptions.notFound');
        throw new NotFoundException($message);
    }
}