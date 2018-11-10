<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables'

    ], function () {

        /** ITEM */

        Route::name('item.')->group(function () {
            Route::group([

                'prefix'    => 'item',
                'namespace' => 'Item'

            ], function () {

                Route::get('/','ItemDatatables@index')->name('index');
                Route::get('/unit/{item}','ItemUnitDatatables@index')->name('unit.index');
                Route::get('/storage/{item}','ItemStorageDatatables@index')->name('storage.index');

            });
        });


        /** EMPLOYEE  */

        Route::name('employee.')->group(function () {
            Route::group(['prefix' => 'employee'], function () {

                Route::get('/history/{employee}','EmployeeHistoryDatatables@index')->name('history.index');
                Route::get('/travel-request/{employee}','TravelRequestDatatables@index')->name('travel-request.index');

            });
        });

    });

});
