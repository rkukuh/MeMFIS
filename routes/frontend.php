<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');
        Route::view('/purchase-request', 'frontend.purchase-request.index')->name('purchase-request.index');
        Route::view('/purchase-request/create', 'frontend.purchase-request.create')->name('purchase-request.create');

        /** INITIAL DATA */

        Route::resource('type', 'TypeController');
        Route::resource('unit', 'UnitController');
        Route::resource('level', 'LevelController');
        Route::resource('status', 'StatusController');
        Route::resource('journal', 'JournalController');

        /** POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('zone', 'ZoneController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('access', 'AccessController');
        Route::resource('repeat', 'RepeatController');
        Route::resource('address', 'AddressController');
        Route::resource('version', 'VersionController');
        Route::resource('website', 'WebsiteController');
        Route::resource('station', 'StationController');
        Route::resource('category', 'CategoryController');
        Route::resource('document', 'DocumentController');
        Route::resource('threshold', 'ThresholdController');
        Route::resource('approval', 'ApprovalController');
        Route::resource('progress', 'ProgressController');
        Route::resource('inspection', 'InspectionController');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);

        /** MASTER */

        Route::resource('user', 'UserController');
        Route::resource('school', 'SchoolController');
        Route::resource('vendor', 'VendorController');
        Route::resource('storage', 'StorageController');
        Route::resource('license', 'LicenseController');
        Route::resource('language', 'LanguageController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('facility', 'FacilityController');
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');

        /** LICENSE */

        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');

        /** CERTIFICATION */

        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        /** PROJECT */

        Route::namespace('Project')->group(function () {

            Route::resource('project', 'ProjectController');
            Route::post('/project/{project}/approve', 'ProjectController@approve')->name('project.approve');


            Route::resource('project-hm', 'ProjectHMController', [
                'parameters' => ['project-hm' => 'project']
            ]);

            Route::resource('project-workshop', 'ProjectWorkshopController', [
                'parameters' => ['project-workshop' => 'project']
            ]);

            Route::post('project-workpackage/{project}', 'BlankWorkPackageController@store')->name('project-workpackage.store');
            Route::get('project/{project}/blank-workpackage','BlankWorkPackageController@create')->name('project-blank-workpackage.create');
            Route::get('project/{project}/blank-workpackage/{workPackage}/edit','BlankWorkPackageController@edit')->name('project-blank-workpackage.edit');

            Route::prefix('project-hm')->group(function () {
                Route::name('project-hm.')->group(function () {
                    Route::resource('/{project}/workpackage', 'ProjectHMWorkPackageController', [
                        'parameters' => ['workpackage' => 'workPackage']
                    ]);
                });
                Route::post('/htcrr','HtCrrController@store')->name('project-hm.htcrr.add');
                Route::post('/{project}/workpackage/{workpackage}/engineerTeam','ProjectHMWorkPackageController@engineerTeam')->name('project-hm.engineerTeam.add');
                Route::post('/{project}/workpackage/{workpackage}/facilityUsed','ProjectHMWorkPackageController@facilityUsed')->name('project-hm.facilityUsed.add');
                Route::post('/{project}/workpackage/{workpackage}/manhoursPropotion','ProjectHMWorkPackageController@manhoursPropotion')->name('project-hm.manhoursPropotion.add');
            });

            Route::prefix('project-workshop')->group(function () {
                Route::name('project-workshop.')->group(function () {
                    Route::resource('/{project}/workpackage', 'ProjectHMWorkPackageController', [
                        'parameters' => ['workpackage' => 'workPackage']
                    ]);
                });
            });

        });

        /** PROJECT'S WORKPACKAGE */

        Route::resource('project-workpackage', 'ProjectWorkPackageController');
        Route::resource('project-workpackage-manhour', 'ProjectWorkPackageManhourController');
        Route::resource('project-workpackage-engineer', 'ProjectWorkPackageEngineerController');
        Route::resource('project-workpackage-facility', 'ProjectWorkPackageFacilityController');

        /** QUOTATION */

        Route::namespace('Quotation')->group(function () {
            Route::resource('quotation', 'QuotationController');
            Route::get('quotation/{project}/project', 'QuotationController@project')->name('quotation.project');

            Route::prefix('quotation')->group(function () {
                Route::get('/{quotation}/print', 'QuotationController@print');
                Route::post('/{quotation}/workpackage/{workpackage}/discount', 'QuotationController@discount')->name('quotation.discount');
                Route::post('/{quotation}/approve', 'QuotationController@approve')->name('quotation.approve');
                Route::name('quotation.')->group(function () {
                    Route::resource('/{quotation}/workpackage', 'QuotationWorkPackageController', [
                        'parameters' => ['workpackage' => 'workPackage']
                    ]);
                });
                Route::get('/{quotation}/workpackage/{workPackage}/summary/basic', 'SummaryRoutineTaskcardController@basic')->name('quotation.summary.basic');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/sip', 'SummaryRoutineTaskcardController@sip')->name('quotation.summary.sip');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/cpcp', 'SummaryRoutineTaskcardController@cpcp')->name('quotation.summary.cpcp');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/adsb', 'SummaryNonRoutineTaskcardController@adsb')->name('quotation.summary.adsb');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/cmrawl', 'SummaryNonRoutineTaskcardController@cmrawl')->name('quotation.summary.cmrawl');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/si', 'SummaryNonRoutineTaskcardController@si')->name('quotation.summary.si');
            });
        });

        /** AIRCRAFT */

        Route::namespace('Aircraft')->group(function () {

            Route::resource('aircraft', 'AircraftController');

            Route::name('aircraft.')->group(function () {
                Route::prefix('aircraft')->group(function () {

                    /** Polymorph */
                    Route::resource('/{aircraft}/zones', 'AircraftZonesController');
                    Route::resource('/{aircraft}/accesses', 'AircraftAccessesController');
                    Route::resource('/{aircraft}/stations', 'AircraftStationsController');

                });
            });

        });

        /** WORKPACKAGE */

        Route::namespace('WorkPackage')->group(function () {
            Route::resource('workpackage', 'WorkPackageController', [
                'parameters' => ['workpackage' => 'workPackage']
            ]);

            Route::prefix('workpackage')->group(function () {

                Route::post('/{workPackage}/taskcard', 'WorkPackageController@addTaskCard')->name('taskcard.workpackage');
                Route::delete('/{workPackage}/taskcard/{taskcard}', 'WorkPackageController@deleteTaskCard')->name('delete_taskcard.workpackage');
                Route::put('/{workPackage}/sequence/{taskcard}', 'WorkPackageController@sequence')->name('sequence.workpackage');
                Route::put('/{workPackage}/mandatory/{taskcard}', 'WorkPackageController@mandatory')->name('mandatory.workpackage');

                /** Summary */

                Route::get('/{workPackage}/summary/basic', 'SummaryRoutineTaskcardController@basic')->name('summary.basic');
                Route::get('/{workPackage}/summary/sip', 'SummaryRoutineTaskcardController@sip')->name('summary.sip');
                Route::get('/{workPackage}/summary/cpcp', 'SummaryRoutineTaskcardController@cpcp')->name('summary.cpcp');
                Route::get('/{workPackage}/summary/ad-sb', 'SummaryNonRoutineTaskcardController@adsb')->name('summary.ad-sb');
                Route::get('/{workPackage}/summary/cmr-awl', 'SummaryNonRoutineTaskcardController@cmrawl')->name('summary.cmr-awl');
                Route::get('/{workPackage}/summary/si', 'SummaryNonRoutineTaskcardController@si')->name('summary.si');
                Route::get('/{workPackage}/summary/routine', 'SummaryRoutineTaskcardController@summary')->name('summary.routine');
                Route::get('/{workPackage}/summary/non-routine', 'SummaryNonRoutineTaskcardController@summary')->name('summary.nonroutine');
                Route::get('/{workPackage}/summary/', 'WorkPackageController@summary')->name('summary.workpackage');

                /** Transaction: Item */
                Route::post('/{workPackage}/item', 'WorkPackageItemsController@store')->name('item.workpackage');
                Route::delete('/{workPackage}/{item}/item/', 'WorkPackageItemsController@destroy')->name('item.workpackage.delete');

            });
        });

        /** ITEM */

        Route::namespace('Item')->group(function () {

            Route::resource('item', 'ItemController');

            Route::name('item.')->group(function () {
                Route::prefix('item')->group(function () {

                    /** Price List */
                    Route::resource('/{item}/prices', 'ItemPriceController');

                    /** Transaction: Unit */
                    Route::post('/{item}/unit', 'ItemUnitController@store')->name('unit.store');
                    Route::delete('/{item}/{unit}/unit', 'ItemUnitController@destroy')->name('unit.destroy');

                    /** Transaction: Storage */
                    Route::post('/{item}/storage', 'ItemStorageController@store')->name('storage.store');
                    Route::put('/{item}/storage', 'ItemStorageController@update')->name('storage.update');
                    Route::delete('/{item}/{storage}/storage', 'ItemStorageController@destroy')->name('storage.destroy');

                });
            });

        });

        Route::namespace('Item')->group(function () {

            Route::resource('tool', 'ToolController');

        });

        /** CUSTOMER */

        Route::namespace('Customer')->group(function () {

            Route::resource('customer', 'CustomerController');

            Route::name('customer.')->group(function () {
                Route::prefix('customer')->group(function () {

                    /** Polymorph */
                    Route::resource('/{customer}/faxes', 'CustomerFaxesController');
                    Route::resource('/{customer}/emails', 'CustomerEmailsController');
                    Route::resource('/{customer}/phones', 'CustomerPhonesController');
                    Route::resource('/{customer}/websites', 'CustomerWebsitesController');
                    Route::resource('/{customer}/addresses', 'CustomerAddressesController');
                    Route::resource('/{customer}/documents', 'CustomerDocumentsController');

                });
            });

        });

        /** EMPLOYEE */

        Route::namespace('Employee')->group(function () {

            Route::resource('employee', 'EmployeeController');

            Route::name('employee.')->group(function () {
                Route::prefix('employee')->group(function () {

                    /** Polymorph */
                    Route::resource('/{employee}/faxes', 'EmployeeFaxesController');
                    Route::resource('/{employee}/emails', 'EmployeeEmailsController');
                    Route::resource('/{employee}/phones', 'EmployeePhonesController');
                    Route::resource('/{employee}/websites', 'EmployeeWebsitesController');
                    Route::resource('/{employee}/addresses', 'EmployeeAddressesController');
                    Route::resource('/{employee}/documents', 'EmployeeDocumentsController');

                    /** Certifications and Licenses */
                    Route::resource('/{employee}/otr', 'EmployeeOTRController');
                    Route::resource('/{employee}/amel', 'EmployeeAMELController');

                    /** Transaction */
                    Route::resource('/{employee}/history', 'EmployeeHistoryController');
                    Route::resource('/{employee}/education', 'EmployeeEducationController');
                    Route::resource('/{employee}/travel-request', 'EmployeeTravelRequestController');
                    Route::resource('/{employee}/general-license', 'EmployeeGeneralLicenseController');

                });
            });

        });

        /** HT/CRR */

        Route::namespace('Project')->group(function () {
            Route::resource('htcrr', 'HtCrrController');

            Route::name('htcrr.')->group(function () {
                Route::prefix('htcrr')->group(function () {
                    //
                });
            });

        });

        /** RTS */

        Route::resource('rts', 'RTSController');

        Route::name('rts.')->group(function () {
            Route::prefix('rts')->group(function () {
                //
            });
        });

        /** TASK CARD */

        Route::namespace('TaskCard')->group(function () {

            Route::resource('taskcard', 'TaskCardController');

            Route::resource('taskcard-routine', 'TaskCardRoutineController', [
                'parameters' => ['taskcard-routine' => 'taskCard']
            ]);

            Route::resource('taskcard-eo', 'TaskCardEOController', [
                'parameters' => ['taskcard-eo' => 'taskCard']
            ]);

            Route::resource('taskcard-si', 'TaskCardSIController', [
                'parameters' => ['taskcard-si' => 'taskCard']
            ]);

            Route::resource('preliminary', 'PreliminaryController', [
                'parameters' => ['preliminary' => 'taskCard']
            ]);

            // Relationships

            Route::name('taskcard-routine.')->group(function () {
                Route::prefix('taskcard-routine')->group(function () {

                    /** Transaction: Item */
                    Route::post('/{taskcard}/item', 'TaskCardRoutineItemsController@store')->name('item.store');
                    Route::delete('/{taskcard}/{item}/item', 'TaskCardRoutineItemsController@destroy')->name('item.destroy');

                    /** Transaction: Threshold */
                    Route::post('/{taskcard}/threshold', 'TaskCardRoutineThresholdController@store')->name('threshold.store');
                    Route::delete('/{taskcard}/{threshold}/threshold', 'TaskCardRoutineThresholdController@destroy')->name('itthresholdem.destroy');

                    /** Transaction: Repeat */
                    Route::post('/{taskcard}/repeat', 'TaskCardRoutineRepeatController@store')->name('repeat.store');
                    Route::delete('/{taskcard}/{repeat}/repeat', 'TaskCardRoutineRepeatController@destroy')->name('repeat.destroy');

                });
            });

            Route::name('taskcard-eo.')->group(function () {
                Route::prefix('taskcard-eo')->group(function () {

                    Route::resource('/{taskcard}/eo-instruction', 'EOInstructionController');

                    /** Transaction: Item */
                    Route::post('/eo-instruction/{taskcard}/item', 'EOInstructionItemController@store')->name('item.store');
                    Route::delete('/eo-instruction/{taskcard}/{item}/item', 'EOInstructionItemController@destroy')->name('item.destroy');

                });
            });

            Route::name('taskcard-si.')->group(function () {
                Route::prefix('taskcard-si')->group(function () {

                    /** Transaction: Item */
                    Route::post('/{taskcard}/item', 'TaskCardSIItemController@store')->name('item.store');
                    Route::delete('/{taskcard}/{item}/item', 'TaskCardSIItemController@destroy')->name('item.destroy');

                });
            });

            Route::name('preliminary.')->group(function () {
                Route::prefix('preliminary')->group(function () {

                    /** Transaction: Item */
                    // Route::post('/{preliminary}/item', 'TaskCardSIItemController@store')->name('item.store');
                    // Route::delete('/{preliminary}/{item}/item', 'TaskCardSIItemController@destroy')->name('item.destroy');

                });
            });

        });

        /** JOB CARD */

        Route::namespace('JobCard')->group(function () {

            Route::resource('jobcard-ppc', 'JobCardPPCController', [
                'parameters' => ['jobcard-ppc' => 'jobcard']
            ]);

            Route::resource('jobcard-engineer', 'JobCardEngineerController', [
                'parameters' => ['jobcard-engineer' => 'jobcard']
            ]);

            Route::post('jobcard-engineer', 'JobCardEngineerController@search')->name('engineer.jobcard.search');

            Route::resource('jobcard-mechanic', 'JobCardMechanicController', [
                'parameters' => ['jobcard-mechanic' => 'jobcard']
            ]);

            Route::post('jobcard-mechanic/', 'JobCardMechanicController@search')->name('mechanic.jobcard.search');

            Route::name('jobcard.')->group(function () {
                Route::prefix('jobcard')->group(function () {

                    /** Transaction */
                    Route::get('/{jobCard}/print', 'JobCardController@print');
                });
            });

        });

        /** JOB CARD HARD TIME*/

        Route::namespace('JobCardHardTime')->group(function () {

            Route::resource('jobcard-hardtime-ppc', 'JobCardHardTimePPCController', [
                'parameters' => ['jobcard-ppc' => 'jobcard']
            ]);

            Route::resource('jobcard-hardtime-engineer', 'JobCardHardTimeEngineerController', [
                'parameters' => ['jobcard-engineer' => 'jobcard']
            ]);

            Route::post('jobcard-hardtime-engineer', 'JobCardHardTimeEngineerController@search')->name('engineer.jobcard.hardtime.search');

            Route::resource('jobcard-hardtime-mechanic', 'JobCardHardTimeMechanicController', [
                'parameters' => ['jobcard-mechanic' => 'jobcard']
            ]);

            Route::post('jobcard-hardtime-mechanic/', 'JobCardHardTimeMechanicController@search')->name('mechanic.jobcard.hardtime.search');

            Route::name('jobcard.hardtime.')->group(function () {
                Route::prefix('jobcard-hardtime')->group(function () {

                    /** Transaction */
                    Route::get('/{jobCard}/print', 'JobCardHardTimeController@print');
                });
            });

        });

        Route::view('/jobcard-hardtime-engineer', 'frontend.job-card-hard-time.engineer.index')->name('job-card-hard-time.engineer');
        Route::view('/jobcard-hardtime-engineer-instalation-open', 'frontend.job-card-hard-time.engineer.progress.instalation.progress-open')->name('job-card-hardtime.engineer.instalation.open');
        Route::view('/jobcard-hardtime-engineer-instalation-resume', 'frontend.job-card-hard-time.engineer.progress.instalation.progress-resume')->name('job-card-hardtime.engineer.instalation.resume');
        Route::view('/jobcard-hardtime-engineer-instalation-pause', 'frontend.job-card-hard-time.engineer.progress.instalation.progress-pause')->name('job-card-hardtime.engineer.instalation.pause');
        Route::view('/jobcard-hardtime-engineer-removal-open', 'frontend.job-card-hard-time.engineer.progress.removal.progress-open')->name('job-card-hardtime.engineer.removal.open');
        Route::view('/jobcard-hardtime-engineer-removal-resume', 'frontend.job-card-hard-time.engineer.progress.removal.progress-resume')->name('job-card-hardtime.engineer.removal.resume');
        Route::view('/jobcard-hardtime-engineer-removal-pause', 'frontend.job-card-hard-time.engineer.progress.removal.progress-pause')->name('job-card-hardtime.engineer.removal.pause');

        Route::view('/jobcard-hardtime-mechanic', 'frontend.job-card-hard-time.mechanic.index')->name('job-card.hardtime.mechanic');
        Route::view('/jobcard-hardtime-mechanic-instalation-open', 'frontend.job-card-hard-time.mechanic.progress.instalation.progress-open')->name('job-card-hardtime.mechanic.instalation.open');
        Route::view('/jobcard-hardtime-mechanic-instalation-resume', 'frontend.job-card-hard-time.mechanic.progress.instalation.progress-resume')->name('job-card-hardtime.mechanic.instalation.resume');
        Route::view('/jobcard-hardtime-mechanic-instalation-pause', 'frontend.job-card-hard-time.mechanic.progress.instalation.progress-pause')->name('job-card-hardtime.mechanic.instalation.pause');
        Route::view('/jobcard-hardtime-mechanic-removal-open', 'frontend.job-card-hard-time.mechanic.progress.removal.progress-open')->name('job-card-hardtime.mechanic.removal.open');
        Route::view('/jobcard-hardtime-mechanic-removal-resume', 'frontend.job-card-hard-time.mechanic.progress.removal.progress-resume')->name('job-card-hardtime.mechanic.removal.resume');
        Route::view('/jobcard-hardtime-mechanic-removal-pause', 'frontend.job-card-hard-time.mechanic.progress.removal.progress-pause')->name('job-card-hardtime.mechanic.removal.pause');

        Route::view('/jobcard-hardtime-ppc', 'frontend.job-card-hard-time.ppc.index')->name('job-card-hard-time.ppc');
        Route::view('/jobcard-hardtime-ppc-show', 'frontend.job-card-hard-time.ppc.show')->name('job-card-hard-time.ppc.show');
      

        /** TASK RELEASE */

        Route::namespace('TaskRelease')->group(function () {
            Route::name('taskrelease-jobcard.')->group(function () {
                Route::prefix('taskrelease-jobcard')->group(function () {
                    Route::resource('task-release', 'TaskReleaseJobCardController', [
                        'parameters' => ['task-release' => 'taskrelease']
                    ]);

                });
            });
            Route::name('taskrelease-defectcard.')->group(function () {
                Route::prefix('taskrelease-defectcard')->group(function () {
                    Route::resource('task-release', 'TaskReleaseDefectCardController', [
                        'parameters' => ['task-release' => 'taskrelease']
                    ]);
                });
            });
        });

         /** RII RELEASE */

         Route::namespace('RIIRelease')->group(function () {
            Route::name('riirelease-jobcard.')->group(function () {
                Route::prefix('riirelease-jobcard')->group(function () {
                    Route::resource('rii-release', 'RIIReleaseJobCardController', [
                        'parameters' => ['rii-release' => 'riirelease']
                    ]);
                });
            });
            Route::name('riirelease-defectcard.')->group(function () {
                Route::prefix('riirelease-defectcard')->group(function () {
                    Route::resource('rii-release', 'RIIReleaseDefectCardController', [
                        'parameters' => ['rii-release' => 'riirelease']
                    ]);
                });
            });
        });

        /** Discrepancy */

        Route::namespace('Discrepancy')->group(function () {

            Route::resource('discrepancy', 'DiscrepancyController');

            Route::resource('discrepancy-ppc', 'DiscrepancyPPCController', [
                'parameters' => ['discrepancy-ppc' => 'discrepancy']
            ]);

            Route::post('discrepancy-engineer/search', 'DiscrepancyEngineerController@search')->name('engineer.discrepancy.search');


            Route::resource('discrepancy-engineer', 'DiscrepancyEngineerController', [
                'parameters' => ['discrepancy-engineer' => 'discrepancy']
            ]);

            Route::resource('discrepancy-mechanic', 'DiscrepancyMechanicController', [
                'parameters' => ['discrepancy-mechanic' => 'discrepancy']
            ]);

            Route::name('discrepancy.')->group(function () {
                Route::prefix('discrepancy')->group(function () {

                    /** Transaction */
                    Route::POST('{jobcard}/engineer/create', 'DiscrepancyEngineerController@create')->name('jobcard.engineer.discrepancy.create');
                    Route::GET('{jobcard}/engineer/', 'DiscrepancyEngineerController@create')->name('jobcard.engineer.discrepancy');
                    Route::POST('{jobcard}/mechanic/create', 'DiscrepancyMechanicController@create')->name('jobcard.mechanic.discrepancy.create');
                    Route::GET('{jobcard}/mechanic/', 'DiscrepancyMechanicController@create')->name('jobcard.mechanic.discrepancy');
                    Route::PUT('{discrepancy}/engineer/approve', 'DiscrepancyEngineerController@approve')->name('jobcard.engineer.discrepancy.approve');
                    Route::PUT('{discrepancy}/ppc/approve', 'DiscrepancyPPCController@approve')->name('jobcard.ppc.discrepancy.approve');

                    /** Transaction: Item */
                    Route::resource('/{discrepancy}/item', 'DiscrepancyItemController');

                });
            });

        });

        /** DEFECT CARD */

        Route::namespace('DefectCard')->group(function () {

            Route::resource('defectcard', 'DefectCardController');

            Route::resource('defectcard-engineer', 'DefectCardEngineerController', [
                'parameters' => ['defectcard-engineer' => 'defectcard']
            ]);

            Route::post('defectcard-engineer', 'DefectCardEngineerController@search')->name('engineer.defectcard.search');

            Route::resource('defectcard-mechanic', 'DefectCardMechanicController', [
                'parameters' => ['defectcard-mechanic' => 'defectcard']
            ]);

            Route::post('defectcard-mechanic', 'DefectCardMechanicController@search')->name('mechanic.defectcard.search');

            Route::resource('defectcard-project', 'DefectCardProjectController', [
                'parameters' => ['defectcard-project' => 'defectcard']
            ]);

            Route::name('defectcard.')->group(function () {
                Route::prefix('defectcard')->group(function () {

                    /** Transaction */


                });
            });

        });


        /** INTERCHANGE */

        Route::namespace('Interchange')->group(function () {
            Route::resource('interchange', 'InterchangeController');
        });

        /** Receiving Inspection Report */

        Route::namespace('ReceivingInspectionReport')->group(function () {
            Route::resource('receiving-inspection-report', 'ReceivingInspectionController');
        });

        /** Release to Service */

        Route::namespace('ReleaseToService')->group(function () {
            Route::resource('release-to-service', 'ReleaseToServiceController');
        });

        /** PURCHASE REQUEST */

        Route::namespace('PurchaseRequest')->group(function () {
            Route::resource('purchase-request', 'PurchaseRequestController');

            Route::put('purchase-request/{purchaseRequest}/approve', 'PurchaseRequestController@approve')->name('purchase-request.approve');
            Route::post('purchase-request/{purchaseRequest}/item/{item}', 'PurchaseRequestController@add_item')->name('purchase-request.add-item');

            Route::name('purchase-request.')->group(function () {
                //
            });
        });

        /** PURCHASE ORDER */

        Route::namespace('PurchaseOrder')->group(function () {

            Route::resource('purchase-order', 'PurchaseOrderController');
            Route::put('purchase-order/{purchaseOrder}/approve', 'PurchaseOrderController@approve')->name('purchase-order.approve');

            Route::name('purchase-order.')->group(function () {
                //
            });
        });


        /** GOODS RECEIVED NOTE */
        Route::namespace('GoodsReceived')->group(function () {

            Route::resource('goods-received', 'GoodsReceivedController');
            Route::put('goods-received/{goodsReceived}/approve', 'GoodsReceivedController@approve')->name('goods-received.approve');

            Route::name('goods-received.')->group(function () {
                //
            });
        });

        /** PRICE LIST */

        Route::view('/price-list', 'frontend.price-list.index')->name('price-list.index');


        /** DOCUMENTS */

        Route::view('/support-documents', 'frontend.support-documents.index')->name('support-documents.index');

    });

});
