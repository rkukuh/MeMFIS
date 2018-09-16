<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/greeting/{name?}', function($name = 'World') {
            return "Hello $name !";
        });

        Route::view('/dashboard', 'frontend.dashboard');

    });

});
