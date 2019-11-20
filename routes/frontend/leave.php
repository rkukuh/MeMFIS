<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Leave')->group(function () {

            Route::resource('leave', 'leaveController');

            Route::name('leave.')->group(function () {
                Route::prefix('leave')->group(function () {

                    Route::view('/approve', 'leaveController@approval')->name('leave.approve');

                    /** API */
                    // Route::get('/{employee}/date/{date}', 'leaveController@getAttendance')->name('get.attendance');

                });
            });

        });

    });

});