<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use URL;

class VerifyEmail extends VerifyEmailBase
{
    /**
     * Override Method Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        $prefix = config('frontend.url') . config('frontend.email_verify_url');
        $temporarySignedURL = URL::temporarySignedRoute(
            'auth.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
        );

        return $prefix . urlencode($temporarySignedURL);
    }
}
