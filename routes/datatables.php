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


        /** EMPLOYEE  */

        Route::name('employee.')->group(function () {
            Route::group(['prefix' => 'employee'], function () {

                Route::get('/history/{employee}','EmployeeHistoryDatatables@index')->name('history.index');
                Route::get('/travel-request/{employee}','TravelRequestDatatables@index')->name('travel-request.index');

            });
        });

    });

});
