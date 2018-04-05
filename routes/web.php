<?php

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/home', '/admin', 301);


////////////////////////////// ADMIN AREA //////////////////////////////

Route::name('admin.')->group(function () {
    
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

        Route::resource('tag-post', 'TagPostController', [
            'parameters' => ['tag-post' => 'tag']
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

        Route::resource('partner', 'PartnerController');
    
        Route::resource('category-partner', 'CategoryPartnerController', [
            'parameters' => ['category-partner' => 'category']
        ]);
    
        /** DONATION **/
    
        Route::resource('category-donation', 'CategoryDonationController', [
            'parameters' => ['category-donation' => 'category']
        ]);
    
        /** SETTING **/
    
        Route::resource('tag', 'TagController');
        Route::resource('user', 'UserController');
        Route::resource('image', 'ImageController');
    
    });

});