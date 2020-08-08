<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\User\Http\Requests\RegisterValidationRequest;
use Modules\User\Services\AuthRegisterService;

/**
 * Class AuthRegisterController
 * @package Modules\User\Http\Controllers
 */
class AuthRegisterController extends Controller {
    /**
     * @var AuthRegisterService $authRegisterService
     */
    private AuthRegisterService $authRegisterService;

    /**
     * AuthRegisterController constructor
     * @param AuthRegisterService $authRegisterService
     */
    public function __construct(AuthRegisterService $authRegisterService) {
        $this->authRegisterService = $authRegisterService;
    }

    /**
     * @param RegisterValidationRequest $request
     * @return Response
     */
    public function __invoke(RegisterValidationRequest $request) : Response {
        $data =  $request->validated();
        $response = $this->authRegisterService->register($data);
        return Response('', Response::HTTP_OK, ['Authorization' => "Bearer ".$response]);
    }
}
