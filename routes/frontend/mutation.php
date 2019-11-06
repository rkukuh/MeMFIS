<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** MUTATION */

        Route::namespace('Mutation')->group(function () {
            
            Route::resource('material-transfer', 'MutationController');

            Route::prefix('material-transfer')->group(function () {
                Route::post('/{mutation}/item/{item}', 'ItemMutationController@store');
                Route::put('/{mutation}/item/{item}', 'ItemMutationController@update');
                Route::delete('/{mutation}/item/{item}', 'ItemMutationController@destroy');
                Route::put('/{mutation}/approve', 'MutationController@approve');
            });

        });
        
    });

});
