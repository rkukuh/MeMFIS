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

                Route::get('/','ItemDatatables@index')->name('all');
                Route::get('/{item}/unit','ItemUnitDatatables@index')->name('unit.index');
                Route::get('/{item}/storage','ItemStorageDatatables@index')->name('storage.index');

            });
        });


        /** EMPLOYEE  */

        Route::name('employee.')->group(function () {
            Route::group(['prefix' => 'employee'], function () {

                Route::get('/history/{employee}','EmployeeHistoryDatatables@index')->name('history.index');
                Route::get('/travel-request/{employee}','TravelRequestDatatables@index')->name('travel-request.index');

            });
        });

        Route::get('/taskcard','TaskcardDatatables@index')->name('taskcard.index');

    });

});
