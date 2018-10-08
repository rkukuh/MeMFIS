<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/greeting/{name?}', function($name = 'World') {
            return "Hello $name !";
        });

        Route::resource('/testing', 'Frontend\TestingController');
        Route::get('/metronic', 'Frontend\TestingController@metronic')->name('metronic');
        Route::view('/maps', 'frontend\testing\maps')->name('maps');


    });

});
