<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('GroundSupportEquiptment')->group(function () {

            Route::resource('ground-support-equiptment', 'GroundSupportEquiptmentController');

        });

    });

});
