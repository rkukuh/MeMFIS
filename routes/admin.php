<?php

Route::name('admin.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin'

    ], function () {

        /** POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('type', 'TypeController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');

        /** MASTER */

        Route::resource('department', 'DepartmentController');

        /** FINANCE */

        Route::resource('bank', 'BankController');
        Route::resource('bank-account', 'BankAccountController');

    });

});
