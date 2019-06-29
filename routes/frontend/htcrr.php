<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** HT/CRR */

        Route::namespace('Project')->group(function () {

            Route::resource('htcrr', 'HtCrrController');

            Route::name('htcrr.')->group(function () {

                Route::prefix('htcrr')->group(function () {
                    //
                });

            });

        });

        /** JOB CARD: HT/CRR */

        Route::namespace('JobCardHardTime')->group(function () {

            Route::resource('jobcard-hardtime-ppc', 'JobCardHardTimePPCController', [
                'parameters' => ['jobcard-hardtime-ppc' => 'htcrr']
            ]);

            Route::resource('jobcard-hardtime-engineer', 'JobCardHardTimeEngineerController', [
                'parameters' => ['jobcard-hardtime-engineer' => 'htcrr']
            ]);

            Route::resource('jobcard-hardtime-mechanic', 'JobCardHardTimeMechanicController', [
                'parameters' => ['jobcard-hardtime-mechanic' => 'htcrr']
            ]);


            Route::name('jobcard.hardtime.')->group(function () {

                Route::prefix('jobcard-hardtime')->group(function () {

                    /** Transaction */
                    Route::get('/', 'JobCardHardTimeController@index')->name('index');
                    Route::get('/{htcrr}/edit', 'JobCardHardTimeController@edit')->name('edit');
                    Route::get('/{htcrr}/print', 'JobCardHardTimeController@print')->name('print');
                    Route::post('/search', 'JobCardHardTimeController@search')->name('search');

                });

            });

        });

    });

});
