<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('ReceivingInspectionReport')->group(function () {

            Route::resource('receiving-inspection-report', 'ReceivingInspectionReportController');
            Route::put('receiving-inspection-report/{ReceivingInspectionReport}/approve', 'ReceivingInspectionReportController@approve')->name('receiving-inspection-report.approve');


            Route::name('receiving-inspection-report.')->group(function () {
                Route::prefix('receiving-inspection-report')->group(function () {
                    Route::post('/{ReceivingInspectionReport}/item/{item}', 'ItemReceivingInspectionReportController@store')->name('item.store');
                    Route::put('/{ReceivingInspectionReport}/item/{item}', 'ItemReceivingInspectionReportController@update')->name('item.update');
                    Route::delete('/{ReceivingInspectionReport}/item/{item}', 'ItemReceivingInspectionReportController@destroy')->name('item.destroy');
                });
            });

        });

    });

});
