<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicController@viewHome')->name('home');

Route::group(['prefix' => 'categories'], function () {
  Route::get('/', 'PublicController@viewAllCategories')->name('public.view_categories');
  Route::get('/{category_slug}', 'PublicController@viewJobsByCategory')->name('public.view_jobs.categories');
});


Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EmployeeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'client'], function () {
  Route::get('/login', 'ClientAuth\LoginController@showLoginForm')->name('client.login');
  Route::post('/login', 'ClientAuth\LoginController@login')->name('process.client.login');

  Route::get('/logout', 'ClientAuth\LoginController@logout')->name('client.logout');

  Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm')->name('client.register');
  Route::post('/register', 'ClientAuth\RegisterController@register')->name('save.client.register');
  Route::get('/confirm-email/{token}', 'ClientAuth\RegisterController@confirmEmail')->name('client.email_confirm');

  Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail')->name('client.password.request');
  Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset')->name('client.password.email');
  Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm')->name('client.password.reset');
  Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
});


Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
  Route::post('/login', 'Auth\LoginController@login')->name('process.user.login');

  Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');

  Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
  Route::post('/register', 'Auth\RegisterController@register')->name('save.user.register');
  Route::get('/confirm-email/{token}', 'Auth\RegisterController@confirmEmail')->name('user.email_confirm');

  Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.request');
  Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('user.password.email');
  Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('user.password.reset');
  Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
});


Route::group(['prefix' => 'projects'], function () {
  Route::get('/', [
      'as' => 'projects',
      'middleware' => ['auth'],
      'uses' => 'User\Projects\ProjectsController@view'
  ]);

  Route::get('/create', [
      'as' => 'projects.create',
      'middleware' => ['auth'],
      'uses' => 'User\Projects\ProjectsController@create'
  ]);

  Route::post('/save', [
      'as' => 'projects.store',
      'middleware' => ['auth'],
      'uses' => 'User\Projects\ProjectsController@store'
  ]);

  Route::get('/{category_name}/{project_slug}', [
      'as' => 'project.view',
      'middleware' => ['auth'],
      'uses' => 'User\Projects\ProjectsController@show'
  ]);
});