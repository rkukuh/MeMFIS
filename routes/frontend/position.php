<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Position')->group(function () {
            Route::resource('position', 'PositionController');

            Route::name('position.')->group(function () {
                Route::prefix('position')->group(function () {
                    
                    /** Polymorph */
                    Route::resource('/update-benefits', 'BenefitsPositionController');

                });

            });
        });
    });

});