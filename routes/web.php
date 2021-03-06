<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/home', '/admin', 301);


////////////////////////////// ADMIN AREA //////////////////////////////

Route::name('admin.')->group(function () {
    
    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin'
    
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

        Route::resource('event', 'EventController');
    
        Route::resource('category-event', 'CategoryEventController', [
            'parameters' => ['category-event' => 'category']
        ]);
    
        /** PARTNER **/

        Route::resource('partner', 'PartnerController');
    
        Route::resource('category-partner', 'CategoryPartnerController', [
            'parameters' => ['category-partner' => 'category']
        ]);
    
        /** DONATION **/

        Route::patch('/donation/{donation}/toggle-activation', 'DonationController@toggleActivation')
             ->name('donation.toggle-activation');

        Route::resource('donation', 'DonationController');
        Route::resource('donate', 'DonateController');
    
        Route::resource('category-donation', 'CategoryDonationController', [
            'parameters' => ['category-donation' => 'category']
        ]);

        /** GALLERY **/

        Route::resource('gallery', 'GalleryController');
    
        Route::resource('category-gallery', 'CategoryGalleryController', [
            'parameters' => ['category-gallery' => 'category']
        ]);

        /** ADVERTISEMENT **/

        Route::resource('advertisement', 'AdvertisementController');
    
        /** SETTING **/
    
        Route::resource('tag', 'TagController');
        Route::resource('user', 'UserController');
        Route::resource('image', 'ImageController');

        /** SUBSCRIBER **/

        Route::resource('contact', 'ContactController');
        Route::resource('subscriber', 'SubscriberController');
    
    });

});


////////////////////////////// FRONT-END //////////////////////////////

Route::get('/interchange/donation/{view}', 'InterchangeController@donation');
Route::get('/interchange/thumbnails/{view}', 'InterchangeController@thumbnails');

Route::get('/', 'MainController@home');
Route::get('/about-us', 'MainController@about');
Route::get('/partners', 'MainController@partners');
Route::get('/our-projects', 'MainController@projects');
Route::get('/events', 'MainController@events');
Route::get('/events/detail/{id}', 'MainController@event_detail');
Route::get('/blog', 'MainController@blog');
Route::get('/blog/article/{id}', 'MainController@blog_article');
Route::get('/gallery', 'MainController@gallery');
Route::get('/gallery/detail/{id}', 'MainController@gallery_detail');
Route::get('/contact-us', 'MainController@contact');
Route::get('/donations', 'MainController@donations');

Route::resource('donate', 'DonateController');
Route::resource('contact', 'ContactController');
Route::resource('participant', 'ParticipantController');

Route::name('csv.participant')
     ->get('download/csv/participant', 'DownloadCsvController@participant');

Route::name('csv.donator')
     ->get('download/csv/donator', 'DownloadCsvController@donator');

Route::name('csv.contact')
     ->get('download/csv/contact', 'DownloadCsvController@contact');
