<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('DefectCard')->group(function () {

            Route::resource('defectcard', 'DefectCardController');

            Route::resource('defectcard-engineer', 'DefectCardEngineerController', [
                'parameters' => ['defectcard-engineer' => 'defectcard']
            ]);

            Route::post('defectcard-engineer', 'DefectCardEngineerController@search')->name('engineer.defectcard.search');

            Route::resource('defectcard-ppc', 'DefectCardPPCController', [
                'parameters' => ['defectcard-ppc' => 'defectcard']
            ]);

            Route::resource('defectcard-mechanic', 'DefectCardMechanicController', [
                'parameters' => ['defectcard-mechanic' => 'defectcard']
            ]);


            Route::post('defectcard-mechanic', 'DefectCardMechanicController@search')->name('mechanic.defectcard.search');

            Route::resource('defectcard-project', 'DefectCardProjectController', [
                'parameters' => ['defectcard-project' => 'defectcard']
            ]);

            Route::name('defectcard.')->group(function () {

                Route::prefix('defectcard')->group(function () {
                    Route::get('/{defectcard}/print', 'DefectCardController@print')->name('print');
                });

            });

            Route::post('defectcard/{DefectCard}/add-helper', 'DefectCardEngineerController@add_helper')->name('defectcard.add_helper');
            Route::delete('defectcard/{DefectCard}/remove-helper/{helper}', 'DefectCardEngineerController@remove_helper')->name('defectcard.remove_helper');

        });

    });

});
