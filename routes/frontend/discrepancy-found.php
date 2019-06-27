<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Discrepancy')->group(function () {

            Route::resource('discrepancy', 'DiscrepancyController');

            Route::resource('discrepancy-ppc', 'DiscrepancyPPCController', [
                'parameters' => ['discrepancy-ppc' => 'discrepancy']
            ]);

            Route::post('discrepancy-engineer/search', 'DiscrepancyEngineerController@search')->name('engineer.discrepancy.search');


            Route::resource('discrepancy-engineer', 'DiscrepancyEngineerController', [
                'parameters' => ['discrepancy-engineer' => 'discrepancy']
            ]);

            Route::resource('discrepancy-mechanic', 'DiscrepancyMechanicController', [
                'parameters' => ['discrepancy-mechanic' => 'discrepancy']
            ]);

            Route::name('discrepancy.')->group(function () {
                Route::prefix('discrepancy')->group(function () {

                    /** Transaction */
                    Route::POST('{jobcard}/engineer/create', 'DiscrepancyEngineerController@create')->name('jobcard.engineer.discrepancy.create');
                    Route::GET('{jobcard}/engineer/', 'DiscrepancyEngineerController@create')->name('jobcard.engineer.discrepancy');
                    Route::POST('{jobcard}/mechanic/create', 'DiscrepancyMechanicController@create')->name('jobcard.mechanic.discrepancy.create');
                    Route::GET('{jobcard}/mechanic/', 'DiscrepancyMechanicController@create')->name('jobcard.mechanic.discrepancy');
                    Route::PUT('{discrepancy}/engineer/approve', 'DiscrepancyEngineerController@approve')->name('jobcard.engineer.discrepancy.approve');
                    Route::PUT('{discrepancy}/ppc/approve', 'DiscrepancyPPCController@approve')->name('jobcard.ppc.discrepancy.approve');

                    /** Transaction: Item */
                    Route::resource('/{discrepancy}/item', 'DiscrepancyItemController');

                });
                
            });

        });

    });

});