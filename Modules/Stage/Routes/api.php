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
Route::group(['prefix' => 'stage','middleware' => 'jwt.auth'], function() {
    Route::get('', 'StageGetController')->name('stageGet');
    Route::post('', 'StagePostController')->name('stagePost');
    Route::patch('', 'StagePatchController')->name('stagePatch');
    Route::delete('', 'StageDeleteController')->name('stageDelete');
});
