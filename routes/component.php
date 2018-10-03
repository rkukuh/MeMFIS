<?php

Route::name('component.')->group(function () {

    Route::get('/update-button', function(){
        return view('frontend.common.buttons.update');
    })->name('button-update');

    Route::get('/submit-button', function(){
        return view('frontend.common.buttons.submit');
    })->name('button-submit');

    Route::get('get-category', 'FillComboxController@category')->name('get-category');
    Route::get('get-accountcode', 'FillComboxController@accountcode')->name('get-accountcode');

});
