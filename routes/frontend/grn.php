<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('GoodsReceived')->group(function () {

            Route::resource('goods-received', 'GoodsReceivedController');
            Route::put('goods-received/{goodsReceived}/approve', 'GoodsReceivedController@approve')->name('goods-received.approve')->middleware('permission:grn-approve');

            Route::name('goods-received.')->group(function () {
                Route::prefix('goods-received')->group(function () {
                    Route::post('/{goodsReceived}/item/{item}', 'ItemGoodsReceivedController@store')->name('item.store');
                    Route::put('/{goodsReceived}/item/{item}', 'ItemGoodsReceivedController@update')->name('item.update');
                    Route::delete('/{goodsReceived}/item/{item}', 'ItemGoodsReceivedController@destroy')->name('item.destroy');
                });
            });

        });

    });

});
