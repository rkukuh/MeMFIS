<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Workshop')->group(function () {

            Route::resource('quotation-workshop', 'WorkshopController')->except('edit');
            Route::get('quotation-workshop/{quotation}/edit', 'WorkshopController@edit')->name('quotation-workshop.edit');

            Route::prefix('quotation-workshop')->group(function() {

            });
            // Route::name('quotation-workshop.')->group(function () {
            //     Route::view('/quotation-workshop', 'frontend.quotation-workshop.index')->name('index');
            //     Route::view('/quotation-workshop/create', 'frontend.quotation-workshop.create')->name('create');
            //     Route::view('/quotation-workshop/edit', 'frontend.quotation-workshop.edit')->name('edit');
            //     Route::view('/quotation-workshop/show', 'frontend.quotation-workshop.show')->name('show');

            Route::name('quotation-workshop.')->group(function() {
                Route::view('/quotation-workshop/{quotation}/item/create', 'frontend.quotation-workshop.item.create')->name('item.create');
                Route::view('/quotation-workshop/{quotation}/item/show', 'frontend.quotation-workshop.item.show')->name('item.show');
            });
            // });

        });

    });

});