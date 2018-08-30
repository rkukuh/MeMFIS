<?php

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/customer', 'frontend\CustomerController');
Route::get('getcustomer','frontend\CustomerController@getcustomer')->name('getcustomer');

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('frontend.home');
});
