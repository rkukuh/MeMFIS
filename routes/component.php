<?php

Route::name('component.')->group(function () {

    Route::view('/update-button', 'frontend.common.buttons.update')->name('button-update');
    Route::view('/submit-button', 'frontend.common.buttons.submit')->name('button-submit');

    Route::get('get-category', 'FillComboxController@category')->name('get-category');
    Route::get('get-accountcode', 'FillComboxController@accountcode')->name('get-accountcode');

});
