<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/greeting/{name?}', function ($name = 'World') {
            return "Hello $name !";
        });

        // Route::resource('/testing', 'Frontend\TestingController');
        // Route::view('/maps', 'Frontend\testing\maps')->name('maps');
        // Route::get('/view', 'Frontend\TestingController@view')->name('view');
        // Route::get('/blank', 'Frontend\TestingController@blank')->name('blank');
        // Route::post('/text', 'Frontend\TestingController@text')->name('text');
        // Route::post('/photo', 'Frontend\TestingController@photo')->name('photo');
        // Route::get('/metronic', 'Frontend\TestingController@metronic')->name('metronic');
        // Route::post('/testing-photos','Frontend\TestingController@postPhotos')->name('testing-photos');

    });

});
