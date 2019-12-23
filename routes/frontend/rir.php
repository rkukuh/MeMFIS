<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('RIR')->group(function () {

            Route::resource('rir', 'RIRController');
            Route::put('rir/{rir}/approve', 'RIRController@approve')->name('rir.approve')->middleware('permission:scm_receiving-inspection-report_approve');

            Route::name('rir.')->group(function () {
                Route::prefix('rir')->group(function () {
                    Route::post('/{rir}/item/{item}', 'ItemRIRController@store')->name('item.store');
                    Route::put('/{rir}/item/{item}', 'ItemRIRController@update')->name('item.update');
                    Route::delete('/{rir}/item/{item}', 'ItemRIRController@destroy')->name('item.destroy');
                });
            });

        });

    });

});
