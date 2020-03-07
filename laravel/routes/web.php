<?php

Route::get('/', 'HomeController@index')->name('index');

Route::group(
    ['prefix' => 'news',
        'as' => 'news.'], function() {
    Route::get('/all/', 'NewsController@news')->name('all');
    Route::get('/one/{id}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/', 'NewsController@newsCategories')->name('categories');
    Route::get('/category/{id}', 'NewsController@newsCategoryId')->name('categoryId');
    Route::get('/download/', 'NewsController@newsGet')->name('get');
    Route::post('/download/news/', 'NewsController@newsDownload')->name('download');
    }
);

Route::group(
    ['prefix' => 'admin',
        'as' => 'admin.'], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::match(['get', 'post'], '/add/', 'AdminController@addNews')->name('addNews')->middleware('web');
    }
);



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
