<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('PurchaseRequest')->group(function () {

            Route::resource('purchase-request', 'PurchaseRequestController');

            Route::put('purchase-request/{purchaseRequest}/approve', 'PurchaseRequestController@approve')->name('purchase-request.approve');
            Route::post('purchase-request/{purchaseRequest}/item/{item}', 'PurchaseRequestController@add_item')->name('purchase-request.add-item');

            Route::name('purchase-request.')->group(function () {

                //
                
            });

        });

    });

});