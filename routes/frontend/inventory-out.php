<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** INVENTORY OUT */

        Route::namespace('InventoryOut')->group(function () {

            Route::prefix('inventory-out')->group(function () {

                Route::name('inventory-out-')->group(function () {
                    Route::resource('tool', 'ToolInventoryOutController');
                    Route::resource('material', 'MaterialInventoryOutController');
                });

            });
        });
    });
});
