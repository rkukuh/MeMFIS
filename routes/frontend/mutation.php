<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** MUTATION */

        Route::namespace('Mutation')->group(function () {
            
            Route::resource('material-transfer', 'MutationController');

        });
        // Route::view('/material-transfer', 'frontend.material-transfer.index')->name('material-transfer.index');
        // Route::view('/material-transfer/create', 'frontend.material-transfer.create')->name('material-transfer.create');
        // Route::view('/material-transfer/edit', 'frontend.material-transfer.edit')->name('material-transfer.edit');
        // Route::view('/material-transfer/show', 'frontend.material-transfer.show')->name('material-transfer.show');
    });

});
