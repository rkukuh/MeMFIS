<?php

Route::name('admin.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin'

    ], function () {

        /** INDEPENDENT / POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('type', 'TypeController');
        Route::resource('phone', 'PhoneController');

        /** FINANCE */

        Route::resource('bank', 'BankController');
        Route::resource('bank-account', 'BankAccountController');

    });

});
