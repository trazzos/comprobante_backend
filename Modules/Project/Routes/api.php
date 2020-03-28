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

Route::group(['prefix' => 'project', "middleware" => 'jwt.auth'], function() {
    Route::get('', 'ProjectGetController')->name('projectGet');
    Route::post('', 'ProjectPostController')->name('projectPost');
    Route::patch('', 'ProjectPatchController')->name('projectPatch');
    Route::delete('', 'ProjectDeleteController')->name('projectDelete');
});