<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\Services\AuthLogoutService;

/**
 * Class AuthLogoutController
 * @package Modules\User\Http\Controllers
 */
class AuthLogoutController extends Controller {
    /**
     * @var AuthLogoutService
     */
    private $authLogoutService;

    /**
     * AuthLogoutController constructor.
     * @param AuthLogoutService $authLogoutService
     */
    public function __construct(AuthLogoutService $authLogoutService) {
        $this->authLogoutService = $authLogoutService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke() {
        $this->authLogoutService->logout();

        return $this->handleAjaxJsonResponse(null);
    }
}
