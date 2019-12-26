<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** INVENTORY IN */

        Route::namespace('InventoryIn')->group(function () {

            Route::resource('inventory-in', 'InventoryInController');

            Route::prefix('inventory-in')->group(function () {
                Route::post('/{inventoryIn}/item/{item}', 'ItemInventoryInController@store')->name('inventory-in.item.store');
                Route::put('/{inventoryIn}/item/{item}', 'ItemInventoryInController@update')->name('inventory-in.item.update');
                Route::delete('/{inventoryIn}/item/{item}', 'ItemInventoryInController@destroy')->name('inventory-in.item.destroy');
                Route::put('/{inventoryIn}/approve', 'InventoryInController@approve')->name('inventory-in.approve')->middleware('permission:scm_inventory-in_approve');
            });
        });
    });
});
