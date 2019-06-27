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

            Route::post('jobcard-hardtime-engineer', 'JobCardHardTimeEngineerController@search')->name('engineer.jobcard.hardtime.search');

            Route::resource('jobcard-hardtime-mechanic', 'JobCardHardTimeMechanicController', [
                'parameters' => ['jobcard-hardtime-mechanic' => 'htcrr']
            ]);

            Route::post('jobcard-hardtime-mechanic/', 'JobCardHardTimeMechanicController@search')->name('mechanic.jobcard.hardtime.search');

            Route::name('jobcard.hardtime.')->group(function () {

                Route::prefix('jobcard-hardtime')->group(function () {

                    /** Transaction */
                    Route::get('/{jobCard}/print', 'JobCardHardTimeController@print')->name('print');

                });

            });

        });

    });

});