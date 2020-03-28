<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\UserPatchValidationRequest;
use Modules\User\Services\UserUpdateService;
use Auth;

/**
 * Class UserPatchController
 * @package Modules\User\Http\Controllers
 */
class UserPatchController extends Controller {
    /**
     * @var UserUpdateService
     */
    private $userUpdateService;

    /**
     * userPatchController constructor.
     * @param UserUpdateService $userUpdateService
     */
    public function __construct(UserUpdateService $userUpdateService) {
        $this->userUpdateService = $userUpdateService;
    }

    /**
     * @param UserPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(UserPatchValidationRequest $request) : JsonResponse {
        $data = $request->validated();

        //Sabemos que el usuario esta logeado, pueden pasar ese usuario al servicio.
        $response = $this->userUpdateService->update(Auth::user(), $data);
        return $this->handleAjaxJsonResponse($response);
    }
}
