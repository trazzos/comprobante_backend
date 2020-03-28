<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\User\Services\AuthLoginService;

/**
 * Class AuthRefreshController
 * @package Modules\User\Http\Controllers
 */
class AuthRefreshController extends Controller {
    /**
     * @var AuthLoginService
     */
    private $authLoginService;

    /**
     * AuthRefreshController constructor.
     * @param AuthLoginService $authLoginService
     */
    public function __construct(AuthLoginService $authLoginService) {
        $this->authLoginService = $authLoginService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request) {
        return $this->handleAjaxJsonResponse(null);
    }
}
