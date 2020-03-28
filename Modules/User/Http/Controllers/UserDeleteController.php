<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\UserDeleteValidationRequest;
use Modules\User\Services\UserDeleteService;

/**
 * Class UserDeleteController
 * @package Modules\User\Http\Controllers
 */
class UserDeleteController extends Controller {
    /**
     * @var $userDeleteService
     */
    private $userDeleteService;

    /**
     * UserDeleteController constructor.
     * @param UserDeleteService $userDeleteService
     */
    public function __construct(UserDeleteService $userDeleteService) {
        $this->userDeleteService = $userDeleteService;
    }

    /**
     * @param UserDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(UserDeleteValidationRequest $request) : JsonResponse {
        $id = $request->get('id');
        $response = $this->userDeleteService->delete($id);
        return $this->handleAjaxJsonResponse($response);
    }
}
