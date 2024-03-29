<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** ITEM */

        Route::namespace('Item')->group(function () {

            Route::resource('item', 'ItemController');
            Route::resource('tool', 'ToolController');

            Route::name('item.')->group(function () {

                Route::prefix('item')->group(function () {

                    /** Price List */
                    // Route::resource('/{item}/prices', 'ItemPriceController');
                    Route::put('/{item}/prices', 'ItemPriceController@update')->name('price.update');
                    Route::get('/{item}/prices/edit', 'ItemPriceController@edit')->name('price.edit');

                    /** Transaction: Unit */
                    Route::post('/{item}/unit', 'ItemUnitController@store')->name('unit.store');
                    Route::delete('/{item}/{unit}/unit', 'ItemUnitController@destroy')->name('unit.destroy');

                    /** Transaction: Storage */
                    Route::post('/{item}/storage', 'ItemStorageController@store')->name('storage.store');
                    Route::put('/{item}/storage', 'ItemStorageController@update')->name('storage.update');
                    Route::delete('/{item}/{storage}/storage', 'ItemStorageController@destroy')->name('storage.destroy');

                });

            });

        });

    });

});
