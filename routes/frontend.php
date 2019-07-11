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
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');

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

        Route::view('/additional-task', 'frontend.project.additional.index')->name('additional-task.index');
        Route::view('/additional-task/create', 'frontend.project.additional.create')->name('additional-task.create');
        Route::view('/additional-task/edit', 'frontend.project.additional.edit')->name('additional-task.edit');
        Route::view('/additional-task/show', 'frontend.project.additional.show')->name('additional-task.show');
        Route::view('/additional-task/summary', 'frontend.project.additional.summary')->name('additional-task.summary');

         /** Purchase Request */

         Route::view('/purchase-request/general/create', 'frontend.purchase-request.general.create')->name('purchase-request.general.create');
         Route::view('/purchase-request/general/edit', 'frontend.purchase-request.general.edit')->name('purchase-request.general.edit');
         Route::view('/purchase-request/general/show', 'frontend.purchase-request.general.show')->name('purchase-request.general.show');

         Route::view('/purchase-request/project/create', 'frontend.purchase-request.project.create')->name('purchase-request.project.create');
         Route::view('/purchase-request/project/edit', 'frontend.purchase-request.project.edit')->name('purchase-request.project.edit');
         Route::view('/purchase-request/project/show', 'frontend.purchase-request.project.show')->name('purchase-request.project.show');

        /** QUOTATION's WORKPACKAGE's TASKCARD's */

         Route::resource('qtn-wp-tc-item', 'QuotationWorkPackageTaskCardItemController');

    });

});
