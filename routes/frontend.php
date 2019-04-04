<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');
        Route::view('/project/hm', 'frontend.project.hm.index')->name('hm');
        Route::view('/project/hm/create', 'frontend.project.hm.create')->name('hm.create');
        Route::view('/project/hm/show', 'frontend.project.hm.show')->name('hm.show');
        Route::view('/project/workshop', 'frontend.project.workshop.index')->name('workshop');
        Route::view('/project/workshop/create', 'frontend.project.workshop.create')->name('workshop.create');
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
        Route::resource('category', 'CategoryController');
        Route::resource('document', 'DocumentController');
        Route::resource('threshold', 'ThresholdController');

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
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');

        /** LICENSE */

        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');

        /** CERTIFICATION */

        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        /** TRANSACTION */
        Route::namespace('Project')->group(function () {

            Route::view('/project', 'frontend.project.index')->name('project.index');
            Route::view('/project/datatable', 'frontend.project.datatable')->name('project.datatable');

            Route::resource('project-hm', 'ProjectHMController', [
                'parameters' => ['project-hm' => 'project']
            ]);
            Route::resource('project-workshop', 'ProjectWorkshopController', [
                'parameters' => ['project-workshop' => 'project']
            ]);

            Route::post('project-workpackage/{project}', 'BlankWorkPackageController@store')->name('project-workpackage.store');
            Route::get('project/{project}/workpackage','BlankWorkPackageController@create')->name('project-workpackage.create');
            Route::get('project/{project}/workpackage/{workPackage}/edit','BlankWorkPackageController@edit')->name('project-workpackage.edit');

            Route::prefix('project')->group(function () {
                Route::post('/{project}/workPackage', 'ProjectHMController@addWorkPackage')->name('workpackage.project');
                Route::delete('/{project}/workPackage/{workPackage}', 'ProjectHMController@deleteWorkPackage')->name('delete.workpackage.project');
            });


        });


        Route::resource('quotation', 'QuotationController');
        Route::get('quotation/{project}/project', 'QuotationController@project')->name('quotation.project');

        /** AIRCRAFT */

        Route::namespace('Aircraft')->group(function () {

            Route::resource('aircraft', 'AircraftController');

            Route::name('aircraft.')->group(function () {
                Route::prefix('aircraft')->group(function () {

                    /** Polymorph */
                    Route::resource('/{aircraft}/zones', 'AircraftZonesController');
                    Route::resource('/{aircraft}/accesses', 'AircraftAccessesController');

                });
            });

        });

        /** WORKPACKAGE */

        Route::namespace('WorkPackage')->group(function () {
            Route::resource('workpackage', 'WorkPackageController', [
                'parameters' => ['workpackage' => 'workPackage']
            ]);

            Route::prefix('WorkPackage')->group(function () {

                Route::post('/{workPackage}/taskcard', 'WorkPackageController@addTaskCard')->name('taskcard.workpackage');
                Route::delete('/{workPackage}/taskcard/{taskcard}', 'WorkPackageController@deleteTaskCard')->name('delete_taskcard.workpackage');

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

            Route::resource('jobcard-ppc', 'JobCardController', [
                'parameters' => ['jobcard-ppc' => 'jobcard']
            ]);

            Route::resource('jobcard-engineer', 'JobCardEngineerController', [
                'parameters' => ['jobcard-engineer' => 'jobcard']
            ]);

            Route::resource('jobcard-mechanic', 'JobCardMechanicController', [
                'parameters' => ['jobcard-mechanic' => 'jobcard']
            ]);

            Route::name('jobcard.')->group(function () {
                Route::prefix('jobcard')->group(function () {

                    /** Transaction */
                    Route::resource('/{jobcard}/progress', 'JobCardProgressController');
                    Route::resource('/{jobcard}/inspect', 'JobCardInspectController');

                });
            });

        });

        /** PURCHASE REQUEST */

        Route::resource('purchase-request', 'PurchaseRequestController');
        Route::put('purchase-request/{purchaseRequest}/approve', 'PurchaseRequestController@approve')->name('purchase-request.approve');

        /** PURCHASE ORDER */

        Route::resource('purchase-order', 'PurchaseOrderController');
        Route::put('purchase-order/{purchaseOrder}/approve', 'PurchaseOrderController@approve')->name('purchase-order.approve');

        /** GOODS RECEIVED NOTE */

        Route::resource('goods-received', 'GoodsReceivedController');
        Route::put('goods-received/{goodsReceived}/approve', 'GoodsReceivedController@approve')->name('goods-received.approve');

        /** WORK PACKAGE */

        Route::view('/summary/basic', 'frontend.workpackage.routine.basic.basic-summary')->name('summary.basic');
        Route::view('/summary/sip', 'frontend.workpackage.routine.sip.sip-summary')->name('summary.sip');
        Route::view('/summary/cpcp', 'frontend.workpackage.routine.cpcp.cpcp-summary')->name('summary.cpcp');
        Route::view('/summary/ad-sb', 'frontend.workpackage.nonroutine.adsb.ad-sb-summary')->name('summary.ad-sb');
        Route::view('/summary/cmr-awl', 'frontend.workpackage.nonroutine.cmrawl.cmr-awl-summary')->name('summary.cmr-awl');
        Route::view('/summary/si', 'frontend.workpackage.nonroutine.si.si-summary')->name('summary.si');
        Route::view('/summary/workpackage-summary', 'frontend.workpackage.summary')->name('summary.workpackage-summary');
        Route::view('/summary/routine-summary', 'frontend.workpackage.routine.summary')->name('summary.routine-summary');
        Route::view('/summary/nonroutine-summary', 'frontend.workpackage.nonroutine.summary')->name('summary.nonroutine-summary');

        /** PRICE LIST */

        Route::view('/price-list', 'frontend.price-list.index')->name('price-list.index');

        /** QUOTATION */

        Route::view('/quotation-view/workpackage', 'frontend.quotation.workpackage')->name('quotation.workpackage');
        Route::view('/quotation-view/summary/basic', 'frontend.quotation.routine.basic.basic-summary')->name('quotation.summary.basic');
        Route::view('/quotation-view/summary/sip', 'frontend.quotation.routine.sip.sip-summary')->name('quotation.summary.sip');
        Route::view('/quotation-view/summary/cpcp', 'frontend.quotation.routine.cpcp.cpcp-summary')->name('quotation.summary.cpcp');
        Route::view('/quotation-view/summary/adsb', 'frontend.quotation.nonroutine.adsb.ad-sb-summary')->name('quotation.summary.adsb');
        Route::view('/quotation-view/summary/cmrawl', 'frontend.quotation.nonroutine.cmrawl.cmr-awl-summary')->name('quotation.summary.cmrawl');
        Route::view('/quotation-view/summary/si', 'frontend.quotation.nonroutine.si.si-summary')->name('quotation.summary.si');

        /** PRICE LIST */

        Route::view('/support-documents', 'frontend.support-documents.index')->name('support-documents.index');

    });

});
