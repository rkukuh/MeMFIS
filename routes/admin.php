<?php

Route::name('admin.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'prefix'        => 'admin',
        'namespace'     => 'Admin',

    ], function () {

        /** INITIAL DATA */

        Route::resource('type', 'TypeController');
        Route::resource('unit', 'UnitController');
        Route::resource('level', 'LevelController');
        Route::resource('status', 'StatusController');
        Route::resource('journal', 'JournalController');
        Route::resource('currency', 'CurrencyController');

        /** POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('address', 'AddressController');
        Route::resource('version', 'VersionController');
        Route::resource('website', 'WebsiteController');
        Route::resource('category', 'CategoryController');
        Route::resource('document', 'DocumentController');
        Route::resource('maintenance-cycle', 'MaintenanceCycleController');

        /** MASTER */

        Route::resource('item', 'ItemController');
        Route::resource('school', 'SchoolController');
        Route::resource('storage', 'StorageController');
        Route::resource('license', 'LicenseController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('language', 'LanguageController');
        Route::resource('customer', 'CustomerController');
        Route::resource('supplier', 'SupplierController');
        Route::resource('employee', 'EmployeeController');
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('aircraft-zone', 'AircraftZoneController');
        Route::resource('certification', 'CertificationController');

        /** LICENSE */

        Route::resource('amel', 'AmelController');
        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');

        /** CERTIFICATION */

        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        /** TRANSACTION */

        Route::resource('project', 'ProjectController');
        Route::resource('taskcard', 'TaskCardController');
        Route::resource('quotation', 'QuotationController');
        Route::resource('workpackage', 'WorkPackageController');

    });

});
