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
                //
            });

        });

    });

});