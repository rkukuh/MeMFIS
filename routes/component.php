<?php

Route::name('component.')->group(function () {

    Route::get('update-button', function(){
        return View::make('frontend.common.buttons.update')->render();
    });

    Route::get('submit-button', function(){
        return View::make('frontend.common.buttons.submit')->render();
    });

    Route::get('get-category', 'FillComboxController@category')->name('get-category');
    Route::get('get-accountcode', 'FillComboxController@accountcode')->name('get-accountcode');

});
