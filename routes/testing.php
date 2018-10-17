<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/greeting/{name?}', function ($name = 'World') {
            return "Hello $name !";
        });

        Route::resource('/testing', 'Frontend\TestingController');
        Route::get('/metronic', 'Frontend\TestingController@metronic')->name('metronic');
        Route::post('/photo', 'Frontend\TestingController@photo')->name('photo');
        Route::post('/text', 'Frontend\TestingController@text')->name('text');
        Route::get('/view', 'Frontend\TestingController@view')->name('view');
        Route::view('/maps', 'frontend\testing\maps')->name('maps');
        Route::post('/testing-photos','Frontend\TestingController@postPhotos')->name('testing-photos');


        Route::get('/certified-staff/{id}', function ($id) {
            $employee = App\Models\Employee::with('licenses')->find($id);

            return $employee;
        });

    });

});
