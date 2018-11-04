<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables'

    ], function () {

        Route::get('/item','ItemDatatablesController@index')->name('item.index');
        Route::get('/item-unit/{item}','ItemUnitDatatablesController@index')->name('item-unit.index');

    });

});
