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

Route::group(['prefix' => 'label', 'middleware' => 'jwt.auth'], function () {
    Route::get('', 'LabelGetController')->name('labelGet');
    Route::post('', 'LabelCreateController')->name('labelCreate');
    Route::patch('', 'LabelPatchController')->name('labelPatch');
    Route::delete('', 'LabelDeleteController')->name('labelDelete');
});
