<?php

Route::get('/', 'indexController@index')->name('/');

Route::post('contact', 'adminInboxController@store')->name('contact');

Route::post('paypal', 'PaymentController@payWithpaypal');

Route::get('status', 'PaymentController@getPaymentStatus')->name('status');

Auth::routes();

Route::get('refresh-csrf', function(){
    return csrf_token();
});

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', 'adminIndexController@index')->name('admin');

    // Users

    Route::get('/admin/users', 'adminUsersController@index')->name('users');

    Route::get('/admin/users/load-data', 'adminUsersController@loadTable')->name('users-load-data');

    Route::get('/admin/users/edit', 'adminUsersController@edit')->name('edit');

    Route::post('/admin/users/store', 'adminUsersController@store')->name('store');

    Route::post('/admin/users/update', 'adminUsersController@update')->name('update');

    Route::post('/admin/users/delete', 'adminUsersController@delete')->name('delete');

    // Services

    Route::get('/admin/news', 'adminNewsController@index')->name('news');

    Route::get('/admin/news/load-data', 'adminNewsController@loadTable')->name('news-load-data');

    Route::get('/admin/news/edit', 'adminNewsController@edit')->name('news-edit');

    Route::post('/admin/news/store', 'adminNewsController@store')->name('news-store');

    Route::post('/admin/news/update', 'adminNewsController@update')->name('news-update');

    Route::post('/admin/news/delete', 'adminNewsController@delete')->name('news-delete');

    // Gallery

    Route::get('/admin/gallery', 'adminGalleryController@index')->name('gallery');

    Route::get('/admin/gallery/load-data', 'adminGalleryController@loadTable')->name('gallery-load-data');

    Route::get('/admin/gallery/edit', 'adminGalleryController@edit')->name('gallery-edit');

    Route::post('/admin/gallery/store', 'adminGalleryController@store')->name('gallery-store');

    Route::post('/admin/gallery/update', 'adminGalleryController@update')->name('gallery-update');

    Route::post('/admin/gallery/delete', 'adminGalleryController@delete')->name('gallery-delete');

    // Faq

    Route::get('/admin/faq', 'adminFaqController@index')->name('faq');

    Route::get('/admin/faq/load-data', 'adminFaqController@loadTable')->name('faq-load-data');

    Route::get('/admin/faq/edit', 'adminFaqController@edit')->name('faq-edit');

    Route::post('/admin/faq/store', 'adminFaqController@store')->name('faq-store');

    Route::post('/admin/faq/update', 'adminFaqController@update')->name('faq-update');

    Route::post('/admin/faq/delete', 'adminFaqController@delete')->name('faq-delete');

    // Inbox

    Route::get('/admin/inbox', 'adminInboxController@index')->name('inbox');

    Route::get('/admin/inbox/load-data', 'adminInboxController@loadTable')->name('inbox-load-data');

    Route::get('/admin/inbox/edit', 'adminInboxController@edit')->name('inbox-edit');

    Route::post('/admin/inbox/delete', 'adminInboxController@delete')->name('inbox-delete');

});
