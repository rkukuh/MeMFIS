<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** ITEM */

        Route::namespace('Service')->group(function () {

            Route::resource('service', 'ServiceController');

            Route::name('service.')->group(function () {

                Route::prefix('service')->group(function () {

                });

            });

        });

    });

});
