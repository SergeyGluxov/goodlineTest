<?php

//Авторизация
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/github', 'Auth\ULoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\ULoginController@handleProviderCallback');

//Для всех пользователей
Route::get('/', 'PasteController@index');
Route::post('/','PasteController@store')->name('store_paste');
Route::get('/search','PasteController@search')->name('search');

//Для авторизованного пользователя
Route::get('/{id}', 'PasteController@show')->name('show_paste');


