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


Route::get('/user-list', [
    'as' => 'mail.user.list',
    'uses' => 'REST\ApiController@mailApiUsers'
]);

Route::get('/skill-list', [
    'as' => 'skill.list',
    'uses' => 'REST\ApiController@allSkills'
]);

Route::get('/user-list-by-name', [
    'as' => 'mail.user.list.by_name',
    'uses' => 'REST\ApiController@mailApiUsersByName'
]);

Route::get('/category', [
    'as' => 'category.index',
    'uses' => 'REST\ApiController@categoryIndex'
]);


Route::get('/top-categories', [
    'as' => 'category.top',
    'uses' => 'REST\ApiController@topCategories'
]);

Route::get('/get-profiles', [
    'as' => 'profiles',
    'uses' => 'REST\ApiController@getProfiles'
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


Route::post('/send-otp-to-verify-number', [
    'uses' => 'REST\UsersController@sendOTPtoVerify'
]);

Route::post('/validate-otp', [
    'uses' => 'REST\UsersController@verifyOTP'
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

  Route::post('/change-mood', [
      'uses' => 'REST\Profile\ProfileController@changeMood'
  ]);
});


Route::group(['prefix' => 'project'], function () {
  Route::get('/', [
      'as' => 'projects',
      'uses' => 'REST\Project\ProjectsController@view'
  ]);

  Route::get('/create', [
      'as' => 'profile.create',
      'uses' => 'REST\Project\ProjectsController@create'
  ]);

  Route::post('/save', [
      'as' => 'profile.store',
      'uses' => 'REST\Project\ProjectsController@store'
  ]);

  Route::get('/packages', [
      'as' => 'projects.packages',
      'uses' => 'REST\Project\ProjectsController@packages'
  ]);
});


Route::group(['prefix' => 'user'], function () {

    Route::get('/', [
        'uses' => 'REST\UsersController@view'
    ]);

    Route::get('/my-profiles', [
        'uses' => 'REST\Profile\User\ProfileController@viewMyProfiles'
    ]);

    Route::get('/profile', [
        'as' => 'profile.view',
        'uses' => 'REST\Profile\User\ProfileController@myProfile'
    ]);

    Route::post('/update-skills', [
      'uses' => 'REST\UsersController@updateSkills'
    ]);

    Route::post('/update-certificates', [
      'uses' => 'REST\UsersController@updateCertificates'
    ]); 

    Route::post('/change-my-mood', [
      'uses' => 'REST\UsersController@userMoodChange'
    ]);

    Route::post('/change-my-password', [
      'uses' => 'REST\UsersController@changePassword'
    ]);

    Route::group(['prefix' => 'message'], function () {
      /*Route::get('/compose', [
        'as' => 'api.profile.message.compose',
        'uses' => 'REST\Profile\User\MessageController@composeMail'
      ]);*/

      Route::post('/send', [
        'as' => 'api.profile.message.send',
        'uses' => 'REST\Profile\User\MessageController@sendMail'
      ]);

      Route::get('/inbox', [
        'as' => 'api.profile.message.inbox',
        'uses' => 'REST\Profile\User\MessageController@mailBox'
      ]);

      Route::get('/sent', [
        'as' => 'api.profile.message.sent',
        'uses' => 'REST\Profile\User\MessageController@sentBox'
      ]);

      Route::get('/trash', [
        'as' => 'api.profile.message.trash',
        'uses' => 'REST\Profile\User\MessageController@trashBox'
      ]);

      Route::get('/make-read', [
        'as' => 'api.profile.message.make_read',
        'uses' => 'REST\Profile\User\MessageController@makeRead'
      ]);

      Route::get('/send-to-trash', [
        'as' => 'api.profile.message.send_to_trash',
        'uses' => 'REST\Profile\User\MessageController@sendToTrash'
      ]);

    });

    Route::group(['prefix' => 'inquiry'], function () {
      Route::post('/send', [
        'as' => 'api.profile.inquiry.send',
        'uses' => 'REST\Profile\User\InquiryController@send'
      ]);

      Route::get('/', [
        'as' => 'api.profile.inquiry.view_all',
        'uses' => 'REST\Profile\User\InquiryController@viewAll'
      ]);

      Route::get('/view', [
        'as' => 'api.profile.inquiry.view',
        'uses' => 'REST\Profile\User\InquiryController@send'
      ]);
    });
});



Route::get('todos', 'REST\UserAuthApiController@todo')->middleware('auth:api');

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return 'asdasd';
});*/
