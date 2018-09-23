<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend'

    ], function () {

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');

        Route::resource('customer', 'CustomerController');
        Route::get('/getcustomer','CustomerController@getCustomers')->name('getcustomers');

        Route::resource('category', 'CategoryController');
        Route::get('/getcategories','CategoryController@getCategories')->name('getcategories');

        Route::resource('item', 'ItemController');
        Route::get('/getitems','ItemController@getItems')->name('getitems');

        Route::resource('item-stock', 'ItemStockController');
        Route::get('/getitem-stocks','ItemStockController@getItemStocks')->name('getitemstocks');

        Route::resource('item-unit', 'ItemUnitController');
        Route::get('/getItem-units','ItemUnitController@getItemUnits')->name('getitemunits');

        Route::resource('warehouse', 'WarehouseController');
        Route::get('/getwarehouses','WarehouseController@getWarehouses')->name('getwarehouses');

        Route::resource('supplier', 'SupplierController');
        Route::get('/getsuppliers','SupplierController@getSuppliers')->name('getsuppliers');

        Route::get('/addres/country','AddresController@Country')->name('country');
        Route::get('/addres/city/{id}','AddresController@City')->name('city');

        Route::resource('audit', 'AuditController');
        Route::get('/getaudit','AuditController@getAudits')->name('getaudits');

        Route::resource('bank', 'BankController');
        Route::resource('bankaccount', 'BankAccountController');
        Route::resource('phone', 'PhoneController');
        Route::resource('fax', 'FaxController');
        Route::resource('email', 'EmailController');
        Route::resource('department', 'DepartmentController');
        Route::resource('taskcard', 'TaskCardController');
        Route::get('/gettaskcard', 'TaskCardController@getTaskCards')->name('gettaskcards');
        Route::resource('taskcard-package', 'TaskCardPackageController');
        Route::get('/gettaskcardpackage', 'TaskCardPackageController@getTaskCardPackage')->name('gettaskcardpackage');
        Route::resource('workpackage', 'WorkPackageController');
        Route::get('/getworkpakages', 'WorkPackageController@getWorkPackage')->name('getworkpackage');
        Route::resource('quotation', 'QuotationController');
        Route::get('/getquotation', 'QuotationController@getQuotations')->name('getquotation');
        Route::resource('journal', 'JournalController');
        Route::get('/getjournal', 'JournalController@getJournals')->name('getjournal');

        Route::resource('type', 'TypeController');
        Route::resource('accountcode', 'AccountCodeController');


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
            // $pdf->setPaper('A4', 'landscape');
            return $pdf->stream();
        });

        Route::get('/workpackage-doc', function () {
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
