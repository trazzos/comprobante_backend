<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\User\Services\GetUserService;
use Auth;

/**
 * Class AuthUserController
 * @package Modules\User\Http\Controllers
 */
class AuthUserController extends Controller {
    /**
     * @var GetUserService
     */
    private $getUserService;

    /**
     * AuthUserController constructor.
     * @param GetUserService $getUserService
     */
    public function __construct(GetUserService $getUserService) {
        $this->getUserService = $getUserService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request) {
        $response = $this->getUserService->info(Auth::user()->id);

        return $this->handleAjaxJsonResponse($response);
    }
}
