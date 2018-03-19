<?php

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');


////////////////////////////// ADMIN AREA //////////////////////////////

Route::group([

    'name'          => 'admin',
    'prefix'        => 'admin',
    'namespace'     => 'Admin',
    'middleware'    => 'auth'

], function () {

    Route::view('/', 'admin.dashboard');
    
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');

});