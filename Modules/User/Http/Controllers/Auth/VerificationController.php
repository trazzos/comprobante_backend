<?php


namespace Modules\User\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Services\GetUserService;
use Illuminate\Http\Request;


class VerificationController extends Controller{

    /**
     * @var GetUserService $getUserService
     */
    private GetUserService $getUserService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GetUserService $getUserService)
    {
        $this->middleware('auth')->except('verify');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->getUserService = $getUserService;
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function verify(Request $request) : JsonResponse {
        $response = $this->getUserService->info($request->route('id'));
        if ($response->hasVerifiedEmail()) {
            return $this->handleAjaxJsonResponse($response, 'El correo ya se encuentra verificado.');
        }
        $response->markEmailAsVerified();
        return $this->handleAjaxJsonResponse($response,'Correo verificado');
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function resend(Request $request): JsonResponse {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->handleAjaxJsonResponse(null, 'El correo ya se encuentra verificado.');
        }

        $request->user()->sendEmailVerificationNotification();
        return $this->handleAjaxJsonResponse(null, 'Correo de verificacion reenviado');
    }
}
