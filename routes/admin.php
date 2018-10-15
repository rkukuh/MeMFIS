<?php

Route::name('admin.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin'

    ], function () {

        /** INITIAL DATA */

        Route::resource('type', 'TypeController');
        Route::resource('unit', 'UnitController');
        Route::resource('status', 'StatusController');

        /** POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('note', 'NoteController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('address', 'AddressController');

        /** MASTER */

        Route::resource('item', 'ItemController');
        Route::resource('license', 'LicenseController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');

        /** EDUCATION */

        Route::resource('general-license', 'GeneralLicenseController');

        /** FINANCE */

        Route::resource('bank', 'BankController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('bank-account', 'BankAccountController');

    });

});
