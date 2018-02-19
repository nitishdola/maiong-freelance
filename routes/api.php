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


Route::group(['prefix' => 'profile'], function () {
  Route::get('/', [
      'as' => 'profiles',
      'uses' => 'REST\Profile\ProfileController@view'
  ]);

  Route::get('/create', [
      'as' => 'profile.create',
      'uses' => 'REST\Profile\ProfileController@create'
  ]);

  Route::post('/save', [
      'as' => 'profile.store',
      'uses' => 'REST\Profile\ProfileController@store'
  ]);

  Route::get('/{profile_name}/{profile_slug}', [
      'as' => 'profile.view',
      'uses' => 'REST\Profile\ProfileController@show'
  ]);
});


Route::group(['prefix' => 'profile'], function () {
    Route::get('/my-profiles', [
        'uses' => 'REST\Profile\User\ProfileController@viewMyProfiles'
    ]);

    Route::get('/create', [
        'as' => 'profile.create',
        'uses' => 'REST\Profile\ProfileController@create'
    ]);

    Route::post('/save', [
        'as' => 'profile.store',
        'uses' => 'REST\Profile\ProfileController@store'
    ]);

    Route::get('/{profile_name}/{profile_slug}', [
        'as' => 'profile.view',
        'uses' => 'REST\Profile\ProfileController@show'
    ]);
});

Route::get('todos', 'REST\UserAuthApiController@todo')->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return 'asdasd';
});
