<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** INTERCHANGE */

        Route::namespace('Interchange')->group(function () {

            Route::resource('interchange', 'InterchangeController');

        });

    });

});
