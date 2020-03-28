<?php

namespace Modules\User\Services;

use Illuminate\Routing\Controller;
use JWTAuth;

/**
 * Class AuthLogoutService
 * @package Modules\User\Services
 */
class AuthLogoutService extends Controller {
    /**
     *
     */
    public function logout() {
        JWTAuth::invalidate();
    }
}
