<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Overtime')->group(function () {

            Route::resource('overtime', 'OvertimeController');

            Route::name('overtime.')->group(function () {
                Route::prefix('overtime')->group(function () {

                    /** API */
                    Route::get('/{employee}/date/{date}', 'OvertimeController@getAttendance')->name('get.attendance');
                    Route::POST('/{overtime}/approve', 'OvertimeController@approve')->name('approve');
                    Route::POST('/{overtime}/reject', 'OvertimeController@reject')->name('reject');

                });
            });

        });

    });

});