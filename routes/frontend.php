<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');

        /** INITIAL DATA */

        Route::resource('type', 'TypeController');
        Route::resource('unit', 'UnitController');
        Route::resource('level', 'LevelController');
        Route::resource('status', 'StatusController');
        Route::resource('journal', 'JournalController');

        /** POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('tax', 'TaxController');
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
        Route::resource('approval', 'ApprovalController');
        Route::resource('progress', 'ProgressController');
        Route::resource('threshold', 'ThresholdController');
        Route::resource('inspection', 'InspectionController');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);

        Route::view('/price-list', 'frontend.price-list.index')->name('price-list.index');
        Route::view('/support-documents', 'frontend.support-documents.index')->name('support-documents.index');

        /** MASTER */

        Route::resource('user', 'UserController');
        Route::resource('bpjs', 'BPJSController');
        Route::resource('bank', 'BankController');
        Route::resource('promo', 'PromoController');
        Route::resource('school', 'SchoolController');
        Route::resource('vendor', 'VendorController');
        Route::resource('branch', 'BranchController');
        Route::resource('storage', 'StorageController');
        Route::resource('license', 'LicenseController');
        // Route::resource('manhour', 'ManhourController');
        Route::resource('benefit', 'BenefitController');
        Route::resource('company', 'CompanyController');
        Route::resource('holiday', 'HolidayController');
        Route::resource('language', 'LanguageController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('facility', 'FacilityController');
        Route::resource('workshift', 'WorkshiftController');
        Route::resource('leave-type', 'LeaveTypeController');
        Route::resource('job-tittle', 'JobTittleController');
        Route::resource('department', 'DepartmentController');
        Route::resource('leave-period','LeavePeriodController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');
        Route::resource('overtime', 'OvertimeController');
        Route::post('overtime/{overtime}/approve', 'OvertimeController@approve')->name("overtime.approve");
        Route::post('overtime/{overtime}/reject', 'OvertimeController@reject')->name("overtime.reject");

        /** CERTIFICATION */

        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        /** LICENSE */

        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');

        /** WORKPACKAGE's EO-INSTRUCTIONs */

        Route::resource('eo-instruction-wp', 'EOInstructionWorkPackageController');
        Route::resource('eo-instruction-wp-successor', 'EOInstructionWorkPackageSuccessorController');
        Route::resource('eo-instruction-wp-predecessor', 'EOInstructionWorkPackagePredecessorController');

    });

});
