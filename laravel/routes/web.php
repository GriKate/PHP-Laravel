<?php

Route::get('/', 'HomeController@index')->name('index');

Route::group(
    ['prefix' => 'news',
        'as' => 'news.'], function() {
    Route::get('/all/', 'NewsController@news')->name('all');
    Route::get('/one/{id}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/', 'NewsController@newsCategories')->name('categories');
    Route::get('/category/{id}', 'NewsController@newsCategoryId')->name('categoryId');
    Route::get('/add/', 'NewsController@addNews')->name('add');
    }
);

Route::group(
    ['prefix' => 'admin',
        'as' => 'admin.'], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/add/', 'AdminController@addNews')->name('add');
    }
);



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
