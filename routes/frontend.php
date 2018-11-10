<?php

require_once('print.php');

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');


        /** ITEM */

        Route::namespace('Item')->group(function () {

            Route::resource('item', 'ItemController');

            Route::name('item.')->group(function () {
                Route::prefix('item')->group(function () {

                    Route::resource('unit', 'ItemUnitController');
                    Route::resource('storage', 'ItemStorageController');

                });
            });

        });


        /** EMPLOYEE  */

        Route::namespace('Employee')->group(function () {

            Route::resource('employee', 'EmployeeController');

            Route::name('employee.')->group(function () {
                Route::prefix('employee')->group(function () {

                    Route::resource('history', 'EmployeeHistoryController');
                    Route::resource('document', 'EmployeeDocumentController');
                    Route::resource('travel-request', 'EmployeeTravelRequestController');

                });
            });

        });


        Route::view('/qualification', 'frontend.personal-information.qualifications.index')->name('qualification');
        Route::view('/personal-dashboard', 'frontend.personal-information.dashboard.index')->name('personal-dashboard');
        Route::view('/emergency-contacts', 'frontend.personal-information.emergency-contacts.index')->name('emergency-contacts');
        Route::view('/dependents', 'frontend.personal-information.dependents.index')->name('dependents');
        Route::view('/basic-information', 'frontend.personal-information.basic-information.index')->name('basic-information');

        Route::resource('fax', 'FaxController');
        Route::resource('type', 'TypeController');
        Route::resource('bank', 'BankController');
        Route::resource('note', 'NoteController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('level', 'LevelController');
        Route::resource('status', 'StatusController');
        Route::resource('address', 'AddressController');
        Route::resource('license', 'LicenseController');
        Route::resource('version', 'VersionController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('taskcard', 'TaskCardController');
        Route::resource('department', 'DepartmentController');
        Route::resource('ame-license', 'AmeLicenseController');
        Route::resource('bank-account', 'BankAccountController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');
        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        //HR Forms
        Route::resource('hr-form', 'HRFormController');
        Route::get('get-hr-forms', 'HRFormController@getHRForms')->name('get-hr-forms');

        //Monitor Attendance
        Route::resource('monitor-attendance', 'MonitorAttendanceController');
        Route::get('get-monitor-attendances', 'MonitorAttendanceController@getMonitorAttendances')->name('get-monitor-attendances');

        Route::resource('current-clocked-in-status', 'CurrentClockedInStatusController');
        Route::get('get-current-clocked-in-status', 'CurrentClockedInStatusController@getCurrentClockedInStatus')->name('get-current-clocked-in-status');

        //DocumentManagement
        Route::resource('company-document', 'CompanyDocumentController');
        Route::get('get-company-documents', 'CompanyDocumentController@getCompanyDocuments')->name('get-company-documents');

        Route::resource('document-type', 'DocumentTypeController');
        Route::get('get-document-types', 'DocumentTypeController@getDocumentTypes')->name('get-document-types');

        Route::resource('amel', 'AMELController');
        Route::get('/get-amels', 'AMELController@getAMELs')->name('get-amels');

        Route::resource('language', 'LanguageController');
        Route::get('/get-languages', 'LanguageController@getLanguages')->name('get-languages');

        Route::resource('document', 'DocumentController');
        Route::get('/get-documents', 'DocumentController@getDocuments')->name('get-documents');

        Route::resource('education', 'EducationController');
        Route::get('/get-educations', 'EducationController@getEducations')->name('get-educations');

        Route::resource('certification', 'CertificationController');
        Route::get('/get-certifications', 'CertificationController@getCertifications')->name('get-certifications');

        Route::resource('general-license', 'GeneralLicenseController')->except(['edit']);
        Route::get('/get-general-licenses', 'GeneralLicenseController@getGeneralLicenses')->name('get-general-licenses');
        Route::get('/general-license/{generallicense}/{employee}/edit', 'GeneralLicenseController@edit')->name('frontend.general-license.edit');
        Route::delete('/general-license/{generallicense}/{employee}', 'GeneralLicenseController@destroy')->name('frontend.general-license.destroy');

        Route::resource('emergency-contact', 'EmergencyContactController');
        Route::get('/get-emergency-contacts', 'EmergencyContactController@getEmergencyContacts')->name('get-emergency-contacts');

        Route::resource('terminated-employee-data', 'TerminatedEmployeeDataController');
        Route::get('/get-terminated-employee-datas', 'TerminatedEmployeeDataController@getTerminatedEmployeeDatas')->name('get-terminated-employee-datas');

        Route::resource('tamporarily-deactivated-employee', 'TamporarilyDeactivatedEmployeeController');
        Route::get('/get-tamporarily-deactivated-employees', 'TamporarilyDeactivatedEmployeeController@getTamporarilyDeactivatedEmployees')->name('get-tamporarily-deactivated-employees');

        Route::resource('audit', 'AuditController');
        Route::get('/get-audits','AuditController@getAudits')->name('get-audits');

        Route::resource('storages', 'StorageController');
        Route::get('/get-storages','StorageController@getStorages')->name('get-storages');

        Route::resource('journal', 'JournalController');
        Route::get('/get-journals', 'JournalController@getJournals')->name('get-journals');

        Route::resource('customer', 'CustomerController');
        Route::get('/get-customers','CustomerController@getCustomers')->name('get-customers');

        Route::resource('supplier', 'SupplierController');
        Route::get('/get-suppliers','SupplierController@getSuppliers')->name('get-suppliers');

        Route::resource('taskcard', 'TaskCardController');
        Route::get('/get-taskcards', 'TaskCardController@getTaskCards')->name('get-taskcards');

        Route::resource('quotation', 'QuotationController');
        Route::get('/get-quotations', 'QuotationController@getQuotations')->name('get-quotations');

        Route::post('/post-photos','ItemController@postPhotos')->name('post-photos');

        Route::resource('workpackage', 'WorkPackageController');
        Route::get('/get-workpakages', 'WorkPackageController@getWorkPackage')->name('get-workpackages');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);
        Route::get('/get-item-categories','CategoryItemController@getCategories')->name('get-item-categories');

        Route::resource('taskcard-package', 'TaskCardPackageController');
        Route::get('/get-taskcardpackages', 'TaskCardPackageController@getTaskCardPackage')->name('get-taskcardpackages');
    });

});
