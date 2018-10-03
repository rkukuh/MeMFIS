<?php

Route::get('update-button', function(){
    return View::make('frontend.common.buttons.update')
    ->render();

});

Route::get('submit-button', function(){
    return View::make('frontend.common.buttons.submit')
    ->render();

});

Route::get('get-accountcode', 'FillComboxController@accountcode')->name('get-accountcode');
Route::get('get-category', 'FillComboxController@category')->name('get-category');
