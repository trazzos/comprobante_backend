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

Route::group(['prefix' => 'company', 'middleware' => 'jwt.auth'], function() {
    Route::get('', 'CompanyGetController')->name('companyGet');
    Route::post('', 'CompanyPostController')->name('companyPost');
    Route::patch('', 'CompanyPatchController')->name('companyPatch');
    Route::delete('', 'CompanyDeleteController')->name('companyDelete');
});
