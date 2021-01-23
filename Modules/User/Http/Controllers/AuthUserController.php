<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\User\Services\GetUserService;
use Auth;
use Psy\Util\Json;

/**
 * Class AuthUserController
 * @package Modules\User\Http\Controllers
 */
class AuthUserController extends Controller {
    /**
     * @var GetUserService $getUserService
     */
    private GetUserService $getUserService;

    /**
     * AuthUserController Construct.
     * @param GetUserService $getUserService
     * @return void
     */
    public function __construct(GetUserService $getUserService) {
        $this->getUserService = $getUserService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request) : JsonResponse {
        $response = $this->getUserService->info(Auth::user()->id);

        return $this->handleAjaxJsonResponse($response);
    }
}
