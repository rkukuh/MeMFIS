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

                    Route::post('/{leave}/approve', 'leaveController@approve')->name('leave.approve');
                    Route::post('/{leave}/reject', 'leaveController@reject')->name('leave.reject');

                    /** API */
                    Route::get('/{leave}/api', 'leaveController@leaveModal')->name('leave.leaveModal');
                    // Route::get('/{employee}/date/{date}', 'leaveController@getAttendance')->name('get.attendance');

                });
            });

        });

    });

});