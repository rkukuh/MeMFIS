<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables',

    ], function () {

        /** INITIAL DATA */

        Route::get('/unit','UnitDatatables@index')->name('unit.index');
        Route::get('/journal','JournalDatatables@index')->name('journal.index');

        /** POLYMORPH */
        // INFO: For every polymorph cases, create a grouped route for them

        /** MASTER */

        Route::get('/storage','StorageDatatables@index')->name('storage.index');
        Route::get('/aircraft','AircraftDatatables@index')->name('aircraft.index');
        Route::get('/language','LanguageDatatables@index')->name('language.index');
        Route::get('/supplier','SupplierDatatables@index')->name('supplier.index');
        Route::get('/currency','CurrencyDatatables@index')->name('currency.index');
        Route::get('/manufacturer','ManufacturerDatatables@index')->name('manufacturer.index');
        Route::get('/certification','CertificationDatatables@index')->name('certification.index');

        /** LICENSE */

        Route::get('/general-license','GeneralLicenseDatatables@index')->name('general-license.index');

        /** TRANSACTION */

        Route::get('/quotation','QuotationDatatables@index')->name('quotation.index');

        /** AIRCRAFT */

        Route::name('aircraft.')->group(function () {

            Route::group([

                'prefix'    => 'aircraft',
                'namespace' => 'Aircraft'

            ], function () {

                /** Master Data */
                Route::get('/','AircraftDatatables@index')->name('all');

                /** Polymorph */
                Route::get('/{aircraft}/accesses','AircraftAccessesDatatables@index')->name('accesses.index');

            });

        });

        /** ITEM */

        Route::name('item.')->group(function () {

            Route::group([

                'prefix'    => 'item',
                'namespace' => 'Item'

            ], function () {

                /** Master Data */
                Route::get('/','ItemDatatables@index')->name('all');
                Route::get('/categories','CategoryItemDatatables@index')->name('categories.index');

                /** Transaction */
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

                /** Master Data */
                Route::get('/','CustomerDatatables@index')->name('all');

                /** Polymorph */
                Route::get('/{customer}/faxes','CustomerFaxesDatatables@index')->name('faxes.index');
                Route::get('/{customer}/emails','CustomerEmailsDatatables@index')->name('emails.index');
                Route::get('/{customer}/phones','CustomerPhonesDatatables@index')->name('phones.index');
                Route::get('/{customer}/websites','CustomerWebsitesDatatables@index')->name('websites.index');
                Route::get('/{customer}/addresses','CustomerAddressesDatatables@index')->name('addresses.index');
                Route::get('/{customer}/documents','CustomerDocumentsDatatables@index')->name('documents.index');

            });

        });

        /** EMPLOYEE  */

        Route::name('employee.')->group(function () {

            Route::group([

                'prefix'    => 'employee',
                'namespace' => 'Employee'

            ], function () {

                /** Master Data */
                Route::get('/','EmployeeDatatables@index')->name('all');

                /** Polymorph */
                Route::get('/{customer}/faxes','EmployeeFaxesDatatables@index')->name('faxes.index');
                Route::get('/{customer}/emails','EmployeeEmailsDatatables@index')->name('emails.index');
                Route::get('/{customer}/phones','EmployeePhonesDatatables@index')->name('phones.index');
                Route::get('/{customer}/websites','EmployeeWebsitesDatatables@index')->name('websites.index');
                Route::get('/{customer}/addresses','EmployeeAddressesDatatables@index')->name('addresses.index');
                Route::get('/{customer}/documents','EmployeeDocumentsDatatables@index')->name('documents.index');

                /** Certifications and Licenses */
                Route::get('/{employee}/otr','EmployeeOTRDatatables@index')->name('otr.index');
                Route::get('/{employee}/amel','EmployeeAMELDatatables@index')->name('amel.index');

                /** Transaction */
                Route::get('/{employee}/histories','EmployeeHistoriesDatatables@index')->name('histories.index');
                Route::get('/{employee}/travel-requests','EmployeeTravelRequestsDatatables@index')->name('travel-requests.index');

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
