<?php

Route::get('/', 'HomeController@index');

Route::group(
    ['prefix' => 'news',
        'as' => 'news.'], function() {
    Route::get('/all/', 'NewsController@news')->name('all');
    Route::get('/one/{id}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/', 'NewsController@newsCategory')->name('categories');
    Route::get('/category/{id}', 'NewsController@newsCategoryId')->name('categoryId');
    }
);
