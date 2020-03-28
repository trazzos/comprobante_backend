<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\UserPostValidationRequest;
use Modules\User\Services\UserCreateService;

/**
 * Class UserPostController
 * @package Modules\User\Http\Controllers
 */
class UserPostController extends Controller {
    /**
     * @var $userCreateService
     */
    private $userCreateService;

    /**
     * UserGetController constructor.
     * @param UserCreateService $userCreateService
     */
    public function __construct(UserCreateService $userCreateService) {
        $this->userCreateService = $userCreateService;
    }

    /**
     * @param UserPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(UserPostValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->userCreateService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
