<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\User\Services\AuthLoginService;

/**
 * Class AuthLoginController
 * @package Modules\User\Http\Controllers
 */
class AuthLoginController extends Controller {
    /**
     * @var AuthLoginService
     */
    private $authLoginService;

    /**
     * AuthLoginController constructor.
     * @param AuthLoginService $authLoginService
     */
    public function __construct(AuthLoginService $authLoginService) {
        $this->authLoginService = $authLoginService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function __invoke(Request $request) {
        $credentials = $request->only('email', 'password');
        $response = $this->authLoginService->getToken($credentials);

        return response('', Response::HTTP_OK, ['Authorization' => "Bearer ".$response]);
    }
}
