<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Vendor')->group(function () {

            Route::resource('supplier', 'VendorController',[
                'parameters' => ['supplier' => 'vendor']
            ]);

            Route::name('vendor.')->group(function () {
                Route::prefix('vendor')->group(function () {

                });
            });

        });

    });

});
