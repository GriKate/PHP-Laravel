<?php

Route::get('/', 'HomeController@index');

Route::get('/news/', 'NewsController@news')->name('news');

Route::get('/news/category/', 'NewsController@newsCategory');
Route::get('/news/category/{id}', 'NewsController@newsCategoryId');

Route::get('/news/{id}', 'NewsController@newsOne');



