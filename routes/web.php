<?php

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function () {
    return view('frontend.home');
});


Route::resource('/customer', 'frontend\CustomerController');
Route::get('getcustomer','frontend\CustomerController@getcustomer')->name('getcustomer');

Route::resource('/category', 'frontend\CategoryController');
Route::get('getcategory','frontend\CategoryController@getcategory')->name('getcategory');

Route::resource('/item', 'frontend\ItemController');
Route::get('getitem','frontend\ItemController@getitem')->name('getitem');

Route::resource('/itemstock', 'frontend\ItemStockController');
Route::get('getitemstock','frontend\ItemStockController@getitemstock')->name('getitemstock');

Route::resource('/itemunit', 'frontend\ItemUnitController');
Route::get('getitemunit','frontend\ItemUnitController@getitemunit')->name('getitemunit');

Route::resource('/werehouse', 'frontend\WerehouseController');
Route::get('getwerehouse','frontend\WerehouseController@getwerehouse')->name('getwerehouse');

Route::resource('/supplier', 'frontend\SupplierController');
Route::get('getsupplier','frontend\SupplierController@getwerehouse')->name('getsupplier');

Route::get('addres/country','frontend\AddresController@country')->name('country');
Route::get('addres/city/{id}','frontend\AddresController@city')->name('city');

Route::get('getaudit','frontend\AuditController@getaudit')->name('getaudit');

Route::get('/audit', function () {
    return view('frontend.audit');
});

Route::get('/quotation', function () {
    $pdf = \PDF::loadView('frontend/form/quotation');
    return $pdf->stream();
});

Route::get('/preliminary', function () {
    $pdf = \PDF::loadView('frontend/form/preliminary');
    return $pdf->stream();
});

