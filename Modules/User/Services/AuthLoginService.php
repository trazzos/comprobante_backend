<?php

namespace Modules\User\Services;

use Illuminate\Routing\Controller;
use JWTAuth;
use ThrowException;

/**
 * Class AuthLoginService
 * @package Modules\User\Services
 */
class AuthLoginService extends Controller {

    /**
     * @param $credentials
     * @return false|string
     */
    public function getToken($credentials) {
        $token = JWTAuth::attempt($credentials);

        if(!$token) {
            ThrowException::forbidden('No pudimos encontrar el usuario');
        }

        return $token;
    }
}
