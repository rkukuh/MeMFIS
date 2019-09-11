<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('GoodsReceived')->group(function () {

            Route::resource('goods-received', 'GoodsReceivedController');
            Route::put('goods-received/{goodsReceived}/approve', 'GoodsReceivedController@approve')->name('goods-received.approve');

            Route::name('goods-received.')->group(function () {
                Route::prefix('goods-received')->group(function () {
                    Route::put('/{goodsReceived}/item/{item}', 'ItemGoodsReceivedController@update')->name('item.update');
                    Route::delete('/{goodsReceived}/item/{item}', 'ItemGoodsReceivedController@destroy')->name('item.destroy');
                });
            });

        });

    });

});
