<?php


namespace Modules\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Services\AuthVerifyService;
use Illuminate\Http\Request;
use Modules\User\Services\GetUserService;


class VerificationController extends Controller{

    /**
     * @var AuthVerifyService $authVerifyService
     */
    private AuthVerifyService $authVerifyService;

    /**
     * @var GetUserService $getUserService
     */
    private GetUserService $getUserService;

    /**
     * VerificationController Construct
     * @param AuthVerifyService $authVerifyService
     * @return void
     */
    public function __construct(AuthVerifyService $authVerifyService, GetUserService $getUserService) {
        $this->middleware('signed');
        $this->middleware('throttle:6,1');
        $this->authVerifyService = $authVerifyService;
        $this->getUserService = $getUserService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) : JsonResponse {
        $user = $this->getUserService->info($request->route('id'));
        $message = $this->authVerifyService->verify($user);
        return $this->handleAjaxJsonResponse($user, $message);
    }

}
