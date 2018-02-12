<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('client')->user();

    //dd($users);

    return view('client.home');
})->name('home');

Route::group(['prefix' => 'job'], function () {
  Route::get('/post', 'Client\JobsController@post')->name('client.post_job');
});