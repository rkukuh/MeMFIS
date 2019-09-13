<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** ITEM */

        Route::namespace('Manhour')->group(function () {
            Route::name('manhour.')->group(function () {

                Route::resource('manhour', 'ManhourController');
                Route::prefix('manhour')->group(function () {

                    /** Price List */
                    // Route::resource('/{manhour}/rate', 'ManhourController');

                    /** Transaction: Unit */
                    // Route::post('/{manhour}/unit', 'ItemUnitController@store')->name('unit.store');
                    // Route::delete('/{manhour}/{unit}/unit', 'ItemUnitController@destroy')->name('unit.destroy');

                    /** Transaction: Storage */
                    // Route::post('/{item}/storage', 'ItemStorageController@store')->name('storage.store');
                    // Route::put('/{item}/storage', 'ItemStorageController@update')->name('storage.update');
                    // Route::delete('/{item}/{storage}/storage', 'ItemStorageController@destroy')->name('storage.destroy');

                });

            });

        });

    });

});
