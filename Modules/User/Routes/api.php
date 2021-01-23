<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('user')->name('user')->middleware('jwt.auth')->group(function() {
    Route::get('', 'UserGetController')->name('userGet');
    Route::post('', 'UserPostController')->name('userPost');
    Route::patch('', 'UserPatchController')->name('userPatch');
    Route::delete('', 'UserDeleteController')->name('userDelete');
});

Route::prefix('auth')->name('auth.')->group(function() {
    Route::post('login', 'AuthLoginController')->name('login');
    Route::post('register', 'AuthRegisterController')->name('register');

    Route::middleware('jwt.auth')->group(function() {
        Route::get('user', 'AuthUserController')->name('user');
        Route::post('logout', 'AuthLogoutController')->name('logout');

        Route::middleware('throttle:6,1')->group(function() {
            Route::post('email/resend', 'ResendVerificationController')->name('resend');
            Route::post('email/verify', 'VerificationController')->name('verify');
        });
    });
    Route::middleware('jwt.refresh')->group(function () {
        Route::get('refresh', 'AuthRefreshController')->name('refresh');
    });

});
