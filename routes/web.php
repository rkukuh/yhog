<?php

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/home', '/admin', 301);


////////////////////////////// ADMIN AREA //////////////////////////////

Route::group([

    'name'          => 'admin',
    'prefix'        => 'admin',
    'namespace'     => 'Admin',
    'middleware'    => 'auth'

], function () {

    Route::view('/', 'admin.dashboard.index')->name('dashboard.index');
    
    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryPostController'); // TODO: can it has 'category.post' prefix name?

    Route::resource('user', 'UserController');

});