<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RII RELEASE */

        Route::namespace('RIIRelease')->group(function () {

            Route::name('riirelease-jobcard.')->group(function () {

                Route::prefix('riirelease-jobcard')->group(function () {

                    Route::resource('/', 'RIIReleaseJobCardController',
                    [
                        'parameters' => ['' => 'riirelease']
                    ]);

                });

            });

            Route::name('riirelease-defectcard.')->group(function () {

                Route::prefix('riirelease-defectcard')->group(function () {

                    Route::resource('/', 'RIIReleaseDefectCardController', [
                        'parameters' => ['' => 'riirelease']
                    ]);

                });

            });

            Route::name('riirelease-htcrr.')->group(function () {

                Route::prefix('riirelease-htcrr')->group(function () {

                    Route::resource('/', 'RIIReleaseHtCrrController', [
                        'parameters' => ['' => 'riirelease']
                    ]);

                });

            });

        });

    });

});
