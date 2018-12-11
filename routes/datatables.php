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

        Route::get('/unit','UnitDatatables@index')->name('unit.index');
        Route::get('/bank','BankDatatables@index')->name('bank.index');
        Route::get('/storage','StorageDatatables@index')->name('storage.index');
        Route::get('/aircraft','AircraftDatatables@index')->name('aircraft.index');
        Route::get('/currency','CurrencyDatatables@index')->name('currency.index');
        Route::get('/language','LanguageDatatables@index')->name('language.index');
        Route::get('/manufacturer','ManufacturerDatatables@index')->name('manufacturer.index');
        Route::get('/certification','CertificationDatatables@index')->name('certification.index');
        Route::get('/general-license','GeneralLicenseDatatables@index')->name('general-license.index');

        /** TRANSACTION */

        Route::get('/customer','CustomerDatatables@index')->name('customer.index');
        Route::get('/quotation','QuotationDatatables@index')->name('quotation.index');

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

        /** CUSTOMER */

        Route::name('customer.')->group(function () {

            Route::group([

                'prefix'    => 'customer',
                'namespace' => 'Customer'

            ], function () {

                Route::get('/','CustomerDatatables@index')->name('all');
                Route::get('/{customer}/fax','FaxDatatables@index')->name('fax.index');
                Route::get('/{customer}/email','EmailDatatables@index')->name('email.index');
                Route::get('/{customer}/phone','PhoneDatatables@index')->name('phone.index');
                Route::get('/{customer}/website','WebsiteDatatables@index')->name('website.index');
                Route::get('/{customer}/address','AddressDatatables@index')->name('address.index');
                Route::get('/{customer}/document','DecumentDatatables@index')->name('document.index');

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

    });

});
