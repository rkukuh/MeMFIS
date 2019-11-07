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

            Route::name('purchase-request.')->group(function () {
                Route::prefix('purchase-request')->group(function () {
                    Route::put('/{purchaseRequest}/project/approve', 'ProjectPurchaseRequestController@approve')->name('project.approve')->middleware('permission:purchase-request-approve');
                    Route::put('/{purchaseRequest}/general/approve', 'GeneralPurchaseRequestController@approve')->name('general.approve')->middleware('permission:purchase-request-approve');
                    Route::post('/{purchaseRequest}/item/{item}', 'ItemPurchaseRequestController@store')->name('item.store');
                    Route::put('/{purchaseRequest}/general/item/{item}', 'ItemPurchaseRequestController@updateGeneral')->name('general.update');
                    Route::put('/{purchaseRequest}/project/item/{item}', 'ItemPurchaseRequestController@updateProject')->name('project.update');
                    Route::delete('/{purchaseRequest}/item/{item}', 'ItemPurchaseRequestController@destroy')->name('destroy');
                });
            });

        });

    });

});

