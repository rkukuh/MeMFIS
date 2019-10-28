<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** RIR (Receiving Inspection Report) */

        Route::namespace('GroundSupportEquiptment')->group(function () {

            Route::resource('gse', 'GSEController')->except('create','show','edit');

            Route::get('gse/{type}', 'GSEController@create')->name('gse.create');
            Route::get('gse/{gse}/{type}', 'GSEController@show')->name('gse.show');
            Route::get('gse/{gse}/edit/{type}', 'GSEController@edit')->name('gse.edit');

            Route::name('gse.')->group(function () {
                Route::prefix('gse')->group(function () {
                    Route::post('/{gse}/item/{item}', 'ItemGSEController@store')->name('item.store');
                    Route::put('/{gse}/item/{item}', 'ItemGSEController@update')->name('item.update');
                    Route::delete('/{gse}/item/{item}', 'ItemGSEController@destroy')->name('item.destroy');
                });
            });
        });

    });

});
