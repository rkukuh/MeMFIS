<?php

Route::name('component.')->group(function () {

    Route::view('/update-button', 'frontend.common.buttons.update')->name('button-update');
    Route::view('/submit-button', 'frontend.common.buttons.submit')->name('button-submit');


    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend'

    ], function () {

    Route::get('/addres/city/{id}','AddresController@City')->name('city');
    Route::get('/addres/country','AddresController@Country')->name('country');

    Route::get('get-units', 'FillComboxController@units')->name('get-units');
    Route::get('get-currencies', 'FillComboxController@currencies')->name('get-currencies');
    Route::get('get-storages-combobox', 'FillComboxController@storages')->name('get-storages');
    Route::get('get-categories-item', 'FillComboxController@categories')->name('get-categories');
    Route::get('get-accountcodes', 'FillComboxController@accountCodes')->name('get-accountcodes');
    Route::get('get-licenses/{id}', 'FillComboxController@licenses')->name('get-licenses');
    Route::get('get-employees-data', 'FillComboxController@employees')->name('get-employees-data');
    Route::get('get-aviation-degree', 'FillComboxController@aviationDegrees')->name('get-eaviation-degree');
    Route::get('get-gnrl-license/{id}', 'FillComboxController@generalLicenses')->name('get-gnrl-license');
    Route::get('get-account-codes', 'AccountCodeController@getJournals')->name('get-account-codes');
    Route::get('get-tags', 'FillComboxController@tags')->name('get-tags');

    });
});

