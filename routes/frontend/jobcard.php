<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('JobCard')->group(function () {

            Route::resource('jobcard-ppc', 'JobCardPPCController', [
                'parameters' => ['jobcard-ppc' => 'jobcard']
            ]);

            Route::resource('jobcard-engineer', 'JobCardEngineerController', [
                'parameters' => ['jobcard-engineer' => 'jobcard']
            ]);

            Route::post('jobcard-engineer', 'JobCardEngineerController@search')->name('engineer.jobcard.search');

            Route::resource('jobcard-mechanic', 'JobCardMechanicController', [
                'parameters' => ['jobcard-mechanic' => 'jobcard']
            ]);

            Route::post('jobcard-mechanic/', 'JobCardMechanicController@search')->name('mechanic.jobcard.search');

            Route::name('jobcard.')->group(function () {

                Route::prefix('jobcard')->group(function () {

                    /** Transaction */
                    Route::get('/{jobCard}/print', 'JobCardController@print');
                });

            });

        });

    });

});