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

            Route::group([

                'prefix'    => 'employee',
                'namespace' => 'Employee'

            ], function () {

                Route::get('/{employee}/history','EmployeeHistoryDatatables@index')->name('history.index');
                Route::get('/{employee}/travel-request','EmployeeTravelRequestDatatables@index')->name('travel-request.index');

            });
        });

        Route::get('/taskcard','TaskcardDatatables@index')->name('taskcard.index');

    });

});
