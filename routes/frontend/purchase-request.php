<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('PurchaseRequest')->group(function () {

            Route::resource('purchase-request-general', 'GeneralPurchaseRequestController', [
                'parameters' => ['purchase-request-general' => 'purchaseRequest']
            ]);

            Route::resource('purchase-request-project', 'ProjectPurchaseRequestController', [
                'parameters' => ['purchase-request-project' => 'purchaseRequest']
            ]);

            Route::put('purchase-request/{purchaseRequest}/project/approve', 'ProjectPurchaseRequestController@approve')->name('purchase-request.approve');
            Route::put('purchase-request/{purchaseRequest}/general/approve', 'GeneralPurchaseRequestController@approve')->name('purchase-request.approve');
            Route::post('purchase-request/genaral/{purchaseRequest}/item/{item}', 'GeneralPurchaseRequestController@add_item')->name('purchase-request.add-item');

            Route::name('purchase-request.')->group(function () {

                //

            });

        });

    });

});

