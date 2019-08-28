<?php

Auth::routes();

//Для всех пользователей
Route::get('/', 'PasteController@index');
Route::post('/','PasteController@store')->name('store_paste');

//Для авторизованного пользователя
Route::get('/{id}', 'PasteController@show')->name('show_paste');

Route::get('login/github', 'Auth\ULoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\ULoginController@handleProviderCallback');

