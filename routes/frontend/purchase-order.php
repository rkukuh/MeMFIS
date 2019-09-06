<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('PurchaseOrder')->group(function () {

            Route::resource('purchase-order', 'PurchaseOrderController');

            Route::put('purchase-order/{purchaseOrder}/approve', 'PurchaseOrderController@approve')->name('purchase-order.approve');

            Route::name('purchase-order.')->group(function () {
                Route::prefix('purchase-order')->group(function () {
                    Route::get('/{purchaseOrder}/item/{item}/edit', 'ItemPurchaseOrderController@edit')->name('edit');
                    Route::put('/{purchaseOrder}/item/{item}', 'ItemPurchaseOrderController@update')->name('update');
                    Route::delete('/{purchaseOrder}/item/{item}', 'ItemPurchaseOrderController@destroy')->name('destroy');
                });
            });

        });

    });

});
