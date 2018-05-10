<?php

Route::get('/', 'indexController@index')->name('index');

Auth::routes();

Route::group(['middleware' => 'auth:web'], function() {

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

    // Projects

    Route::get('/admin/projects', 'adminProjectsController@index')->name('projects');

    Route::get('/admin/projects/load-data', 'adminProjectsController@loadTable')->name('projects-load-data');

    Route::get('/admin/projects/edit', 'adminProjectsController@edit')->name('projects-edit');

    Route::post('/admin/projects/store', 'adminProjectsController@store')->name('projects-store');

    Route::post('/admin/projects/update', 'adminProjectsController@update')->name('projects-update');

    Route::post('/admin/projects/delete', 'adminProjectsController@delete')->name('projects-delete');

    // Team

    Route::get('/admin/team', 'adminTeamController@index')->name('team');

    Route::get('/admin/team/load-data', 'adminTeamController@loadTable')->name('team-load-data');

    Route::get('/admin/team/edit', 'adminTeamController@edit')->name('team-edit');

    Route::post('/admin/team/store', 'adminTeamController@store')->name('team-store');

    Route::post('/admin/team/update', 'adminTeamController@update')->name('team-update');

    Route::post('/admin/team/delete', 'adminTeamController@delete')->name('team-delete');

    // Positions

    Route::get('/admin/positions', 'adminPositionsController@index')->name('positions');

    Route::get('/admin/positions/load-data', 'adminPositionsController@loadTable')->name('positions-load-data');

    Route::get('/admin/positions/edit', 'adminPositionsController@edit')->name('positions-edit');

    Route::post('/admin/positions/store', 'adminPositionsController@store')->name('positions-store');

    Route::post('/admin/positions/update', 'adminPositionsController@update')->name('positions-update');

    Route::post('/admin/positions/delete', 'adminPositionsController@delete')->name('positions-delete');

});
