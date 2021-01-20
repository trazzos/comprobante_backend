<?php


namespace Modules\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Services\GetUserService;
use Illuminate\Http\Request;
use Modules\User\Models\User;
use phpDocumentor\Reflection\Types\Boolean;


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
        $user = $this->getUserService->info($request->route('id'));
        return $this->handleVerify($user);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function resend(Request $request): JsonResponse {
        $user = $request->user();
        return $this->handleVerify($user, true);
    }

    /**
     * handle verify
     *
     * @param  User $user
     * @param  Boolean $resend
     * @return JsonResponse
     */
    private function handleVerify(User $user, $resend = false) : JsonResponse {

        if ($user->hasVerifiedEmail()) {
            $message = 'El correo ya se encuentra verificado';
        } else {
            $resend ? $user->sendEmailVerificationNotification() :  $user->markEmailAsVerified();
            $message =  $resend ? 'Correo de verificacion reenviado' : 'Correo verificado';
        }
        return $this->handleAjaxJsonResponse($user,$message);
    }
}
