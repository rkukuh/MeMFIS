<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RII (Receiving Inspection Report) */

        Route::namespace('ReceivingInspectionReport')->group(function () {

            Route::resource('receiving-inspection-report', 'ReceivingInspectionController');

        });

        /** RII RELEASE */

        Route::namespace('RIIRelease')->group(function () {

            Route::name('riirelease-jobcard.')->group(function () {

                Route::prefix('riirelease-jobcard')->group(function () {

                    Route::resource('rii-release', 'RIIReleaseJobCardController', [
                        'parameters' => ['rii-release' => 'riirelease']
                    ]);
                    
                });

            });

            Route::name('riirelease-defectcard.')->group(function () {

                Route::prefix('riirelease-defectcard')->group(function () {

                    Route::resource('rii-release', 'RIIReleaseDefectCardController', [
                        'parameters' => ['rii-release' => 'riirelease']
                    ]);

                });

            });

        });

    });

});