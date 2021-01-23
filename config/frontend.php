<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default frontend URL
    |--------------------------------------------------------------------------
    |
    | This option defines the default URL for frontend
    |
    */
    'url' => env('FRONTEND_URL', 'http://localhost:8080/#'),
    'email_verify_url' => env('FRONTEND_EMAIL_VERIFY_URL', '/verify-email?queryURL='),
];
