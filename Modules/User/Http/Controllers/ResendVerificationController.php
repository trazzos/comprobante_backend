<?php


namespace Modules\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Services\AuthVerifyService;
use Illuminate\Http\Request;



class ResendVerificationController extends Controller{
    /**
     * @var AuthVerifyService $authVerifyService
     */
    private AuthVerifyService $authVerifyService;

    /**
     * ResendVerificationController Construct
     * @param AuthVerifyService $authVerifyService
     * @return void
     */
    public function __construct(AuthVerifyService $authVerifyService) {
        $this->middleware('auth');
        $this->middleware('throttle:6,1');
        $this->authVerifyService = $authVerifyService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) : JsonResponse {
        $response = $this->authVerifyService->resend($request);
        return $this->handleAjaxJsonResponse($response[0], $response[1]);
    }

}
