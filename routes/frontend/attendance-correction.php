<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('AttendanceCorrection')->group(function () {

            Route::resource('attendance-correction', 'AttendanceCorrectionController', [
                'parameters' => ['attendance-correction' => 'attcor']
            ]);

            Route::name('attendance-correction.')->group(function () {
                Route::prefix('attendance-correction')->group(function () {

                    Route::post('/{attcor}/approve', 'AttendanceCorrectionController@approval')->name('attendance-correction.approve');
                    Route::post('/{attcor}/reject', 'AttendanceCorrectionController@rejection')->name('attendance-correction.reject');

                    /** API */
                    // Route::get('/{employee}/date/{date}', 'AttendanceCorrectionController@getAttendance')->name('get.attendance');

                });
            });

        });

    });

});