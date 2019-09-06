<?php
Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {


        Route::namespace('Facility')->group(function () {

            Route::resource('facility', 'FacilityController');

            Route::name('facility.')->group(function () {

                Route::prefix('facility')->group(function () {

                    /** Price List */
                    Route::put('/{facility}/prices', 'FacilityPriceController@update')->name('price.update');
                    Route::get('/{facility}/prices/edit', 'FacilityPriceController@edit')->name('price.edit');
                    // Route::resource('/{facility}/prices', 'FacilityPriceController');
                });

            });

        });

        /** INTERCHANGE */

        Route::namespace('Interchange')->group(function () {

            Route::resource('interchange', 'InterchangeController');
            
        });

    });

});