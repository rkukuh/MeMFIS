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

        /** POLYMORPH */

        Route::resource('fax', 'FaxController');
        Route::resource('note', 'NoteController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('address', 'AddressController');
        Route::resource('version', 'VersionController');
        Route::resource('document', 'VersionController');
        Route::resource('maintenance-cycle', 'MaintentanceCycleController');

        /** MASTER */

        Route::resource('item', 'ItemController');
        Route::resource('license', 'LicenseController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('employee', 'EmployeeController');
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');

        /** LICENSE */

        Route::resource('amel', 'AmelController');
        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');

        /** CERTIFICATION */

        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        /** FINANCE */

        Route::resource('bank', 'BankController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('bank-account', 'BankAccountController');

        /** TRANSACTION */

        Route::resource('taskcard', 'TaskCardController');

    });

});
