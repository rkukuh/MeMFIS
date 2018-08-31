<?php

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/customer', 'frontend\CustomerController');
Route::get('getcustomer','frontend\CustomerController@getcustomer')->name('getcustomer');
Route::get('addres/country','frontend\AddresController@country')->name('country');
Route::get('addres/city/{id}','frontend\AddresController@city')->name('city');
// Route::get('/kecamatan/ajax/{id}',array('as'=>'myform.ajax','uses'=>'KecamatanController@myformAjax'));

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('frontend.home');
});
