<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Aircraft')->group(function () {

            Route::resource('aircraft', 'AircraftController');

            Route::name('aircraft.')->group(function () {
                Route::prefix('aircraft')->group(function () {

                    /** Polymorph */
                    Route::resource('/{aircraft}/zones', 'AircraftZonesController');
                    Route::resource('/{aircraft}/accesses', 'AircraftAccessesController');
                    Route::resource('/{aircraft}/stations', 'AircraftStationsController');

                });
            });

        });

    });

});