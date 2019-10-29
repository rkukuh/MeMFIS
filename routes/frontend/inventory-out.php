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

                    Route::post('/tool/{inventoryOut}/item/{item}', 'ToolInventoryOutController@addItem')->name('tool.items.store');
                    Route::put('/tool/{inventoryOut}/item/{item}', 'ToolInventoryOutController@updateItem')->name('tool.items.update');
                    Route::delete('/tool/{inventoryOut}/item/{item}', 'ToolInventoryOutController@deleteItem')->name('tool.items.destroy');
                    Route::put('/tool/{inventoryOut}/approve', 'ToolInventoryOutController@approve')->name('tool.approve');
                });

            });

            /** Material Request */

            Route::namespace('MaterialRequest')->group(function () {

                Route::get('/material-request-jobcard', 'MaterialRequestController@index')->name('material-request-jobcard.index');
                Route::get('/material-request-jobcard/create', 'MaterialRequestController@create')->name('material-request-jobcard.create');
                Route::get('/material-request-jobcard/edit', 'MaterialRequestController@edit')->name('material-request-jobcard.edit');
                Route::get('/material-request-jobcard/show', 'MaterialRequestController@show')->name('material-request-jobcard.show');
            });

            /** Tool Request */

            Route::namespace('ToolRequest')->group(function () {

                Route::get('/tool-request-jobcard', 'ToolRequestController@index')->name('tool-request-jobcard.index');
                Route::get('/tool-request-jobcard/create', 'ToolRequestController@create')->name('tool-request-jobcard.create');
                Route::get('/tool-request-jobcard/edit', 'ToolRequestController@edit')->name('tool-request-jobcard.edit');
                Route::get('/tool-request-jobcard/show', 'ToolRequestController@show')->name('tool-request-jobcard.show');
            });
        });
    });
});
