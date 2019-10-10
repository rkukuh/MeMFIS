<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** INVENTORY IN */

        Route::namespace('InventoryIn')->group(function () {

            Route::resource('inventory-in', 'InventoryInController');
            Route::put('inventory-in/{inventoryIn}/approve', 'InventoryInController@approve')->name('inventory-in.approve');

        });
    });
});
