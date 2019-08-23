<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('WorkProgressReport')->group(function () {
            
            Route::resource('work-progress-report', 'WorkProgressReportController',  [
                'parameters' => ['work-progress-report' => 'project']
            ]);

            // Route::view('/work-progress-report', 'frontend.work-progress-report.index')->name('work-progress-report.index');
            // Route::view('/work-progress-report/show', 'frontend.work-progress-report.show')->name('work-progress-report.show');

        });

    });

});
