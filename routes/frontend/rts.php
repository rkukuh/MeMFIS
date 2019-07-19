<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('ReleaseToService')->group(function () {

            Route::resource('rts', 'RTSController', [
                'parameters' => ['rts' => 'rts']
            ]);
            Route::resource('rts-progress', 'RTSProgressController', [
                'parameters' => ['rts' => 'rts']
            ]);

            Route::name('rts.')->group(function () {

                Route::prefix('rts')->group(function () {

                    Route::get('/{rts}/print', 'RTSController@print');
                    Route::get('/{project}/project', 'RTSProgressController@create')->name('project.create');
                    Route::post('/{project}/project', 'RTSProgressController@store')->name('project.store');

                });

            });

        });

    });

});
