<?php

Route::get('/home', function () {
    return view('admin.home');
})->name('home');


//MASTER CRUD

//category

Route::group(['prefix'=>'category'], function() {
    Route::get('/', [
        'as' => 'category.index',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\CategoriesController@index'
    ]);

    Route::get('/create', [
        'as' => 'category.create',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\CategoriesController@create'
    ]);

    Route::post('/save', [
        'as' => 'category.save',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\CategoriesController@store'
    ]);

    Route::get('/{category_id}/edit', [
        'as' => 'category.edit',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\CategoriesController@edit'
    ]);

    Route::post('/{category_id}/update', [
        'as' => 'category.update',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\CategoriesController@update'
    ]);


    Route::get('/{category_id}/disable', [
        'as' => 'category.disable',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\CategoriesController@disable'
    ]);
});


//sub-category
Route::group(['prefix'=>'sub-category'], function() {
    Route::get('/', [
        'as' => 'sub_category.index',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\SubCategoriesController@index'
    ]);

    Route::get('/create', [
        'as' => 'sub_category.create',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\SubCategoriesController@create'
    ]);

    Route::post('/save', [
        'as' => 'sub_category.save',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\SubCategoriesController@store'
    ]);

    Route::get('/{sub_category_id}/edit', [
        'as' => 'sub_category.edit',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\SubCategoriesController@edit'
    ]);

    Route::post('/{sub_category_id}/update', [
        'as' => 'sub_category.update',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\SubCategoriesController@update'
    ]);


    Route::get('/{category_id}/disable', [
        'as' => 'sub_category.disable',
        'middleware' => ['admin'],
        'uses' => 'Admin\Master\SubCategoriesController@disable'
    ]);
});

