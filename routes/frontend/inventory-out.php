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

                    /** MATERIAL */
                    Route::resource('material', 'MaterialInventoryOutController', [
                        'parameters' => ['material' => 'inventoryOut']
                    ]);

                    Route::post('/material/{inventoryOut}/item/{item}', 'MaterialInventoryOutController@addItem')->name('material.items.store');
                    Route::put('/material/{inventoryOut}/item/{item}', 'MaterialInventoryOutController@updateItem')->name('material.items.update');
                    Route::delete('/material/{inventoryOut}/item/{item}', 'MaterialInventoryOutController@deleteItem')->name('material.items.destroy');
                    Route::put('/material/{inventoryOut}/approve', 'MaterialInventoryOutController@approve')->name('material.approve');

                    /** TOOL */

                    Route::resource('tool', 'ToolInventoryOutController', [
                        'parameters' => ['tool' => 'inventoryOut']
                    ]);

                });

            });
        });
    });
});
