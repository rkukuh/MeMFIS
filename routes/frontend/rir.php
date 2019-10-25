<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('ReceivingInspectionReport')->group(function () {

            Route::resource('receiving-inspection-report', 'ReceivingInspectionReportController', [
                'parameters' => ['receiving-inspection-report' => 'receivingInspectionReport']
            ]);
            Route::put('receiving-inspection-report/{receivingInspectionReport}/approve', 'ReceivingInspectionReportController@approve')->name('receiving-inspection-report.approve');


            Route::name('receiving-inspection-report.')->group(function () {
                Route::prefix('receiving-inspection-report')->group(function () {
                    Route::post('/{receivingInspectionReport}/item/{item}', 'ItemReceivingInspectionReportController@store')->name('item.store');
                    Route::put('/{receivingInspectionReport}/item/{item}', 'ItemReceivingInspectionReportController@update')->name('item.update');
                    Route::delete('/{receivingInspectionReport}/item/{item}', 'ItemReceivingInspectionReportController@destroy')->name('item.destroy');
                });
            });

        });

    });

});
