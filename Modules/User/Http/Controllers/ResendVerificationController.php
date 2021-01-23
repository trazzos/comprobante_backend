<?php

namespace Modules\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Http\Requests\VerificationValidationRequest;
use Modules\User\Services\AuthVerifyService;

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
        $this->authVerifyService = $authVerifyService;
    }

    /**
     * @param VerificationValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(VerificationValidationRequest $request) : JsonResponse {
        //Aqui usariamos nuestro requested user que agregamos al $request en el validation request
        $user = $request['requestedUser'];
        //TODO esta ruta esta enviando un error 530 de SMTP (Actualizar .env)
        $message = $this->authVerifyService->resend($user);
        return $this->handleAjaxJsonResponse($user, $message);
    }

}
