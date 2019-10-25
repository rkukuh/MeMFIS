<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('GroundSupportEquiptment')->group(function () {

            Route::resource('ground-support-equiptment', 'GroundSupportEquiptmentController', [
                'parameters' => ['ground-support-equiptment' => 'groundSupportEquiptment']
            ])->except('create','show','edit');

            Route::get('ground-support-equiptment/{type}', 'GroundSupportEquiptmentController@create')->name('ground-support-equiptment.create');
            Route::get('ground-support-equiptment/{groundSupportEquiptment}/{type}', 'GroundSupportEquiptmentController@show')->name('ground-support-equiptment.show');
            Route::get('ground-support-equiptment/{groundSupportEquiptment}/edit/{type}', 'GroundSupportEquiptmentController@edit')->name('ground-support-equiptment.edit');

            Route::name('ground-support-equiptment.')->group(function () {
                Route::prefix('ground-support-equiptment')->group(function () {
                    Route::post('/{groundSupportEquiptment}/item/{item}', 'ItemGroundSupportEquiptmentController@store')->name('item.store');
                    Route::put('/{groundSupportEquiptment}/item/{item}', 'ItemGroundSupportEquiptmentController@update')->name('item.update');
                    Route::delete('/{groundSupportEquiptment}/item/{item}', 'ItemGroundSupportEquiptmentController@destroy')->name('item.destroy');
                });
            });
        });

    });

});
