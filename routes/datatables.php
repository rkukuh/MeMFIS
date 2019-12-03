<?php

Route::name('datatables.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'datatables',
        'namespace'     => 'Datatables',

    ], function () {

        /** INITIAL DATA */

        Route::get('/unit', 'UnitDatatables@index')->name('unit.index');

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
        Route::get('/leave-period', 'LeavePeriodDatatables@index')->name('leaveperiod.index');
        Route::get('/bpjs', 'BPJSDatatables@index')->name('bpjs.index');
        Route::get('/job-title', 'JobTitleDatatables@index')->name('bpjs.index');
        Route::get('/leave-type', 'LeaveTypeDatatables@index')->name('leavetype.index');
        Route::get('/holiday', 'HolidayDatatables@index')->name('holiday.index');
        Route::get('/workshift', 'WorkshiftDatatables@index')->name('workshift.index');
        Route::get('/department', 'DepartmentDatatables@index')->name('department.index');
        Route::get('/role', 'RoleDatatables@index')->name('role.index');
        Route::get('/bank', 'BankDatatables@index')->name('bank.index');
        Route::get('/school-type', 'SchoolTypeDatatables@index')->name('school.index');
        Route::get('/attendance', 'AttendanceDatatables@index')->name('attendance.index');
        Route::get('/overtime', 'OvertimeDatatables@index')->name('overtime.index');

        /** LICENSE */

        Route::get('/general-license', 'GeneralLicenseDatatables@index')->name('general-license.index');

        /** TRANSACTION */

        Route::get('/price-list-item', 'PriceListDatatables@item')->name('price-list.item');
        Route::get('/price-list-manhour', 'PriceListDatatables@manhour')->name('price-list.manhour');
        Route::get('/price-list-facility', 'PriceListDatatables@facility')->name('price-list.facility');

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

        /** ATTENDANCE CORRECTION */

        Route::name('attendance-correction.')->group(function () {

            Route::group([

                'prefix'    => 'attendance-correction',
                'namespace' => 'AttendanceCorrection'

            ], function () {
                /** Master Data */
                Route::get('/', 'AttendanceCorrectionDatatables@index')->name('all');

            });

        });

        /** BENEFIT */

        Route::name('benefit.')->group(function () {

            Route::group([

                'prefix'    => 'benefit',
                'namespace' => 'Benefit'

            ], function () {

                /** Master Data */
                Route::get('/', 'BenefitDatatables@index')->name('benefit.index');
                Route::get('/basecalculation', 'BenefitTypeDatatables@baseCalculation')->name('benefit.base');
                Route::get('/proratecalculation', 'BenefitTypeDatatables@prorateCalculation')->name('benefit.prorate');
                /** Polymorph */

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
                Route::get('/attendance-file', 'EmployeeAttendanceDatatables@index')->name('attendance.index');
                Route::get('/modal', 'EmployeeDatatables@employeeModal')->name('modal');

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
                Route::get('/{employee}/employee-school', 'EmployeeSchoolDatatables@index')->name('employee-school.index');
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
                Route::get('/item/{goodReceived}', 'ItemGoodsReceivedDatatables@index')->name('good-received.item');


            });

        });

        /** LEAVE */

        Route::name('leave.')->group(function () {

            Route::group([

                'prefix'    => 'leave',
                'namespace' => 'Leave'

            ], function () {

                /** Master Data */
                Route::get('/propose-leave', 'ProposeLeaveDatatables@index')->name('propose-leave.index');
            });

        });

        /** Receiving Inspection Report */

        Route::name('rir.')->group(function () {

            Route::group([

                'prefix'    => 'rir',
                'namespace' => 'RIR'

            ], function () {

                Route::get('/', 'RIRDatatables@index')->name('all');
                Route::get('/item/{rir}', 'ItemRIRDatatables@index')->name('rir.item');


            });

        });

        /** GROUND DUPPORT EQUIPTMENT */

        Route::name('gse.')->group(function () {

            Route::group([

                'prefix'    => 'gse',
                'namespace' => 'GSE'

            ], function () {

                Route::get('/', 'GSEDatatables@index')->name('all');
                Route::get('/item/{gse}', 'ItemGSEDatatables@index')->name('gse.item');


            });

        });

        /** Reuqest */

        Route::name('request.')->group(function () {

            Route::group([

                'prefix'    => 'request',
                'namespace' => 'Request'

            ], function () {

                // Route::get('/', 'RequestDatatables@index')->name('all');
                Route::get('/item/{itemRequest}', 'ItemRequestDatatables@index')->name('request.item');


            });

        });

        /** POSITION */

        Route::name('position.')->group(function () {

            Route::group([

                'prefix'    => 'position',
                'namespace' => 'Position'

            ], function () {

                /** Master Data */
                Route::get('/', 'PositionDatatables@index')->name('all');

                /** Transaction */

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

            });

        });

        /** INTERCHANGE */

        Route::name('interchange.')->group(function () {

            Route::group([

                'prefix'    => 'interchange',
                'namespace' => 'Interchange'

            ], function () {

                /** Master Data */
                Route::get('/', 'InterchangeDatatables@index')->name('all');

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
                Route::get('/defectcard/{project}/selected', 'ProjectDatatables@selectedDefectCard')->name('selectedDefectCard');
                Route::get('{project}/htcrr/', 'HtCrrDatatables@index')->name('htcrr.all');
                Route::get('/{project}/workpackage', 'ProjectDatatables@workpackage')->name('workpackage.project');
                Route::get('/{htcrr}/tools', 'HtCrrItemsDatatables@tool')->name('htcrr.tools.index');
                Route::get('/{htcrr}/materials', 'HtCrrItemsDatatables@material')->name('htcrr.materials.index');
                Route::post('/additional/materials', 'AdditionalItemsDatatables@material')->name('additional.materials.index');
                Route::post('/additional/tools', 'AdditionalItemsDatatables@tool')->name('additional.tools.index');
                Route::get('/additional/{project}/materials', 'AdditionalItemsDatatables@selectedMaterial')->name('additional.materials.selected');
                Route::get('/additional/{project}/tools', 'AdditionalItemsDatatables@selectedTool')->name('additional.tools.selected');
                Route::get('/additional/initial', 'AdditionalItemsDatatables@initial')->name('additional.initial.index');

                /** WORKPACKAGE */

                Route::get('/{project}/workpackage/{workPackage}/basic', 'ProjectWorkPackageTaskCardRoutineDatatables@basic')->name('basic.index');
                Route::get('/{project}/workpackage/{workPackage}/sip', 'ProjectWorkPackageTaskCardRoutineDatatables@sip')->name('sip.index');
                Route::get('/{project}/workpackage/{workPackage}/cpcp', 'ProjectWorkPackageTaskCardRoutineDatatables@cpcp')->name('cpcp.index');
                Route::get('/{project}/workpackage/{workPackage}/ad-sb', 'ProjectWorkPackageTaskCardNonRoutineDatatables@ad_sb')->name('ad-sb.index');
                Route::get('/{project}/workpackage/{workPackage}/cmr-awl', 'ProjectWorkPackageTaskCardNonRoutineDatatables@cmr_awl')->name('cmr-awl.index');
                Route::get('/{project}/workpackage/{workPackage}/ea', 'ProjectWorkPackageTaskCardNonRoutineDatatables@ea')->name('ea.index');
                Route::get('/{project}/workpackage/{workPackage}/eo', 'ProjectWorkPackageTaskCardNonRoutineDatatables@eo')->name('eo.index');
                Route::get('/{project}/workpackage/{workPackage}/si', 'ProjectWorkPackageTaskCardNonRoutineDatatables@si')->name('si.index');
                Route::get('/{project}/workpackage/{workPackage}/preliminary', 'ProjectWorkPackageTaskCardNonRoutineDatatables@preliminary')->name('preliminary.index');

                /** Items for summary */

                Route::get('/{project}/workpackage/{workPackage}/type/{type}/materials', 'ProjectItemDatatales@material')->name('summary.workpackage.material');
                Route::get('/{project}/workpackage/{workPackage}/type/{type}/tools', 'ProjectItemDatatales@tool')->name('summary.workpackage.tool');


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
                Route::get('/modal/item/{purchaseOrder}', 'ItemPurchaseOrderDatatables@itemModal')->name('modal.purchase.order.item');
                Route::get('/item/{purchaseOrder}', 'ItemPurchaseOrderDatatables@index')->name('purchase.order.item');

            });

        });

        /** PURCHASE REQUEST */

        Route::name('purchase-request.')->group(function () {

            Route::group([

                'prefix'    => 'purchase-request',
                'namespace' => 'PurchaseRequest'

            ], function () {

                Route::get('/general', 'GeneralPurchaseRequestDatatables@index')->name('all.general');
                Route::get('/project', 'ProjectPurchaseRequestDatatables@index')->name('all.project');
                Route::get('/project/item/{project}', 'ProjectPurchaseRequestDatatables@projectItem')->name('item.project');
                Route::get('/modal/general', 'GeneralPurchaseRequestDatatables@purchaseRequestModal')->name('modal.general.index');
                Route::get('/modal/project', 'ProjectPurchaseRequestDatatables@purchaseRequestModal')->name('modal.project.index');
                Route::get('/item/{purchaseRequest}/general/material', 'GeneralPurchaseRequestDatatables@pr_material')->name('pr.general.material');
                Route::get('/item/{purchaseRequest}/project/material', 'ProjectPurchaseRequestDatatables@pr_material')->name('pr.project.material');
                Route::get('/item/{purchaseRequest}/general/tool', 'GeneralPurchaseRequestDatatables@pr_tool')->name('pr.general.tool');
                Route::get('/item/{purchaseRequest}/project/tool', 'ProjectPurchaseRequestDatatables@pr_tool')->name('pr.project.tool');
                Route::get('/{purchase_request}/purchase-request', 'PurchaseRequestDatatables@item')->name('purchase-request');
                Route::get('/modal', 'PurchaseRequestDatatables@modal')->name('purchase-request.modal');

            });

        });

        /** STOCK MONITORING */

        Route::name('stock-monitoring.')->group(function () {

            Route::group([

                'prefix'    => 'stock-monitoring',
                'namespace' => 'StockMonitoring'

            ], function () {

                Route::get('/item/{item}', 'StockMonitoringDatatables@partNumber')->name('.all');
                Route::get('/storage/{storage}', 'StockMonitoringDatatables@storage')->name('.all');

            });

        });
        /** FEFO IN */

        Route::name('fefo-in.')->group(function () {

            Route::group([

                'prefix'    => 'fefo-in',
                'namespace' => 'FefoIn'

            ], function () {

                Route::get('/item/{item}/storage/{storage}', 'ItemFefoInDatatables@index')->name('fefo.in.storage.item');

            });

        });

        /** FEFO OUT */

        Route::name('fefo-out.')->group(function () {

            Route::group([

                'prefix'    => 'fefo-out',
                'namespace' => 'FefoOut'

            ], function () {

                Route::get('/item/{item}/storage/{storage}', 'ItemFefoOutDatatables@index')->name('fefo.out.storage.item');

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
                Route::get('/{quotation}/workPackage/item/htcrr', 'QuotationItemDatatables@htcrr')->name('item.htcrr');

                /** Tool */
                Route::get('/{quotation}/workPackage/{workPackage}/tool/routine', 'QuotationToolDatatables@routine')->name('tool.routine');
                Route::get('/{quotation}/workPackage/{workPackage}/tool/non-routine', 'QuotationToolDatatables@non_routine')->name('tool.non_routine');
                Route::get('/{quotation}/workPackage/tool/htcrr', 'QuotationToolDatatables@htcrr')->name('tool.htcrr');


                /** Defectcard Item */
                Route::get('/{quotation}/defectcard/item', 'QuotationAdditionalItemDatatables@item')->name('item.quotation-additional');
                Route::get('/{quotation}/defectcard/tool', 'QuotationAdditionalItemDatatables@tool')->name('tool.quotation-additional');
                Route::get('/{quotation}/additional/job-request', 'QuotationAdditionalDatatables@jobRequest')->name('quotation-additional.job-request');

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
                Route::get('/eo/modal', 'TaskCardEODatatables@eoModal')->name('eo.modal');

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

        /** TASK CARD: EA */

        Route::name('taskcard-ea.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-ea',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskCardEADatatables@index')->name('all');
                Route::get('/ea/modal', 'TaskCardEADatatables@eaModal')->name('ea.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools', 'TaskCardEAItemsDatatables@tool')->name('tools.index');
                Route::get('/{taskcard}/materials', 'TaskCardEAItemsDatatables@material')->name('materials.index');
                Route::get('/{taskcard}/ea-instructions', 'EAInstructionsDatatables@index')->name('ea-instructions.index');
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

        /** TASK CARD: Preliminary */

        Route::name('taskcard-preliminary.')->group(function () {

            Route::group([

                'prefix'    => 'taskcard-preliminary',
                'namespace' => 'TaskCard'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskCardPreliminaryDatatables@index')->name('all');
                Route::get('/preliminary/modal', 'TaskCardPreliminaryDatatables@preliminaryModal')->name('preliminary.modal');

                /** Polymorph */
                // TODO: with (aircraft) Access
                // TODO: with (aircraft) Zone

                /** Transaction */
                Route::get('/{taskcard}/tools', 'TaskCardPreliminaryItemsDatatables@tool')->name('tools.index');
                Route::get('/{taskcard}/materials', 'TaskCardPreliminaryItemsDatatables@material')->name('materials.index');
                Route::get('/{taskcard}/aircrafts', 'TaskCardPreliminaryAircraftsDatatables@index')->name('aircrafts.index');
                Route::get('/{taskcard}/repeats', 'TaskCardPreliminaryMaintenanceCycleDatatables@repeat')->name('maintenance-cycle.repeats');
                Route::get('/{taskcard}/thresholds', 'TaskCardPreliminaryMaintenanceCycleDatatables@threshold')->name('maintenance-cycle.thresholds');

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

        Route::name('task-release-htcrr.')->group(function () {

            Route::group([

                'prefix'    => 'task-release-htcrr',
                'namespace' => 'TaskRelease'

            ], function () {

                /** Master Data */
                Route::get('/', 'TaskReleaseHtCrrDatatables@index')->name('all');
                Route::post('/filter', 'TaskReleaseHtCrrDatatables@filter')->name('filter');

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

        Route::name('rii-release-htcrr.')->group(function () {

            Route::group([

                'prefix'    => 'rii-release-htcrr',
                'namespace' => 'RIIRelease'

            ], function () {

                /** Master Data */
                Route::get('/', 'RIIReleaseHtCrrDatatables@index')->name('all');
                Route::post('/filter', 'RIIReleaseHtCrrDatatables@filter')->name('filter');


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

                Route::get('/mechanic', 'DiscrepancyDatatables@mechanic')->name('mechanic');
                Route::get('/engineer', 'DiscrepancyDatatables@engineer')->name('engineer');
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

                Route::get('{DefectCard}/helpers', 'HelperDatatables@helpers')->name('helpers.list');
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
                Route::get('/{taskcard}/instruction', 'WorkPackageTaskCardNonRoutineDatatables@instruction')->name('instruction.index');
                Route::get('/{workPackage}/si', 'WorkPackageTaskCardNonRoutineDatatables@si')->name('si.index');
                Route::get('/{workPackage}/ea', 'WorkPackageTaskCardNonRoutineDatatables@ea')->name('ea.index');
                Route::get('/{workPackage}/eo', 'WorkPackageTaskCardNonRoutineDatatables@eo')->name('eo.index');
                Route::get('/{workPackage}/preliminary', 'WorkPackageTaskCardNonRoutineDatatables@preliminary')->name('preliminary.index');

                Route::get('/{workPackage}/general-tools', 'WorkPackageItemsDatatables@generalTool')->name('gen-tools.index');
                Route::get('/{workPackage}/general-materials', 'WorkPackageItemsDatatables@generalMaterial')->name('gen-materials.index');
                Route::get('/{workPackage}/tools', 'WorkPackageItemsDatatables@tool')->name('tools.index');
                Route::get('/{workPackage}/materials', 'WorkPackageItemsDatatables@material')->name('materials.index');

                Route::get('/modal', 'WorkPackageDatatables@workpackageModal')->name('workpackage.modal');
                Route::get('/{workPackage}/taskcard/{taskcard}/successor', 'WorkPackageDatatables@successorTaskCardModal')->name('successor.taskcard.modal');
                Route::get('/{workPackage}/taskcard/{taskcard}/predecessor', 'WorkPackageDatatables@predecessorTaskCardModal')->name('predecessor.taskcard.modal');
                Route::get('/{workPackage}/instruction/{instruction}/successor', 'WorkPackageDatatables@successorInstructionModal')->name('successor.instruction.modal');
                Route::get('/{workPackage}/instruction/{instruction}/predecessor', 'WorkPackageDatatables@predecessorInstructionModal')->name('predecessor.instruction.modal');

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
                Route::get('/{workPackage}/cmr-awl/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@cmr_awlMaterial')->name('workpackage.taskcard.cmr-awl.material.summary');
                Route::get('/{workPackage}/cmr-awl/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@cmr_awlTool')->name('workpackage.taskcard.cmr-awl.tool.summary');
                Route::get('/{workPackage}/ad-sb/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@ad_sbMaterial')->name('workpackage.taskcard.ad-sb.material.summary');
                Route::get('/{workPackage}/ad-sb/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@ad_sbTool')->name('workpackage.taskcard.ad-sb.tool.summary');
                Route::get('/{workPackage}/si/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@siMaterial')->name('workpackage.taskcard.si.material.summary');
                Route::get('/{workPackage}/si/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@siTool')->name('workpackage.taskcard.si.tool.summary');
                Route::get('/{workPackage}/ea/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@eaTool')->name('workpackage.taskcard.ea.tool.summary');
                Route::get('/{workPackage}/ea/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@eaMaterial')->name('workpackage.taskcard.ea.material.summary');
                Route::get('/{workPackage}/eo/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@eoTool')->name('workpackage.taskcard.eo.tool.summary');
                Route::get('/{workPackage}/eo/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@eoMaterial')->name('workpackage.taskcard.eo.material.summary');
                Route::get('/{workPackage}/preliminary/materials', 'WorkPackageTaskCardNonRoutineSummaryDatatables@preliminaryMaterial')->name('workpackage.taskcard.preliminary.material.summary');
                Route::get('/{workPackage}/preliminary/tools', 'WorkPackageTaskCardNonRoutineSummaryDatatables@preliminaryTool')->name('workpackage.taskcard.preliminary.tool.summary');

            });

        });


        /** Work Progress Report */

        Route::name('work-progress-report.')->group(function () {

            Route::group([

                'prefix'    => 'work-progress-report',
                'namespace' => 'WorkProgressReport'

            ], function () {

                /** Master Data */
                Route::get('/', 'WorkProgressReportDatatables@index')->name('all');


            });

        });

        /** Inventory In */

        Route::name('inventory-in.')->group(function () {

            Route::group([

                'prefix'    => 'inventory-in',
                'namespace' => 'InventoryIn'

            ], function () {

                /** Master Data */
                Route::get('/', 'InventoryInDatatables@index')->name('all');
                Route::get('/{inventoryIn}/items', 'InventoryInDatatables@getItemsByInventoryIn')->name('items');
            });
        });

        /** Inventory Out */

        Route::name('inventory-out.')->group(function () {

            Route::group([

                'prefix'    => 'inventory-out',
                'namespace' => 'InventoryOut'

            ], function () {

                /** Material */
                Route::get('/material', 'InventoryOutMaterialDatatables@index')->name('material.all');
                Route::get('/material/{inventoryOut}/items', 'InventoryOutMaterialDatatables@getItemsByInventoryOut')->name('material.items');

                /** Tool */
                Route::get('/tool', 'InventoryOutToolDatatables@index')->name('tools.all');
                Route::get('/tool/{inventoryOut}/items', 'InventoryOutToolDatatables@getItemsByInventoryOut')->name('tools.items');

            });
        });

        /** Item Request */

        Route::name('item-request.')->group(function () {

            Route::group([

                'prefix'    => 'item-request',
                'namespace' => 'ItemRequest'

            ], function () {

                /** Material Request */
                Route::get('/material', 'ItemRequestMaterialDatatables@index')->name('material.all');
                Route::get('/material/{itemRequest}/items', 'ItemRequestMaterialDatatables@getItemsByItemRequest')->name('material.items');

                /** Tool Request */
                Route::get('/tool', 'ItemRequestToolDatatables@index')->name('tools.all');
                Route::get('/tool/{itemRequest}/items', 'ItemRequestToolDatatables@getItemsByItemRequest')->name('tools.items');

            });
        });

        /** Mutation */

        Route::name('mutation')->group(function () {

            Route::group([

                'prefix'    => 'mutation',
                'namespace' => 'Mutation'

            ], function () {

                Route::get('/material-transfer', 'MutationDatatables@index');
                Route::get('/material-transfer/{mutation}/items', 'MutationDatatables@getItemsByMutation');

            });
        });

        Route::get('/testing', 'UnitDatatables@index')->name('testing.index');


    });

});
