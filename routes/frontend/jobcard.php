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

            Route::resource('jobcard-mechanic', 'JobCardMechanicController', [
                'parameters' => ['jobcard-mechanic' => 'jobcard']
            ]);


            Route::name('jobcard.')->group(function () {

                Route::prefix('jobcard')->group(function () {

                    /** Transaction */
                    Route::get('/{jobCard}/print', 'JobCardController@print')->name('print');
                    Route::get('/{jobcard}/edit', 'JobCardController@edit')->name('edit');
                    Route::get('/', 'JobCardController@index')->name('index');
                    Route::post('jobcard-search/', 'JobCardController@search')->name('search');
                });

            });

        });

    });

});
