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

//En name lleva un punto
Route::prefix('company')->name('company.')->middleware('jwt.auth')->group(function() {
    Route::get('', 'CompanyGetController')->name('get');
    Route::post('', 'CompanyPostController')->name('post');
    Route::patch('', 'CompanyPatchController')->name('patch');
    Route::delete('', 'CompanyDeleteController')->name('delete');
});
