<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** INVENTORY IN */

        Route::namespace('InventoryIn')->group(function () {

            Route::resource('inventory-in', 'InventoryInController');

        });
    }); 
});