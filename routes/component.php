<?php

Route::name('component.')->group(function () {

    Route::get('/update-button', function(){
        return view('frontend.common.buttons.update');
    });

    Route::get('/submit-button', function(){
        return view('frontend.common.buttons.submit');
    });

    Route::get('get-category', 'FillComboxController@category')->name('get-category');
    Route::get('get-accountcode', 'FillComboxController@accountcode')->name('get-accountcode');

});
