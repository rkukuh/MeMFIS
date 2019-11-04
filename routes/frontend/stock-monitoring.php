<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('StockMonitoring')->group(function () {
            Route::resource('stock-monitoring', 'StockMonitoringController');

        });
    });

});
