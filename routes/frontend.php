<?php

require_once('print.php');

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
        Route::resource('note', 'NoteController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('address', 'AddressController');
        Route::resource('version', 'VersionController');
        Route::resource('document', 'DocumentController');
        Route::resource('maintenance-cycle', 'MaintenanceCycleController');

        /** MASTER */

        Route::resource('license', 'LicenseController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');

        /** LICENSE */

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


        /** ITEM */

        Route::namespace('Item')->group(function () {

            Route::resource('item', 'ItemController');

            Route::name('item.')->group(function () {
                Route::prefix('item')->group(function () {

                    Route::post('/{item}/unit', 'ItemUnitController@store')->name('unit.store');
                    Route::delete('/{item}/{unit}/unit', 'ItemUnitController@destroy')->name('unit.destroy');

                    Route::post('/{item}/storage', 'ItemStorageController@store')->name('storage.store');
                    Route::PUT('/{item}/storage', 'ItemStorageController@update')->name('storage.update');
                    Route::delete('/{item}/{storage}/storage', 'ItemStorageController@destroy')->name('storage.destroy');

                });
            });

        });


        /** EMPLOYEE  */

        Route::namespace('Employee')->group(function () {

            Route::resource('employee', 'EmployeeController');

            Route::name('employee.')->group(function () {
                Route::prefix('employee')->group(function () {

                    Route::resource('amel', 'EmployeeAMELController');
                    Route::resource('history', 'EmployeeHistoryController');
                    Route::resource('document', 'EmployeeDocumentController');
                    Route::resource('travel-request', 'EmployeeTravelRequestController');

                });
            });

        });

        //HR Forms
        Route::resource('hr-form', 'HRFormController');
        Route::get('get-hr-forms', 'HRFormController@getHRForms')->name('get-hr-forms');

        //Monitor Attendance
        Route::resource('monitor-attendance', 'MonitorAttendanceController');
        Route::get('get-monitor-attendances', 'MonitorAttendanceController@getMonitorAttendances')->name('get-monitor-attendances');

        //DocumentManagement
        Route::resource('company-document', 'CompanyDocumentController');
        Route::get('get-company-documents', 'CompanyDocumentController@getCompanyDocuments')->name('get-company-documents');

        Route::resource('language', 'LanguageController');
        Route::get('/get-languages', 'LanguageController@getLanguages')->name('get-languages');

        Route::resource('education', 'EducationController');
        Route::get('/get-educations', 'EducationController@getEducations')->name('get-educations');

        Route::resource('general-license', 'GeneralLicenseController')->except(['edit']);
        Route::get('/get-general-licenses', 'GeneralLicenseController@getGeneralLicenses')->name('get-general-licenses');
        Route::get('/general-license/{generallicense}/{employee}/edit', 'GeneralLicenseController@edit')->name('frontend.general-license.edit');
        Route::delete('/general-license/{generallicense}/{employee}', 'GeneralLicenseController@destroy')->name('frontend.general-license.destroy');

        Route::resource('audit', 'AuditController');
        Route::get('/get-audits','AuditController@getAudits')->name('get-audits');

        Route::resource('storages', 'StorageController');
        Route::get('/get-storages','StorageController@getStorages')->name('get-storages');

        Route::resource('customer', 'CustomerController');
        Route::get('/get-customers','CustomerController@getCustomers')->name('get-customers');

        Route::resource('supplier', 'SupplierController');
        Route::get('/get-suppliers','SupplierController@getSuppliers')->name('get-suppliers');

        Route::resource('taskcard', 'TaskCardController');
        Route::get('/get-taskcards', 'TaskCardController@getTaskCards')->name('get-taskcards');

        Route::resource('quotation', 'QuotationController');
        Route::get('/get-quotations', 'QuotationController@getQuotations')->name('get-quotations');

        Route::resource('workpackage', 'WorkPackageController');
        Route::get('/get-workpakages', 'WorkPackageController@getWorkPackage')->name('get-workpackages');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);
        Route::get('/get-item-categories','CategoryItemController@getCategories')->name('get-item-categories');

        Route::resource('taskcard-package', 'TaskCardPackageController');
        Route::get('/get-taskcardpackages', 'TaskCardPackageController@getTaskCardPackage')->name('get-taskcardpackages');

        Route::view('/qualification', 'frontend.personal-information.qualifications.index')->name('qualification');
        Route::view('/personal-dashboard', 'frontend.personal-information.dashboard.index')->name('personal-dashboard');
        Route::view('/emergency-contacts', 'frontend.personal-information.emergency-contacts.index')->name('emergency-contacts');
        Route::view('/dependents', 'frontend.personal-information.dependents.index')->name('dependents');
        Route::view('/basic-information', 'frontend.personal-information.basic-information.index')->name('basic-information');
    });

});
