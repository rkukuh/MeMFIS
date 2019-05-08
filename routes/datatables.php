<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables',

    ], function () {

        /** INITIAL DATA */

        Route::get('/unit', 'UnitDatatables@index')->name('unit.index');
        Route::get('/journal', 'JournalDatatables@index')->name('journal.index');

        /** POLYMORPH */
        // For every polymorph cases, create a grouped route for them

        /** MASTER */

        Route::get('/vendor', 'VendorDatatables@index')->name('vendor.index');
        Route::get('/aircraft', 'AircraftDatatables@index')->name('aircraft.index');
        Route::get('/language', 'LanguageDatatables@index')->name('language.index');
        Route::get('/currency', 'CurrencyDatatables@index')->name('currency.index');
        Route::get('/storage', 'StorageDatatables@index')->name('storage.index');
        Route::get('/storage/modal', 'StorageDatatables@storageModal')->name('storage.modal');
        Route::get('/manufacturer', 'ManufacturerDatatables@index')->name('manufacturer.index');
        Route::get('/certification', 'CertificationDatatables@index')->name('certification.index');

        /** LICENSE */

        Route::get('/general-license', 'GeneralLicenseDatatables@index')->name('general-license.index');

        /** TRANSACTION */

        Route::get('/price-list', 'PriceListDatatables@index')->name('price-list.index');

        /** AIRCRAFT */

        Route::name('aircraft.')->group(function () {

            Route::group([

                'prefix'    => 'aircraft',
                'namespace' => 'Aircraft'

            ], function () {

                /** Master Data */
                Route::get('/', 'AircraftDatatables@index')->name('all');

                /** Polymorph */
                Route::get('/{aircraft}/zones', 'AircraftZonesDatatables@index')->name('zones.index');
                Route::get('/{aircraft}/accesses', 'AircraftAccessesDatatables@index')->name('accesses.index');
                Route::get('/{aircraft}/stations', 'AircraftStationsDatatables@index')->name('stations.index');

            });

        });

        /** CUSTOMER */

        Route::name('customer.')->group(function () {

            Route::group([

                'prefix'    => 'customer',
                'namespace' => 'Customer'

            ], function () {

                /** Master Data */
                Route::get('/', 'CustomerDatatables@index')->name('all');

                /** Polymorph */
                Route::get('/{customer}/faxes', 'CustomerFaxesDatatables@index')->name('faxes.index');
                Route::get('/{customer}/emails', 'CustomerEmailsDatatables@index')->name('emails.index');
                Route::get('/{customer}/phones', 'CustomerPhonesDatatables@index')->name('phones.index');
                Route::get('/{customer}/websites', 'CustomerWebsitesDatatables@index')->name('websites.index');
                Route::get('/{customer}/addresses', 'CustomerAddressesDatatables@index')->name('addresses.index');
                Route::get('/{customer}/documents', 'CustomerDocumentsDatatables@index')->name('documents.index');

            });

        });

        /** EMPLOYEE */

        Route::name('employee.')->group(function () {

            Route::group([

                'prefix'    => 'employee',
                'namespace' => 'Employee'

            ], function () {

                /** Master Data */
                Route::get('/', 'EmployeeDatatables@index')->name('all');

                /** Polymorph */
                Route::get('/{customer}/faxes', 'EmployeeFaxesDatatables@index')->name('faxes.index');
                Route::get('/{customer}/emails', 'EmployeeEmailsDatatables@index')->name('emails.index');
                Route::get('/{customer}/phones', 'EmployeePhonesDatatables@index')->name('phones.index');
                Route::get('/{customer}/websites', 'EmployeeWebsitesDatatables@index')->name('websites.index');
                Route::get('/{customer}/addresses', 'EmployeeAddressesDatatables@index')->name('addresses.index');
                Route::get('/{customer}/documents', 'EmployeeDocumentsDatatables@index')->name('documents.index');

                /** Certifications and Licenses */
                Route::get('/{employee}/otr', 'EmployeeOTRDatatables@index')->name('otr.index');
                Route::get('/{employee}/amel', 'EmployeeAMELDatatables@index')->name('amel.index');

                /** Transaction */
                Route::get('/{employee}/histories', 'EmployeeHistoriesDatatables@index')->name('histories.index');
                Route::get('/{employee}/travel-requests', 'EmployeeTravelRequestsDatatables@index')->name('travel-requests.index');

            });

        });

        /** GOODS RECEIVED NOTE */

        Route::name('goods-received.')->group(function () {

            Route::group([

                'prefix'    => 'goods-received',
                'namespace' => 'GoodsReceived'

            ], function () {

                Route::get('/', 'GoodsReceivedDatatables@index')->name('all');

            });

        });

        /** ITEM */

        Route::name('item.')->group(function () {

            Route::group([

                'prefix'    => 'item',
                'namespace' => 'Item'

            ], function () {

                /** Master Data */
                Route::get('/', 'ItemDatatables@index')->name('all');
                Route::get('/modal', 'ItemDatatables@indexModal')->name('modal.index');
                Route::get('/categories', 'CategoryItemDatatables@index')->name('categories.index');

                /** Transaction */
                Route::get('/{item}/units', 'ItemUnitDatatables@index')->name('units.index');
                Route::get('/{item}/prices', 'ItemPriceDatatables@index')->name('prices.index');
                Route::get('/{item}/storages', 'ItemStorageDatatables@index')->name('storages.index');
                Route::get('/{purchase_request}/purchase-request', 'ItemDatatables@purchaseRequest')->name('purchase-request');


            });

        });

        Route::name('tool.')->group(function () {

            Route::group([

                'prefix'    => 'tool',
                'namespace' => 'Item'

            ], function () {

                /** Master Data */
                Route::get('/', 'ToolDatatables@index')->name('all');
                Route::get('/modal', 'ToolDatatables@indexModal')->name('modal.index');

            });

        });

        /** PROJECT */

        Route::name('project.')->group(function () {

            Route::group([

                'prefix'    => 'project',
                'namespace' => 'Project'

            ], function () {

                Route::get('/', 'ProjectDatatables@index')->name('all');
                Route::get('/{project}/workpackage', 'ProjectDatatables@workpackage')->name('workpackage.project');

            });

        });

        /** PURCHASE ORDER */

        Route::name('purchase-order.')->group(function () {

            Route::group([

                'prefix'    => 'purchase-order',
                'namespace' => 'PurchaseOrder'

            ], function () {

                Route::get('/', 'PurchaseOrderDatatables@index')->name('all');
                Route::get('/modal', 'PurchaseOrderDatatables@purchaseOrderModal')->name('modal.index');


            });

        });

        /** PURCHASE REQUEST */

        Route::name('purchase-request.')->group(function () {

            Route::group([

                'prefix'    => 'purchase-request',
                'namespace' => 'PurchaseRequest'

            ], function () {

                Route::get('/', 'PurchaseRequestDatatables@index')->name('all');
                Route::get('/modal', 'PurchaseRequestDatatables@purchaseRequestModal')->name('modal.index');
                Route::get('/item/{purchaseRequest}', 'PurchaseRequestDatatables@pr_item')->name('pr.item');

            });

        });

        /** QUOTATION */

        Route::name('quotation.')->group(function () {

            Route::group([

                'prefix'    => 'quotation',
                'namespace' => 'Quotation'

            ], function () {

                Route::get('/', 'QuotationDatatables@index')->name('all');
                Route::get('/{quotation}/job-request', 'QuotationDatatables@jobRequest')->name('job-request');

            });

        });

        /** TASK CARD: All */

        Route::name('taskcard.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskCardDatatables@index')->name('all');

            });

        });

        /** TASK CARD: Routine */

        Route::name('taskcard-routine.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-routine',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskCardRoutineDatatables@index')->name('all');
                Route::get('/basic/modal', 'TaskCardRoutineDatatables@basicModal')->name('basic.modal');
                Route::get('/sip/modal', 'TaskCardRoutineDatatables@sipModal')->name('sip.modal');
                Route::get('/cpcp/modal', 'TaskCardRoutineDatatables@cpcpModal')->name('cpcp.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools', 'TaskCardRoutineItemsDatatables@tool')->name('tools.index');
                Route::get('/{taskcard}/materials', 'TaskCardRoutineItemsDatatables@material')->name('materials.index');
                Route::get('/{taskcard}/aircrafts', 'TaskCardRoutineAircraftsDatatables@index')->name('aircrafts.index');
                Route::get('/{taskcard}/repeats', 'TaskCardRoutineMaintenanceCycleDatatables@repeat')->name('maintenance-cycle.repeats');
                Route::get('/{taskcard}/thresholds', 'TaskCardRoutineMaintenanceCycleDatatables@threshold')->name('maintenance-cycle.thresholds');

            });

        });

        /** TASK CARD: EO */

        Route::name('taskcard-eo.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-eo',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskCardEODatatables@index')->name('all');
                Route::get('/adsb/modal', 'TaskCardEODatatables@adsbModal')->name('adsb.modal');
                Route::get('/cmrawl/modal', 'TaskCardEODatatables@cmrawlModal')->name('cmrawl.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools', 'TaskCardEOItemsDatatables@tool')->name('tools.index');
                Route::get('/{taskcard}/materials', 'TaskCardEOItemsDatatables@material')->name('materials.index');
                Route::get('/{taskcard}/aircrafts', 'TaskCardEOAircraftsDatatables@index')->name('aircrafts.index');
                Route::get('/{taskcard}/eo-instructions', 'EOInstructionsDatatables@index')->name('eo-instructions.index');
                Route::get('/{taskcard}/repeats', 'TaskCardEOMaintenanceCycleDatatables@repeat')->name('maintenance-cycle.repeats');
                Route::get('/{taskcard}/thresholds', 'TaskCardEOMaintenanceCycleDatatables@threshold')->name('maintenance-cycle.thresholds');

            });

        });

        /** TASK CARD: SI */

        Route::name('taskcard-si.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-si',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskCardSIDatatables@index')->name('all');
                Route::get('/si/modal', 'TaskCardSIDatatables@siModal')->name('si.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools', 'TaskCardSIItemsDatatables@tool')->name('tools.index');
                Route::get('/{taskcard}/materials', 'TaskCardSIItemsDatatables@material')->name('materials.index');
                Route::get('/{taskcard}/aircrafts', 'TaskCardSIAircraftsDatatables@index')->name('aircrafts.index');
                Route::get('/{taskcard}/repeats', 'TaskCardSIMaintenanceCycleDatatables@repeat')->name('maintenance-cycle.repeats');
                Route::get('/{taskcard}/thresholds', 'TaskCardSIMaintenanceCycleDatatables@threshold')->name('maintenance-cycle.thresholds');

            });

        });

        /** JOB CARD */

        Route::name('jobcard.')->group(function () {

            Route::group([

                'prefix'    => 'jobcard',
                'namespace' => 'JobCard'

            ], function () {

                Route::get('/', 'JobCardDatatables@index')->name('all');

            });

        });

        /** WORK PACKAGE */

        Route::name('workpackage.')->group(function () {

            Route::group([

                'prefix'    => 'workpackage',
                'namespace' => 'WorkPackage'

            ], function () {

                Route::get('/', 'WorkPackageDatatables@index')->name('all');
                Route::get('/{workPackage}/basic', 'WorkPackageTaskCardRoutineDatatables@basic')->name('basic.index');
                Route::get('/{workPackage}/sip', 'WorkPackageTaskCardRoutineDatatables@sip')->name('sip.index');
                Route::get('/{workPackage}/cpcp', 'WorkPackageTaskCardRoutineDatatables@cpcp')->name('cpcp.index');
                Route::get('/{workPackage}/ad-sb', 'WorkPackageTaskCardNonRoutineDatatables@ad_sb')->name('ad-sb.index');
                Route::get('/{workPackage}/cmr-awl', 'WorkPackageTaskCardNonRoutineDatatables@cmr_awl')->name('cmr-awl.index');
                Route::get('/{workPackage}/si', 'WorkPackageTaskCardNonRoutineDatatables@si')->name('si.index');

                Route::get('/{workPackage}/general-tools', 'WorkPackageItemsDatatables@generalTool')->name('gen-tools.index');
                Route::get('/{workPackage}/general-materials', 'WorkPackageItemsDatatables@generalMaterial')->name('gen-materials.index');
                Route::get('/{workPackage}/tools', 'WorkPackageItemsDatatables@Tool')->name('tools.index');
                Route::get('/{workPackage}/materials', 'WorkPackageItemsDatatables@Material')->name('materials.index');

                Route::get('/modal', 'WorkPackageDatatables@workpackageModal')->name('workpackage.modal');

            });

        });

    });

});
