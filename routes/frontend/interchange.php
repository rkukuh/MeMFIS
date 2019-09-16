<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** INTERCHANGE */

        Route::namespace('Interchange')->group(function () {

            Route::resource('interchange', 'InterchangeController')->except('edit.put.destroy');
            Route::get('interchange/{item}/edit/{alternateItem}', 'InterchangeController@edit')->name('interchange.edit');
            Route::put('interchange/{item}/{alternateItem}', 'InterchangeController@update')->name('interchange.update');
            Route::delete('interchange/{item}/{alternateItem}', 'InterchangeController@destroy')->name('interchange.destroy');

        });

    });

});
