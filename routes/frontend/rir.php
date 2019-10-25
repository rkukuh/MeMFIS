<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('ReceivingInspectionReport')->group(function () {

            Route::resource('receiving-inspection-report', 'ReceivingInspectionReportController');

        });

    });

});
