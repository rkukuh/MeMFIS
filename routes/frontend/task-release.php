<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('TaskRelease')->group(function () {

            Route::name('taskrelease-jobcard.')->group(function () {

                Route::prefix('taskrelease-jobcard')->group(function () {

                    Route::resource('/', 'TaskReleaseJobCardController', [
                        'parameters' => ['' => 'taskrelease']
                    ]);

                });

            });

            Route::name('taskrelease-defectcard.')->group(function () {

                Route::prefix('taskrelease-defectcard')->group(function () {

                    Route::resource('', 'TaskReleaseDefectCardController', [
                        'parameters' => ['' => 'taskrelease']
                    ]);

                });

            });

            Route::name('taskrelease-htcrr.')->group(function () {

                Route::prefix('taskrelease-htcrr')->group(function () {

                    Route::resource('', 'TaskReleaseHtCrrController', [
                        'parameters' => ['' => 'taskrelease']
                    ]);

                });

            });

        });

    });

});
