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

        Route::view('/price-list', 'frontend.price-list.index')->name('price-list.index');
        Route::view('/support-documents', 'frontend.support-documents.index')->name('support-documents.index');

        /** MASTER */

        Route::resource('user', 'UserController');
        Route::resource('school', 'SchoolController');
        Route::resource('vendor', 'VendorController');
        Route::resource('storage', 'StorageController');
        Route::resource('license', 'LicenseController');
        Route::resource('language', 'LanguageController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('facility', 'FacilityController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');
        Route::resource('leave-period','LeavePeriodController');
        Route::resource('leave-type','LeaveTypeController');
        Route::resource('company', 'CompanyController');
        Route::resource('department', 'DepartmentController');
        Route::resource('benefit', 'BenefitController');
        

        /** CERTIFICATION */

        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        /** LICENSE */

        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');

        /** Jobcard EO */

        Route::view('/jobcard-eo', 'frontend.job-card-eo.index')->name('jobcard-eo.index');

        Route::view('/jobcard-eo-mechanic-progress-open', 'frontend.job-card-eo.mechanic.progress-open')->name('jobcard-eo.mechanic.progress-open');
        Route::view('/jobcard-eo-mechanic-progress-resume', 'frontend.job-card-eo.mechanic.progress-resume')->name('jobcard-eo.mechanic.progress-resume');
        Route::view('/jobcard-eo-mechanic-progress-pause', 'frontend.job-card-eo.mechanic.progress-pause')->name('jobcard-eo.mechanic.progress-pause');

        Route::view('/jobcard-eo-engineer-progress-open', 'frontend.job-card-eo.engineer.progress-open')->name('jobcard-eo.engineer.progress-open');
        Route::view('/jobcard-eo-engineer-progress-resume', 'frontend.job-card-eo.engineer.progress-resume')->name('jobcard-eo.engineer.progress-resume');
        Route::view('/jobcard-eo-engineer-progress-pause', 'frontend.job-card-eo.engineer.progress-pause')->name('jobcard-eo.engineer.progress-pause');

        Route::view('/jobcard-eo-ppc', 'frontend.job-card-eo-ppc.index')->name('jobcard-eo.ppc.index');

        /** Work Progress Report */

        Route::view('/work-progress-report', 'frontend.work-progress-report.index')->name('work-progress-report.index');
        Route::view('/work-progress-report/show', 'frontend.work-progress-report.show')->name('work-progress-report.show');

        /** Additional Task */

        Route::view('/additional-task', 'frontend.project.hm-additional.index')->name('additional-task.index');
        Route::view('/additional-task/create', 'frontend.project.hm-additional.create')->name('additional-task.create');
        Route::view('/additional-task/edit', 'frontend.project.hm-additional.edit')->name('additional-task.edit');
        Route::view('/additional-task/show', 'frontend.project.hm-additional.show')->name('additional-task.show');
        Route::view('/additional-task/summary', 'frontend.project.hm-additional.summary')->name('additional-task.summary');

        /** Additional Task Quotation*/
        
        Route::view('/additional-task-qtn/create', 'frontend.quotation.additional.create')->name('additional-task-qtn.create');
        Route::view('/additional-task-qtn/edit', 'frontend.quotation.additional.edit')->name('additional-task-qtn.edit');
        Route::view('/additional-task-qtn/show', 'frontend.quotation.additional.show')->name('additional-task-qtn.show');

        /** Purchase Request */

        Route::view('/purchase-request/general/create', 'frontend.purchase-request.general.create')->name('purchase-request.general.create');
        Route::view('/purchase-request/general/edit', 'frontend.purchase-request.general.edit')->name('purchase-request.general.edit');
        Route::view('/purchase-request/general/show', 'frontend.purchase-request.general.show')->name('purchase-request.general.show');

        Route::view('/purchase-request/project/create', 'frontend.purchase-request.project.create')->name('purchase-request.project.create');
        Route::view('/purchase-request/project/edit', 'frontend.purchase-request.project.edit')->name('purchase-request.project.edit');
        Route::view('/purchase-request/project/show', 'frontend.purchase-request.project.show')->name('purchase-request.project.show');

        /** Material Request */

        Route::view('/material-request', 'frontend.material-request.index')->name('material-request.index');

        Route::view('/material-request/general/create', 'frontend.material-request.general.create')->name('material-request.general.create');
        Route::view('/material-request/general/edit', 'frontend.material-request.general.edit')->name('material-request.general.edit');
        Route::view('/material-request/general/show', 'frontend.material-request.general.show')->name('material-request.general.show');

        Route::view('/material-request/project/create', 'frontend.material-request.project.create')->name('material-request.project.create');
        Route::view('/material-request/project/edit', 'frontend.material-request.project.edit')->name('material-request.project.edit');
        Route::view('/material-request/project/show', 'frontend.material-request.project.show')->name('material-request.project.show');

        /** Tool Request */

        Route::view('/tool-request', 'frontend.tool-request.index')->name('tool-request.index');

        Route::view('/tool-request/general/create', 'frontend.tool-request.general.create')->name('tool-request.general.create');
        Route::view('/tool-request/general/edit', 'frontend.tool-request.general.edit')->name('tool-request.general.edit');
        Route::view('/tool-request/general/show', 'frontend.tool-request.general.show')->name('tool-request.general.show');

        Route::view('/tool-request/project/create', 'frontend.tool-request.project.create')->name('tool-request.project.create');
        Route::view('/tool-request/project/edit', 'frontend.tool-request.project.edit')->name('tool-request.project.edit');
        Route::view('/tool-request/project/show', 'frontend.tool-request.project.show')->name('tool-request.project.show');

        /** Inventory In */

        Route::view('/inventory-in', 'frontend.inventory-in.index')->name('inventory-in.index');
        Route::view('/inventory-in/create', 'frontend.inventory-in.create')->name('inventory-in.create');
        Route::view('/inventory-in/edit', 'frontend.inventory-in.edit')->name('inventory-in.edit');
        Route::view('/inventory-in/show', 'frontend.inventory-in.show')->name('inventory-in.show');

        /** GSE-Tool Returned */

        Route::view('/gse-tool-returned', 'frontend.gse-tool-returned.index')->name('gse-tool-returned.index');

        Route::view('/gse-tool-returned/general/create', 'frontend.gse-tool-returned.general.create')->name('gse-tool-returned.general.create');
        Route::view('/gse-tool-returned/general/edit', 'frontend.gse-tool-returned.general.edit')->name('gse-tool-returned.general.edit');
        Route::view('/gse-tool-returned/general/show', 'frontend.gse-tool-returned.general.show')->name('gse-tool-returned.general.show');

        Route::view('/gse-tool-returned/project/create', 'frontend.gse-tool-returned.project.create')->name('gse-tool-returned.project.create');
        Route::view('/gse-tool-returned/project/edit', 'frontend.gse-tool-returned.project.edit')->name('gse-tool-returned.project.edit');
        Route::view('/gse-tool-returned/project/show', 'frontend.gse-tool-returned.project.show')->name('gse-tool-returned.project.show');

        /** leave Period */

        Route::view('hr/leave-period', 'frontend.leave-period.index')->name('hr.leave-period.index');
        Route::view('hr/leave-period/create', 'frontend.leave-period.create')->name('hr.leave-period.create');
        Route::view('hr/leave-period/show', 'frontend.leave-period.show')->name('hr.leave-period.show');


        /** leave Types */

        Route::view('hr/leave-types', 'frontend.leave-types.index')->name('hr.leave-types.index');
        Route::view('hr/leave-types/create', 'frontend.leave-types.create')->name('hr.leave-types.create');
        Route::view('hr/leave-types/show', 'frontend.leave-types.show')->name('hr.leave-types.show');

        /** Event/Holidays */

        Route::view('hr/event-holidays', 'frontend.event-holidays.index')->name('hr.event-holidays.index');
        Route::view('hr/event-holidays/create', 'frontend.event-holidays.create')->name('hr.event-holidays.create');
        Route::view('hr/event-holidays/show', 'frontend.event-holidays.show')->name('hr.event-holidays.show');
        Route::view('hr/event-holidays/edit', 'frontend.event-holidays.edit')->name('hr.event-holidays.edit');

        /** Workshift Schedule */

        Route::view('hr/workshift-schedule', 'frontend.workshift-schedule.index')->name('hr.workshift-schedule.index');
        Route::view('hr/workshift-schedule/create', 'frontend.workshift-schedule.create')->name('hr.workshift-schedule.create');
        Route::view('hr/workshift-schedule/show', 'frontend.workshift-schedule.show')->name('hr.workshift-schedule.show');
        
        
        /** QUOTATION's WORKPACKAGE's TASKCARDs */

        Route::resource('qtn-wp-tc-item', 'QuotationWorkPackageTaskCardItemController');

        /** QUOTATION's HT/CRRs */

        Route::resource('qtn-htcrr-item', 'QuotationHtcrrItemController');

        /** QUOTATION's DEFECTCARDs */

        Route::resource('qtn-defectcard-item', 'QuotationDefectCardItemController');

    });

});
