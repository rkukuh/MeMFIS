<?php

Route::name('admin.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin'

    ], function () {

        Route::resource('bank', 'BankController');

    });

});
