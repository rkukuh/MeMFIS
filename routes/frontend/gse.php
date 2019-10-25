<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('GroundSupportEquiptment')->group(function () {

            Route::resource('ground-support-equiptment', 'GroundSupportEquiptmentController');

            Route::name('ground-support-equiptment.')->group(function () {
                Route::prefix('ground-support-equiptment')->group(function () {
                    Route::post('/{GroundSupportEquiptment}/item/{item}', 'ItemGroundSupportEquiptmentController@store')->name('item.store');
                    Route::put('/{GroundSupportEquiptment}/item/{item}', 'ItemGroundSupportEquiptmentController@update')->name('item.update');
                    Route::delete('/{GroundSupportEquiptment}/item/{item}', 'ItemGroundSupportEquiptmentController@destroy')->name('item.destroy');
                });
            });
        });

    });

});
