<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('TaskRelease')->group(function () {

            Route::name('taskrelease-jobcard.')->group(function () {

                Route::prefix('taskrelease-jobcard')->group(function () {

                    Route::resource('task-release', 'TaskReleaseJobCardController', [
                        'parameters' => ['task-release' => 'taskrelease']
                    ]);

                });

            });

            Route::name('taskrelease-defectcard.')->group(function () {

                Route::prefix('taskrelease-defectcard')->group(function () {

                    Route::resource('task-release', 'TaskReleaseDefectCardController', [
                        'parameters' => ['task-release' => 'taskrelease']
                    ]);

                });
                
            });

        });

    });

});