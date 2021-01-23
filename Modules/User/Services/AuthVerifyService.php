<?php

namespace Modules\User\Services;

use Illuminate\Http\Request;
use Modules\User\Models\User;

/**
 * Class GetUserService
 * @package Modules\User\Services
 * TODO esta clase esta rompiendo el Single Responsibility Principle ya que esta encargada de verificar y tambien de reenviar
 * como esta pequeña aun pues lo dejaremos pasar por lo pronto.
 */
class AuthVerifyService {

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  User $user
     * @return String
     */
    public function verify(User $user) : string {
       return $this->handleVerify($user);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  User $user
     * @return String
     */
    public function resend(User $user) : string {
        return  $this->handleResend($user);
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

