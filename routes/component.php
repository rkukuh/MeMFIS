<?php

Route::name('component.')->group(function () {

    Route::view('/update-button', 'frontend.common.buttons.update')->name('button-update');
    Route::view('/submit-button', 'frontend.common.buttons.submit')->name('button-submit');

    Route::get('get-categories', 'Frontend\FillComboxController@categories')->name('get-categories');
    Route::get('get-accountcodes', 'Frontend\FillComboxController@accountCodes')->name('get-accountcodes');    
    Route::get('get-units', 'Frontend\FillComboxController@units')->name('get-units');    
    Route::get('get-currencies', 'Frontend\FillComboxController@currencies')->name('get-currencies');    
    Route::get('get-storages-combobox', 'Frontend\FillComboxController@storages')->name('get-storages');    

});

