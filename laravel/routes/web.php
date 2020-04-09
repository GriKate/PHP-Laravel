<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::group(
    ['prefix' => 'news',
        'as' => 'news.'], function() {
    Route::get('/all/', 'NewsController@news')->name('all');
    Route::get('/one/{news}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/', 'NewsController@newsCategories')->name('categories');
    Route::get('/category/{id}', 'NewsController@newsCategoryId')->name('categoryId');
    Route::get('/download/', 'NewsController@newsGet')->name('get');
    Route::post('/download/news/', 'NewsController@newsDownload')->name('download');
    }
);

Route::group(
    ['prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.',
        'middleware' => ['auth', 'is_admin']], function() {
    Route::get('/users', 'UsersController@show')->name('allUsers');
    Route::get('/users/changeAdmin/{id}', 'UsersController@changeAdmin')->name('changeAdmin');
    Route::get('/', 'NewsController@all')->name('allNews');
    Route::match(['get', 'post'], '/addNews/', 'NewsController@add')->name('addNews')->middleware('web');
    Route::get('/updateNews{news}', 'NewsController@update')->name('updateNews');
    Route::post('/saveNews{news}', 'NewsController@save')->name('saveNews');
    Route::get('/deleteNews{news}', 'NewsController@delete')->name('deleteNews');
    }
);

Route::group(
    ['prefix' => 'profile',
        'as' => 'profile.'], function() {
    Route::get('/', 'ProfileController@index')->name('showProfile');
    Route::post('/update{user}', 'ProfileController@update')->name('updateProfile');
    }
);




Route::get('/home', 'HomeController@index')->name('home');
