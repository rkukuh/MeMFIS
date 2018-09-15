<?php

Route::name('frontend.')->group(function () {

    Route::group([

        // 'middleware'    => 'auth',
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

        Route::resource('/audit', 'AuditController');
        Route::get('getaudit','AuditController@getaudit')->name('getaudit');

        Route::resource('/bank', 'BankController');
        Route::resource('/bankaccount', 'BankAccountController');
        Route::resource('/phone', 'PhoneController');
        Route::resource('/fax', 'FaxController');
        Route::resource('/email', 'EmailController');
        Route::resource('/department', 'DepartmentController');
        Route::resource('/taskcard', 'TaskCardController');
        Route::resource('/tp', 'TPController');
        Route::resource('/wp', 'WorkPackageController');
        Route::resource('/quotation', 'QuotationController');


        Route::get('/quotation-doc', function () {
            $pdf = \PDF::loadView('frontend/form/quotation');
            return $pdf->stream();
        });

        Route::get('/preliminary', function () {
            $pdf = \PDF::loadView('frontend/form/preliminary');
            return $pdf->stream();
        });

        Route::get('/summaryworkpackage', function () {
            $pdf = \PDF::loadView('frontend/form/summary_wp');
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream();
        });

        Route::get('/workpackage', function () {
            $pdf = \PDF::loadView('frontend/form/workpackage');
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream();
        });

        

        Route::get('/wp-summart-doc', function () {
            $pdf = \PDF::loadView('frontend/form/wp');
            return $pdf->stream();
        });


    });

});
