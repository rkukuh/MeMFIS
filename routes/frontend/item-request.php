<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () { 

        /** ITEM REQUEST */

        Route::namespace('ItemRequest')->group(function () {

            Route::prefix('item-request')->group(function () {
                
                /** Material Request */

                Route::resource('material-request-jobcard', 'MaterialRequestController', [
                    'parameters' => ['material-request-jobcard' => 'itemRequest']
                ]);

                Route::prefix('material-request-jobcard')->group(function () {

                    Route::name('material-request-jobcard.')->group(function() {

                        Route::put('/{itemRequest}/item/{item}', 'MaterialRequestController@updateItem')->name('items.update');
                        Route::delete('/{itemRequest}/item/{item}', 'MaterialRequestController@deleteItem')->name('items.destroy');
                        Route::put('/{itemRequest}/approve', 'MaterialRequestController@approve')->name('approve');

                    });

                });

                /** Tool Request */

                Route::resource('tool-request-jobcard', 'ToolRequestController', [
                    'parameters' => ['tool-request-jobcard' => 'itemRequest']
                ]);

                Route::prefix('tool-request-jobcard')->group(function () {

                    Route::put('/{itemRequest}/item/{item}', 'ToolRequestController@updateItem')->name('items.update');
                    Route::delete('/{itemRequest}/item/{item}', 'ToolRequestController@deleteItem')->name('items.destroy');
                    Route::put('/{itemRequest}/approve', 'ToolRequestController@approve')->name('approve');
                });
            });
        });
    });
});