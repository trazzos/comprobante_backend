<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\UserGetValidationRequest;
use Modules\User\Services\UserGetService;

/**
 * Class UserGetController
 * @package Modules\User\Http\Controllers
 */
class UserGetController extends Controller {
    /**
     * @var $userGetService
     */
    private $userGetService;

    /**
     * UserGetController constructor.
     * @param UserGetService $userGetService
     */
    public function __construct(UserGetService $userGetService) {
        $this->userGetService = $userGetService;
    }

    /**
     * @param UserGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(UserGetValidationRequest $request) : JsonResponse {
        $filters = $request->validated();
        $response = $this->userGetService->list($filters);

        return $this->handleAjaxJsonResponse($response);
    }
}
