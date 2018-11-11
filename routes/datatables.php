<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables',

    ], function () {

        /** INITIAL DATA */

        Route::get('/journal','JournalDatatables@index')->name('journal.index');


        /** ITEM */

        Route::name('item.')->group(function () {

            Route::group([

                'prefix'    => 'item',
                'namespace' => 'Item'

            ], function () {

                Route::get('/','ItemDatatables@index')->name('all');
                Route::get('/{item}/units','ItemUnitDatatables@index')->name('units.index');
                Route::get('/{item}/storages','ItemStorageDatatables@index')->name('storages.index');

            });
        });


        /** EMPLOYEE  */

        Route::name('employee.')->group(function () {

            Route::group([

                'prefix'    => 'employee',
                'namespace' => 'Employee'

            ], function () {

                Route::get('/','EmployeeDatatables@index')->name('all');
                Route::get('/{employee}/histories','EmployeeHistoryDatatables@index')->name('histories.index');
                Route::get('/{employee}/documents','EmployeeDocumentDatatables@index')->name('documents.index');
                Route::get('/{employee}/travel-requests','EmployeeTravelRequestDatatables@index')->name('travel-requests.index');

                // License

                Route::get('/{employee}/amels','EmployeeAMELDatatables@index')->name('amels.index');

            });
        });

        Route::get('/taskcard','TaskcardDatatables@index')->name('taskcard.index');

    });

});
