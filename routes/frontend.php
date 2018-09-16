<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend'

    ], function () {

        Route::resource('/customer', 'CustomerController');
        Route::get('/getcustomer','CustomerController@getCustomers')->name('getcustomers');

        Route::resource('/category', 'CategoryController');
        Route::get('/getcategories','CategoryController@getCategories')->name('getcategories');

        Route::resource('/item', 'ItemController');
        Route::get('/getitems','ItemController@getItems')->name('getitems');

        Route::resource('/itemstock', 'ItemStockController');
        Route::get('/getitemstocks','ItemStockController@getItemStocks')->name('getitemstocks');

        Route::resource('/itemunit', 'ItemUnitController');
        Route::get('/getItemunits','ItemUnitController@getItemUnits')->name('getitemunits');

        Route::resource('/warehouse', 'WarehouseController');
        Route::get('/getwarehouses','WarehouseController@getWarehouses')->name('getwarehouses');

        Route::resource('/supplier', 'SupplierController');
        Route::get('/getsuppliers','SupplierController@getSuppliers')->name('getsuppliers');

        Route::get('/addres/country','AddresController@Country')->name('country');
        Route::get('/addres/city/{id}','AddresController@City')->name('city');

        Route::resource('/audit', 'AuditController');
        Route::get('/getaudit','AuditController@getAudits')->name('getaudits');

        Route::resource('/bank', 'BankController');
        Route::resource('/bankaccount', 'BankAccountController');
        Route::resource('/phone', 'PhoneController');
        Route::resource('/fax', 'FaxController');
        Route::resource('/email', 'EmailController');
        Route::resource('/department', 'DepartmentController');
        Route::resource('/taskcard', 'TaskCardController');
        Route::get('/taskcard', 'TaskCardController@getTaskCards')->name('gettaskcards');
        Route::resource('/tp', 'TaskCardPackageController');
        Route::get('/tp', 'TaskCardPackageController@getTaskCardPackage')->name('gettaskcardpackage');
        Route::resource('/wp', 'WorkPackageController');
        Route::get('/wp', 'WorkPackageController@getWorkPackage')->name('getworkpackage');
        Route::resource('/quotation', 'QuotationController');
        Route::get('/quotation', 'QuotationController@getQuotations')->name('getquotations');


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
