<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend'

    ], function () {

        require_once('print.php');

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');

        Route::resource('fax', 'FaxController');
        Route::resource('type', 'TypeController');
        Route::resource('bank', 'BankController');
        Route::resource('note', 'NoteController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('status', 'StatusController');
        Route::resource('address', 'AddressController');
        Route::resource('license', 'LicenseController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('department', 'DepartmentController');
        Route::resource('bankaccount', 'BankAccountController');
        Route::resource('manufacturer', 'ManufacturerController');
 
        Route::resource('travel-request', 'TravelRequestController');
        Route::get('get-travel-requests', 'TravelRequestController@getTravelRequest')->name('get-travel-requests');

        Route::resource('employee-history', 'EmployeeHistoryController');
        Route::get('get-employee-histories', 'EmployeeHistoryController@getEmployeeHistory')->name('get-employee-histories');

        Route::resource('hr-form-management', 'HRFormManagementController');
        Route::get('get-hr-form-managements', 'HRFormManagementController@getHRFormManagement')->name('get-hr-form-managements');

        Route::resource('monitor-attendance', 'MonitorAttendanceController');
        Route::get('get-monitor-attendances', 'MonitorAttendanceController@getMonitorAttendance')->name('get-monitor-attendances');

        Route::resource('document-management', 'DocumentManagementController');
        Route::get('get-document-managements', 'DocumentManagementController@getDocumentManagements')->name('get-document-managements');

        Route::resource('otr', 'OTRController');
        Route::get('/get-otrs', 'OTRController@getOTRs')->name('get-otrs');

        Route::resource('amel', 'AMELController');
        Route::get('/get-amels', 'AMELController@getAMELs')->name('get-amels');

        Route::resource('language', 'LanguageController');
        Route::get('/get-languages', 'LanguageController@getLanguages')->name('get-languages');

        Route::resource('document', 'DocumentController');
        Route::get('/get-documents', 'DocumentController@getDocuments')->name('get-documents');

        Route::resource('education', 'EducationController');
        Route::get('/get-educations', 'EducationController@getEducations')->name('get-educations');

        Route::resource('employee', 'EmployeeController');
        Route::get('/get-employees', 'EmployeeController@EmployeeController')->name('get-employees');

        Route::resource('certification', 'CertificationController');
        Route::get('/get-certifications', 'CertificationController@getCertifications')->name('get-certifications');

        Route::resource('general-license', 'GeneralLicenseController');
        Route::get('/get-general-licenses', 'GeneralLicenseController@getGeneralLicenses')->name('get-general-licenses');

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
        
        Route::resource('item', 'ItemController');
        Route::get('/get-items','ItemController@getItems')->name('get-items');
        Route::post('/post-photos','ItemController@postPhotos')->name('post-photos');
        Route::put('/item/{code}/update', 'ItemController@itemUpdate')->name('frontend.item.itemUpdate');

        Route::resource('workpackage', 'WorkPackageController');
        Route::get('/get-workpakages', 'WorkPackageController@getWorkPackage')->name('get-workpackages');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);
        Route::get('/get-item-categories','CategoryItemController@getCategories')->name('get-item-categories');

        Route::resource('taskcard-package', 'TaskCardPackageController');
        Route::get('/get-taskcardpackages', 'TaskCardPackageController@getTaskCardPackage')->name('get-taskcardpackages');

        Route::resource('item-unit', 'ItemUnitController')->except(['destroy']);
        Route::get('/get-uom/{code}','ItemUnitController@getUoM')->name('get-uom');
        Route::delete('/item-unit/{item_unit}/{unit}', 'ItemUnitController@destroy')->name('frontend.item-unit.destroy');

        Route::resource('item-storage', 'ItemStorageController')->except(['destroy']);
        Route::get('/get-item-storages/{code}','ItemStorageController@getItemStorages')->name('get-item-storages');
        Route::delete('/item-storage/{item_storage}/{storage}', 'ItemStorageController@destroy')->name('frontend.item-storage.destroy');

    });

});
