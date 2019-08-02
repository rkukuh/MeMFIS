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

        /** COMPANY */

        Route::name('company.')->group(function () {

            Route::group([

                'prefix'    => 'company',
                'namespace' => 'Company'

            ], function () {

                /** Master Data */
                Route::get('/', 'CompanyDatatables@index')->name('all');
                Route::get('/type', 'CompanyTypeDatatables@index')->name('company.type');
                 /** Polymorph */
                
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
                Route::get('/statuses', 'EmployeeStatusesDatatables@index')->name('employee.statuses');

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
                Route::get('/defectcard/{project}', 'ProjectDatatables@defectCard')->name('defectcard');
                Route::get('{project}/htcrr/', 'HtCrrDatatables@index')->name('htcrr.all');
                Route::get('/{project}/workpackage', 'ProjectDatatables@workpackage')->name('workpackage.project');
                Route::get('/{htcrr}/tools', 'HtCrrItemsDatatables@tool')->name('htcrr.tools.index');
                Route::get('/{htcrr}/materials', 'HtCrrItemsDatatables@material')->name('htcrr.materials.index');
                Route::post('/additional/materials', 'AdditionalItemsDatatables@material')->name('additional.materials.index');
                Route::post('/additional/tools', 'AdditionalItemsDatatables@tools')->name('additional.tools.index');

                /** WORKPACKAGE */

                Route::get('/{project}/workpackage/{workPackage}/basic', 'ProjectWorkPackageTaskCardRoutineDatatables@basic')->name('basic.index');
                Route::get('/{project}/workpackage/{workPackage}/sip', 'ProjectWorkPackageTaskCardRoutineDatatables@sip')->name('sip.index');
                Route::get('/{project}/workpackage/{workPackage}/cpcp', 'ProjectWorkPackageTaskCardRoutineDatatables@cpcp')->name('cpcp.index');
                Route::get('/{project}/workpackage/{workPackage}/ad-sb', 'ProjectWorkPackageTaskCardNonRoutineDatatables@ad_sb')->name('ad-sb.index');
                Route::get('/{project}/workpackage/{workPackage}/cmr-awl', 'ProjectWorkPackageTaskCardNonRoutineDatatables@cmr_awl')->name('cmr-awl.index');
                Route::get('/{project}/workpackage/{workPackage}/si', 'ProjectWorkPackageTaskCardNonRoutineDatatables@si')->name('si.index');

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
                Route::post('/filter', 'QuotationDatatables@filter')->name('filter');
                Route::get('/{quotation}/job-request', 'QuotationDatatables@jobRequest')->name('job-request');
                Route::get('/{quotation}/workpackage/{workPackage}/facilities', 'QuotationDatatables@facilities')->name('all-facilities');

                /** Item */
                Route::get('/{quotation}/workPackage/{workPackage}/item/routine', 'QuotationItemDatatables@routine')->name('item.routine');
                Route::get('/{quotation}/workPackage/{workPackage}/item/non-routine', 'QuotationItemDatatables@non_routine')->name('item.non_routine');
                Route::get('/{quotation}/workPackage/{workPackage}/item/htcrr', 'QuotationItemDatatables@htcrr')->name('item.htcrr');

                /** Tool */
                Route::get('/{quotation}/workPackage/{workPackage}/tool/routine', 'QuotationToolDatatables@routine')->name('tool.routine');
                Route::get('/{quotation}/workPackage/{workPackage}/tool/non-routine', 'QuotationToolDatatables@non_routine')->name('tool.non_routine');
                Route::get('/{quotation}/workPackage/{workPackage}/tool/htcrr', 'QuotationToolDatatables@htcrr')->name('tool.htcrr');

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
                Route::post('/filter', 'TaskCardDatatables@filter')->name('filter');

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

        /** TASK RELEASE */

        Route::name('task-release-jobcard.')->group(function () {

            Route::group([

                'prefix'    => 'task-release-jobcard',
                'namespace' => 'TaskRelease'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskReleaseJobCardDatatables@index')->name('all');
                Route::post('/filter', 'TaskReleaseJobCardDatatables@filter')->name('filter');

            });

        });

        Route::name('task-release-defectcard.')->group(function () {

            Route::group([

                'prefix'    => 'task-release-defectcard',
                'namespace' => 'TaskRelease'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskReleaseDefectCardDatatables@index')->name('all');
                Route::post('/filter', 'TaskReleaseDefectCardDatatables@filter')->name('filter');

            });

        });

        /** RII RELEASE */

        Route::name('rii-release-jobcard.')->group(function () {

            Route::group([

                'prefix'    => 'rii-release-jobcard',
                'namespace' => 'RIIRelease'

            ], function () {

                /** Master Data */
                Route::get('/', 'RIIReleaseJobCardDatatables@index')->name('all');
                Route::post('/filter', 'RIIReleaseJobCardDatatables@filter')->name('filter');


            });

        });

        Route::name('rii-release-defectcard.')->group(function () {

            Route::group([

                'prefix'    => 'rii-release-defectcard',
                'namespace' => 'RIIRelease'

            ], function () {

                /** Master Data */
                Route::get('/', 'RIIReleaseDefectCardDatatables@index')->name('all');
                Route::post('/filter', 'RIIReleaseDefectCardDatatables@filter')->name('filter');


            });

        });

        /** Release To Service */

        Route::name('release-to-service.')->group(function () {

            Route::group([

                'prefix'    => 'release-to-service',
                'namespace' => 'ReleaseToService'

            ], function () {

                /** Master Data */
                Route::get('/', 'ReleaseToServiceDatatables@index')->name('all');
                Route::get('/progress', 'ReleaseToServiceDatatables@progress')->name('progress');
                Route::post('/filter', 'ReleaseToServiceDatatables@filter')->name('filter');


            });

        });

        /** JOB CARD */

        Route::name('jobcard.')->group(function () {

            Route::group([

                'prefix'    => 'jobcard',
                'namespace' => 'JobCard'

            ], function () {

                Route::get('/', 'JobCardDatatables@index')->name('all');
                Route::post('/filter', 'JobCardDatatables@filter')->name('filter');
                Route::get('/{jobcard}/materials', 'JobCardDatatables@material')->name('material');
                Route::get('/{jobcard}/tools', 'JobCardDatatables@tool')->name('tool');

            });

        });

        /** JOB CARD HTCRR*/

        Route::name('jobcard.htcrr.')->group(function () {

            Route::group([

                'prefix'    => 'jobcard-htcrr',
                'namespace' => 'HtCrr'

            ], function () {

                Route::get('/', 'HtCrrDatatables@index')->name('all');
                Route::post('/filter', 'HtCrrDatatables@filter')->name('filter');

            });

        });

        /** DISCREPANCY */

        Route::name('discrepancy.')->group(function () {

            Route::group([

                'prefix'    => 'discrepancy',
                'namespace' => 'Discrepancy'

            ], function () {

                Route::get('/', 'DiscrepancyDatatables@index')->name('all');
                Route::get('/ppc', 'DiscrepancyDatatables@ppc')->name('ppc');
                Route::post('/filter', 'DiscrepancyDatatables@filter')->name('filter');
                Route::get('/{discrepancy}/materials', 'DiscrepancyItemDatatables@material')->name('materials.index');
                Route::get('/{discrepancy}/tools', 'DiscrepancyItemDatatables@tool')->name('tools.index');


            });

        });

        /** DEFECT CARD */

        Route::name('defectcard.')->group(function () {

            Route::group([

                'prefix'    => 'defectcard',
                'namespace' => 'DefectCard'

            ], function () {

                Route::get('/', 'DefectCardDatatables@index')->name('all');
                Route::get('/project', 'DefectCardDatatables@project')->name('all.project');
                Route::get('/project/{project}', 'DefectCardDatatables@show')->name('all.show');
                Route::post('/filter', 'DefectCardDatatables@filter')->name('filter');

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
                Route::get('/{workPackage}/tools', 'WorkPackageItemsDatatables@tool')->name('tools.index');
                Route::get('/{workPackage}/materials', 'WorkPackageItemsDatatables@material')->name('materials.index');

                Route::get('/modal', 'WorkPackageDatatables@workpackageModal')->name('workpackage.modal');
                Route::get('/{workPackage}/taskcard/{taskcard}/successor', 'WorkPackageDatatables@successorModal')->name('successor.modal');
                Route::get('/{workPackage}/taskcard/{taskcard}/predecessor', 'WorkPackageDatatables@predecessorModal')->name('predecessor.modal');

                /** SUMARRY WORK PACKAGE */
                Route::get('/{workPackage}/routine/materials', 'WorkPackageTaskCardRoutineSummaryDatatables@routineMaterial')->name('workpackage.taskcard.routine.material.summary');
                Route::get('/{workPackage}/routine/tools', 'WorkPackageTaskCardRoutineSummaryDatatables@routineTool')->name('workpackage.taskcard.routine.tool.summary');
                Route::get('/{workPackage}/basic/materials', 'WorkPackageTaskCardRoutineSummaryDatatables@basicMaterial')->name('workpackage.taskcard.basic.material.summary');
                Route::get('/{workPackage}/basic/tools', 'WorkPackageTaskCardRoutineSummaryDatatables@basicTool')->name('workpackage.taskcard.basic.tool.summary');
                Route::get('/{workPackage}/cpcp/materials', 'WorkPackageTaskCardRoutineSummaryDatatables@cpcpMaterial')->name('workpackage.taskcard.cpcp.material.summary');
                Route::get('/{workPackage}/cpcp/tools', 'WorkPackageTaskCardRoutineSummaryDatatables@cpcpTool')->name('workpackage.taskcard.cpcp.tool.summary');
                Route::get('/{workPackage}/sip/materials', 'WorkPackageTaskCardRoutineSummaryDatatables@sipMaterial')->name('workpackage.taskcard.sip.material.summary');
                Route::get('/{workPackage}/sip/tools', 'WorkPackageTaskCardRoutineSummaryDatatables@sipTool')->name('workpackage.taskcard.sip.tool.summary');

                Route::get('/{workPackage}/non-routine/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@nonRoutineMaterial')->name('workpackage.taskcard.nonroutine.material.summary');
                Route::get('/{workPackage}/non-routine/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@nonRoutineTool')->name('workpackage.taskcard.nonroutine.tool.summary');
                Route::get('/{workPackage}/cmr-awl/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@ad_sbMaterial')->name('workpackage.taskcard.cmr-awl.material.summary');
                Route::get('/{workPackage}/cmr-awl/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@ad_sbTool')->name('workpackage.taskcard.cmr-awl.tool.summary');
                Route::get('/{workPackage}/ad-sb/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@cmr_awlMaterial')->name('workpackage.taskcard.ad-sb.material.summary');
                Route::get('/{workPackage}/ad-sb/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@cmr_awlTool')->name('workpackage.taskcard.ad-sb.tool.summary');
                Route::get('/{workPackage}/si/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@siMaterial')->name('workpackage.taskcard.si.material.summary');
                Route::get('/{workPackage}/si/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@siTool')->name('workpackage.taskcard.si.tool.summary');

            });

        });

    });

});
