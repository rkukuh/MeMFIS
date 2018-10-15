<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend'

    ], function () {

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');

        Route::resource('fax', 'FaxController');
        Route::resource('type', 'TypeController');
        Route::resource('bank', 'BankController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('status', 'StatusController');
        Route::resource('address', 'AddressController');
        Route::resource('department', 'DepartmentController');
        Route::resource('bankaccount', 'BankAccountController');

        Route::resource('customer', 'CustomerController');
        Route::get('/get-customers','CustomerController@getCustomers')->name('get-customers');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);
        Route::get('/get-item-categories','CategoryItemController@getCategories')->name('get-item-categories');

        Route::resource('item', 'ItemController');
        Route::get('/get-items','ItemController@getItems')->name('get-items');
        Route::post('/post-photos','ItemController@postPhotos')->name('post-photos');

        Route::resource('item-storage', 'ItemStorageController');
        Route::get('/get-item-storages/{code}','ItemStorageController@getItemStorages')->name('get-item-storages');

        Route::resource('item-unit', 'ItemUnitController');
        Route::get('/get-uom/{code}','ItemUnitController@getUoM')->name('get-uom');

        Route::resource('storage', 'StorageController');
        Route::get('/get-storages','StorageController@getStorages')->name('get-storages');

        Route::resource('supplier', 'SupplierController');
        Route::get('/get-suppliers','SupplierController@getSuppliers')->name('get-suppliers');

        Route::get('/addres/country','AddresController@Country')->name('country');
        Route::get('/addres/city/{id}','AddresController@City')->name('city');

        Route::resource('audit', 'AuditController');
        Route::get('/get-audits','AuditController@getAudits')->name('get-audits');

        Route::resource('taskcard', 'TaskCardController');
        Route::get('/get-taskcards', 'TaskCardController@getTaskCards')->name('get-taskcards');

        Route::resource('taskcard-package', 'TaskCardPackageController');
        Route::get('/get-taskcardpackages', 'TaskCardPackageController@getTaskCardPackage')->name('get-taskcardpackages');

        Route::resource('workpackage', 'WorkPackageController');
        Route::get('/get-workpakages', 'WorkPackageController@getWorkPackage')->name('get-workpackages');

        Route::resource('quotation', 'QuotationController');
        Route::get('/get-quotations', 'QuotationController@getQuotations')->name('get-quotations');

        Route::resource('journal', 'JournalController');
        Route::get('/get-journals', 'JournalController@getJournals')->name('get-journals');

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
