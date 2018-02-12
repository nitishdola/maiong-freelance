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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/category', [
    'as' => 'category.index',
    'uses' => 'REST\ApiController@categoryIndex'
]);

Route::get('/sub-category', [
    'as' => 'sub_category.index',
    'uses' => 'REST\ApiController@subCategoryIndex'
]);

Route::post('/register', [
    'uses' => 'REST\UserAuthApiController@userRegister'
]);

Route::post('/login', [
    'uses' => 'REST\UserAuthApiController@userLogin'
]);

Route::post('/logout', [
    'uses' => 'REST\UserAuthApiController@userLogout'
]);

Route::get('todos', 'REST\UserAuthApiController@todo')->middleware('auth:api');

Route::middleware('web')->get('/user', function (Request $request) {
    return 'asdasd';
});
