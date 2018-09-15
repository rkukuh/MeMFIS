<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend'

    ], function () {

        Route::view('/', 'auth.login');

        Route::resource('/customer', 'CustomerController');
        Route::get('getcustomer','CustomerController@getcustomer')->name('getcustomer');

        Route::resource('/category', 'CategoryController');
        Route::get('getcategory','CategoryController@getcategory')->name('getcategory');

        Route::resource('/item', 'ItemController');
        Route::get('getitem','ItemController@getitem')->name('getitem');

        Route::resource('/itemstock', 'ItemStockController');
        Route::get('getitemstock','ItemStockController@getitemstock')->name('getitemstock');

        Route::resource('/itemunit', 'ItemUnitController');
        Route::get('getitemunit','ItemUnitController@getitemunit')->name('getitemunit');

        Route::resource('/werehouse', 'WerehouseController');
        Route::get('getwerehouse','WerehouseController@getwerehouse')->name('getwerehouse');

        Route::resource('/supplier', 'SupplierController');
        Route::get('getsupplier','SupplierController@getwerehouse')->name('getsupplier');

        Route::get('addres/country','AddresController@country')->name('country');
        Route::get('addres/city/{id}','AddresController@city')->name('city');

        Route::view('/audit', 'frontend.audit');
        Route::get('getaudit','AuditController@getaudit')->name('getaudit');

        Route::resource('/bank', 'Frontend\BankController');
        Route::resource('/bankaccount', 'Frontend\BankAccountController');
        Route::resource('/phone', 'Frontend\PhoneController');
        Route::resource('/fax', 'Frontend\FaxController');
        Route::resource('/email', 'Frontend\EmailController');
        Route::resource('/department', 'Frontend\DepartmentController');


        Route::get('/quotation', function () {
            $pdf = \PDF::loadView('frontend/form/quotation');
            return $pdf->stream();
        });

        Route::get('/preliminary', function () {
            $pdf = \PDF::loadView('frontend/form/preliminary');
            return $pdf->stream();
        });

    });

});
