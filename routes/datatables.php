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

        Route::get('/vendor','VendorDatatables@index')->name('vendor.index');
        Route::get('/storage','StorageDatatables@index')->name('storage.index');
        Route::get('/storage/modal','StorageDatatables@storageModal')->name('storage.modal');
        Route::get('/aircraft','AircraftDatatables@index')->name('aircraft.index');
        Route::get('/language','LanguageDatatables@index')->name('language.index');
        Route::get('/currency','CurrencyDatatables@index')->name('currency.index');
        Route::get('/manufacturer','ManufacturerDatatables@index')->name('manufacturer.index');
        Route::get('/certification','CertificationDatatables@index')->name('certification.index');

        /** LICENSE */

        Route::get('/general-license','GeneralLicenseDatatables@index')->name('general-license.index');

        /** TRANSACTION */

        Route::get('/price-list','PriceListDatatables@index')->name('price-list.index');

        /** AIRCRAFT */

        Route::name('aircraft.')->group(function () {

            Route::group([

                'prefix'    => 'aircraft',
                'namespace' => 'Aircraft'

            ], function () {

                /** Master Data */
                Route::get('/','AircraftDatatables@index')->name('all');

                /** Polymorph */
                Route::get('/{aircraft}/zones','AircraftZonesDatatables@index')->name('zones.index');
                Route::get('/{aircraft}/accesses','AircraftAccessesDatatables@index')->name('accesses.index');

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

        /** GOODS RECEIVED NOTE */

        Route::name('goods-received.')->group(function () {

            Route::group([

                'prefix'    => 'goods-received',
                'namespace' => 'GoodsReceived'

            ], function () {

                Route::get('/','GoodsReceivedDatatables@index')->name('all');

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
                Route::get('/modal', 'ItemDatatables@indexModal')->name('modal.index');
                Route::get('/categories','CategoryItemDatatables@index')->name('categories.index');

                /** Transaction */
                Route::get('/{item}/units','ItemUnitDatatables@index')->name('units.index');
                Route::get('/{item}/storages','ItemStorageDatatables@index')->name('storages.index');

            });

        });

        /** PROJECT */

        Route::name('project.')->group(function () {

            Route::group([

                'prefix'    => 'project',
                'namespace' => 'Project'

            ], function () {

                Route::get('/','ProjectDatatables@index')->name('all');

            });

        });

        /** PURCHASE ORDER */

        Route::name('purchase-order.')->group(function () {

            Route::group([

                'prefix'    => 'purchase-order',
                'namespace' => 'PurchaseOrder'

            ], function () {

                Route::get('/','PurchaseOrderDatatables@index')->name('all');

            });

        });

        /** PURCHASE REQUEST */

        Route::name('purchase-request.')->group(function () {

            Route::group([

                'prefix'    => 'purchase-request',
                'namespace' => 'PurchaseRequest'

            ], function () {

                Route::get('/','PurchaseRequestDatatables@index')->name('all');
                Route::get('/modal', 'PurchaseRequestDatatables@purchaseRequestModal')->name('modal.index');

            });

        });

        /** QUOTATION */

        Route::name('quotation.')->group(function () {

            Route::group([

                'prefix'    => 'quotation',
                'namespace' => 'Quotation'

            ], function () {

                Route::get('/','QuotationDatatables@index')->name('all');

            });

        });

        /** TASK CARD: All */

        Route::name('taskcard.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/','TaskCardDatatables@index')->name('all');

            });

        });

        /** TASK CARD: Routine */

        Route::name('taskcard-routine.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-routine',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/','TaskCardRoutineDatatables@index')->name('all');
                Route::get('/basic/modal','TaskCardRoutineDatatables@basicModal')->name('basic.modal');
                Route::get('/sip/modal','TaskCardRoutineDatatables@sipModal')->name('sip.modal');
                Route::get('/cpcp/modal','TaskCardRoutineDatatables@cpcpModal')->name('cpcp.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools','TaskCardRoutineItemsDatatables@tool')->name('tools.index');
                Route::get('/{taskcard}/materials','TaskCardRoutineItemsDatatables@material')->name('materials.index');
                Route::get('/{taskcard}/aircrafts','TaskCardRoutineAircraftsDatatables@index')->name('aircrafts.index');
                Route::get('/{taskcard}/repeats','TaskCardRoutineMaintenanceCycleDatatables@repeat')->name('maintenance-cycle.repeats');
                Route::get('/{taskcard}/thresholds','TaskCardRoutineMaintenanceCycleDatatables@threshold')->name('maintenance-cycle.thresholds');

            });

        });

        /** TASK CARD: EO */

        Route::name('taskcard-eo.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-eo',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/','TaskCardEODatatables@index')->name('all');
                Route::get('/adsb/modal','TaskCardEODatatables@adsbModal')->name('adsb.modal');
                Route::get('/cmrawl/modal','TaskCardEODatatables@cmrawlModal')->name('cmrawl.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools','TaskCardEOItemsDatatables@index')->name('tools.index');
                Route::get('/{taskcard}/materials','TaskCardEOItemsDatatables@index')->name('materials.index');
                Route::get('/{taskcard}/aircrafts','TaskCardEOAircraftsDatatables@index')->name('aircrafts.index');
                Route::get('/{taskcard}/eo-instructions','EOInstructionsDatatables@index')->name('eo-instructions.index');

            });

        });

        /** TASK CARD: SI */

        Route::name('taskcard-si.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-si',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/','TaskCardSIDatatables@index')->name('all');
                Route::get('/si/modal','TaskCardSIDatatables@siModal')->name('si.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools','TaskCardSIItemsDatatables@index')->name('tools.index');
                Route::get('/{taskcard}/materials','TaskCardSIItemsDatatables@index')->name('materials.index');
                Route::get('/{taskcard}/aircrafts','TaskCardSIAircraftsDatatables@index')->name('aircrafts.index');

            });

        });

        /** WORKPACKAGE */

        Route::name('workpackage.')->group(function () {

            Route::group([

                'prefix'    => 'workpackage',
                'namespace' => 'WorkPackage'

            ], function () {

                Route::get('/','WorkPackageDatatables@index')->name('all');

            });

        });

    });

});
