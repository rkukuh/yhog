<?php

Auth::routes();
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

    /** GALLERY **/

    Route::resource('category-gallery', 'CategoryGalleryController', [
        'parameters' => ['category-gallery' => 'category']
    ]);

    /** PARTNER **/

    Route::resource('category-partner', 'CategoryPartnerController', [
        'parameters' => ['category-partner' => 'category']
    ]);

    /** DONATION **/

    Route::resource('category-donation', 'CategoryDonationController', [
        'parameters' => ['category-donation' => 'category']
    ]);

    /** SETTING **/

    Route::resource('user', 'UserController');

});



////////////////////////////// FRONT-END //////////////////////////////

Route::get('/interchange/{view}', 'InterchangeController@index');

Route::get('/', 'MainController@home');
Route::get('/our-projects', 'MainController@projects');
Route::get('/events', 'MainController@events');
Route::get('/events/detail', 'MainController@event_detail');