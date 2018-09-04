<?php

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/customer', 'frontend\CustomerController');
Route::get('getcustomer','frontend\CustomerController@getcustomer')->name('getcustomer');
Route::get('addres/country','frontend\AddresController@country')->name('country');
Route::get('addres/city/{id}','frontend\AddresController@city')->name('city');
Route::get('getaudit','frontend\AuditController@getaudit')->name('getaudit');

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('frontend.home');
});
Route::get('/audit', function () {
    return view('frontend.audit');
});

Route::get('/quation', function () {
    $pdf = \PDF::loadView('frontend/form/quation');
    return $pdf->stream();
});

Route::get('/preliminary', function () {
    $pdf = \PDF::loadView('frontend/form/preliminary');
    return $pdf->stream();
});

