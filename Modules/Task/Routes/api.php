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
Route::group(['prefix'=>'task','middleware'=>'jwt.auth'],function(){
    Route::get('','TaskGetController')->name('taskGet');
    Route::post('','TaskPostController')->name('taskPost');
    Route::patch('','TaskPatchController')->name('taskPatch');
    Route::delete('','TaskDeleteController')->name('taskDelete');

});
