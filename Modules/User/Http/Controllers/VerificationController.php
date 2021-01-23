<?php


namespace Modules\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Http\Requests\VerificationValidationRequest;
use Modules\User\Services\AuthVerifyService;


class VerificationController extends Controller{

    /**
     * @var AuthVerifyService $authVerifyService
     */
    private AuthVerifyService $authVerifyService;

    /**
     * VerificationController Construct
     * @param AuthVerifyService $authVerifyService
     * @return void
     */
    public function __construct(AuthVerifyService $authVerifyService) {
        $this->authVerifyService = $authVerifyService;
    }

    /**
     * @param VerificationValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(VerificationValidationRequest $request) : JsonResponse {
        $user = $request['requestedUser'];
        $message = $this->authVerifyService->verify($user);
        //TODO es necesario enviar todo el usuario de vuelta? o solo el mensaje?
        return $this->handleAjaxJsonResponse($user, $message);
    }

}
