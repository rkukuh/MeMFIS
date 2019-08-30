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
        Route::resource('school', 'SchoolController');
        Route::resource('vendor', 'VendorController');
        Route::resource('branch', 'BranchController');
        Route::resource('storage', 'StorageController');
        Route::resource('license', 'LicenseController');
        Route::resource('manhour', 'ManhourController');
        Route::resource('benefit', 'BenefitController');
        Route::resource('company', 'CompanyController');
        Route::resource('language', 'LanguageController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('facility', 'FacilityController');
        Route::resource('manhour', 'ManhourController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');
        Route::resource('leave-period','LeavePeriodController');
        Route::resource('company', 'CompanyController');
        Route::resource('department', 'DepartmentController');
        Route::resource('benefit', 'BenefitController');
        Route::resource('bpjs', 'BPJSController');
        Route::resource('job-tittle', 'JobTittleController');
        Route::resource('leave-type', 'LeaveTypeController');
        Route::resource('holiday', 'HolidayController');
        Route::resource('workshift', 'WorkshiftController');

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


        /** IMPORT FINGERPRINT MACHINE */

        Route::view('/import-fingerprint', 'frontend.import-fingerprint.index')->name('import-fingerprint.index');
        Route::view('/import-fingerprint/create', 'frontend.import-fingerprint.create')->name('import-fingerprint.create');

        /** ATTENDANCE */

        Route::view('/attendance', 'frontend.attendance.index')->name('attendance.index');

        Route::view('/attendance/overtime/create', 'frontend.attendance.overtime.create')->name('attendance.overtime.create');
        Route::view('/attendance/overtime/approve', 'frontend.attendance.overtime.approve')->name('attendance.overtime.approve');

        Route::view('/attendance/propose-leave/create', 'frontend.attendance.propose-leave.create')->name('attendance.propose-leave.create');
        Route::view('/attendance/propose-leave/approve-type-1', 'frontend.attendance.propose-leave.approve-type-1')->name('attendance.propose-leave.approve-type-1');
        Route::view('/attendance/propose-leave/approve-type-2', 'frontend.attendance.propose-leave.approve-type-2')->name('attendance.propose-leave.approve-type-2');

        Route::view('/attendance/attendance-correction/create', 'frontend.attendance.attendance-correction.create')->name('attendance.attendance-correction.create');

        /** ATTENDANCE CORRECTION */

        Route::view('/attendance-correction', 'frontend.attendance-correction.index')->name('attendance-correction.index');
        Route::view('/attendance-correction/create', 'frontend.attendance-correction.create')->name('attendance-correction.create');
        Route::view('/attendance-correction/edit', 'frontend.attendance-correction.edit')->name('attendance-correction.edit');

        /** OVERTIME */

        Route::view('/overtime', 'frontend.overtime.index')->name('overtime.index');
        Route::view('/overtime/create', 'frontend.overtime.create')->name('overtime.create');
        Route::view('/overtime/edit', 'frontend.overtime.edit')->name('overtime.edit');
        Route::view('/overtime/approve', 'frontend.overtime.approve')->name('overtime.approve');

        /** PROPOSE LEAVE */

        Route::view('/propose-leave', 'frontend.propose-leave.index')->name('propose-leave.index');
        Route::view('/propose-leave/create', 'frontend.propose-leave.create')->name('propose-leave.create');
        Route::view('/propose-leave/edit', 'frontend.propose-leave.edit')->name('propose-leave.edit');
        Route::view('/propose-leave/approve', 'frontend.propose-leave.approve')->name('propose-leave.approve');
    });

});
