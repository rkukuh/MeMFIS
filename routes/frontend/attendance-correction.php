<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('AttendanceCorrection')->group(function () {

            Route::resource('attendance-correction', 'AttendanceCorrectionController');

            Route::name('attendance-correction.')->group(function () {
                Route::prefix('attendance-correction')->group(function () {

                    Route::view('/approve', 'AttendanceCorrectionController@approval')->name('attendance-correction.approve');

                    /** API */
                    // Route::get('/{employee}/date/{date}', 'AttendanceCorrectionController@getAttendance')->name('get.attendance');

                });
            });

        });

    });

});