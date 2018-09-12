<?php

Route::name('admin.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin'

    ], function () {

        /** MASTER */

        Route::resource('bank', 'BankController');

        /** FINANCE */

        Route::resource('bank-account', 'BankAccountController');

    });

});
