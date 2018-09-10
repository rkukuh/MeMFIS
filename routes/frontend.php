<?php

Route::view('/', 'auth.login');

Route::view('/home', 'frontend.home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/customer', 'Frontend\CustomerController');
Route::get('getcustomer','Frontend\CustomerController@getcustomer')->name('getcustomer');

Route::resource('/category', 'Frontend\CategoryController');
Route::get('getcategory','Frontend\CategoryController@getcategory')->name('getcategory');

Route::resource('/item', 'Frontend\ItemController');
Route::get('getitem','Frontend\ItemController@getitem')->name('getitem');

Route::resource('/itemstock', 'Frontend\ItemStockController');
Route::get('getitemstock','Frontend\ItemStockController@getitemstock')->name('getitemstock');

Route::resource('/itemunit', 'Frontend\ItemUnitController');
Route::get('getitemunit','Frontend\ItemUnitController@getitemunit')->name('getitemunit');

Route::resource('/werehouse', 'Frontend\WerehouseController');
Route::get('getwerehouse','Frontend\WerehouseController@getwerehouse')->name('getwerehouse');

Route::resource('/supplier', 'Frontend\SupplierController');
Route::get('getsupplier','Frontend\SupplierController@getwerehouse')->name('getsupplier');

Route::get('addres/country','Frontend\AddresController@country')->name('country');
Route::get('addres/city/{id}','Frontend\AddresController@city')->name('city');

Route::view('/audit', 'frontend.audit');
Route::get('getaudit','Frontend\AuditController@getaudit')->name('getaudit');

Route::get('/quotation', function () {
    $pdf = \PDF::loadView('frontend/form/quotation');
    return $pdf->stream();
});

Route::get('/preliminary', function () {
    $pdf = \PDF::loadView('frontend/form/preliminary');
    return $pdf->stream();
});
