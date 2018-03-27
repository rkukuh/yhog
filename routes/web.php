<?php

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/home', '/admin', 301);


////////////////////////////// ADMIN AREA //////////////////////////////

Route::group([

    'name'          => 'admin.',
    'prefix'        => 'admin',
    'namespace'     => 'Admin',
    'middleware'    => 'auth'

], function () {

    /** DASHBOARD **/

    Route::view('/', 'admin.dashboard.index')->name('dashboard.index');
    
    /** BLOG **/

    Route::resource('post', 'PostController');
    Route::resource('category-post', 'CategoryPostController', [
        'parameters' => ['category-post' => 'category']
    ]);

    /** EVENT **/

    Route::resource('category-event', 'CategoryEventController', [
        'parameters' => ['category-event' => 'category']
    ]);

    /** PARTNER **/

    Route::resource('category-partner', 'CategoryPartnerController', [
        'parameters' => ['category-partner' => 'category']
    ]);

    /** DONATION **/

    // TODO: Donation category

    /** SETTING **/

    Route::resource('user', 'UserController');

});