<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables',

    ], function () {

        /** INITIAL DATA */

        Route::get('/journal','JournalDatatables@index')->name('journal.index');


        /** MASTER */

        Route::get('/certification','CertificationDatatables@index')->name('certification.index');


        /** TRANSACTION */

        Route::get('/quotation','QuotationDatatables@index')->name('quotation.index');
        Route::get('/customer','CustomerDatatables@index')->name('customer.index');

        /** CUSTOMER */

        Route::name('taskcard.')->group(function () {

            Route::group([

                'prefix'    => 'customer',
                'namespace' => 'Customer'

            ], function () {

                Route::get('/','CustomerDatatables@index')->name('all');
                Route::get('/{customer}/address','AddressDatatables@index')->name('address.index');
                Route::get('/{customer}/fax','FaxDatatables@index')->name('fax.index');
                Route::get('/{customer}/email','EmailDatatables@index')->name('email.index');
                Route::get('/{customer}/phone','PhoneDatatables@index')->name('phone.index');
                Route::get('/{customer}/document','DecumentDatatables@index')->name('document.index');
                Route::get('/{customer}/website','WebsiteDatatables@index')->name('website.index');

            });

        });

        /** TASKCARD */

        Route::name('taskcard.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard',
                'namespace' => 'TaskCard'

            ], function () {

                Route::get('/','TaskCardDatatables@index')->name('all');
                Route::get('/item','TaskCardItemDatatables@index')->name('item.index');
                Route::get('/repeat','TaskCardMaintenanceCycleDatatables@repeat')->name('maintenance-cycle.repeat');
                Route::get('/threshold','TaskCardMaintenanceCycleDatatables@threshold')->name('maintenance-cycle.threshold');

            });

        });

        /** WORKPACKAGE */

        Route::name('workpackage.')->group(function () {

            Route::group([

                'prefix'    => 'workpackage',
                'namespace' => 'WorkPackage'

            ], function () {

                Route::get('/','WorkPackageDatatables@index')->name('all');
                Route::get('/{workpackage}/taskcard','TaskCardDatatables@index')->name('taskcard.index');

            });

        });

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

    });

});
