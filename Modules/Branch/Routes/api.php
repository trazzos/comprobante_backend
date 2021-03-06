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

Route::group(['prefix' => 'branch', 'middleware' => 'jwt.auth' ], function() {
    Route::get('', 'BranchGetController')->name('branchGet');
    Route::post('', 'BranchPostController')->name('branchPost');
    Route::patch('', 'BranchPatchController')->name('branchPatch');
    Route::delete('', 'BranchDeleteController')->name('branchDelete');
});
