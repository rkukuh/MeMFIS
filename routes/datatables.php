<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables'

    ], function () {

        Route::get('/item','ItemDatatables@index')->name('item.index');
        Route::get('/item-unit/{item}','ItemUnitDatatables@index')->name('item-unit.index');
        Route::get('/item-storage/{item}','ItemStorageDatatables@index')->name('item-storage.index');

        Route::get('/travel-request/{employee}','TravelRequestDatatables@index')->name('employee-travel-request.index');

        Route::get('/taskcard','TaskcardDatatables@index')->name('taskcard.index');

    });

});
