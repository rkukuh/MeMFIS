<?php

Route::name('admin.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin'

    ], function () {

        /** INITIAL DATA */

        Route::resource('type', 'TypeController');
        Route::resource('status', 'StatusController');

        /** POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');

        /** MASTER */

        Route::resource('unit', 'UnitController');
        Route::resource('item', 'ItemController');
        Route::resource('department', 'DepartmentController');

        /** FINANCE */

        Route::resource('bank', 'BankController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('bank-account', 'BankAccountController');

    });

});
