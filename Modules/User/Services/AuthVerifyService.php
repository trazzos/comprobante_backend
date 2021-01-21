<?php

namespace Modules\User\Services;

use Illuminate\Http\Request;
use Modules\User\Models\User;

/**
 * Class GetUserService
 * @package Modules\User\Services
 */
class AuthVerifyService extends GetUserService {

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Mixed
     */
    public function verify(Request $request) {
        $user = $this->info($request->route('id'));
        $message =  $this->handleVerify($user);
        return [$user, $message];
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Mixed
     */
    public function resend(Request $request) {
        $user = $request->user();
        $message =  $this->handleResend($user);
        return [$user, $message];
    }

    /**
     * @param  User $user
     * @return String
     */
    private function handleVerify(User $user) : string {
        $message = $user->hasVerifiedEmail()
            ? 'El correo ya se encuentra verificado'
            : 'Correo verificado';

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return $message;
    }

    /**
     * @param  User $user
     * @return String
     */
    private function handleResend (User $user) : string {
        $message = $user->hasVerifiedEmail()
            ? 'El correo ya se encuentra verificado'
            : 'Correo de verificacion reenviado';

        if (!$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }

        return $message;
    }
}

