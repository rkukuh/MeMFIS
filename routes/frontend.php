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
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('address', 'AddressController');
        Route::resource('version', 'VersionController');
        Route::resource('website', 'WebsiteController');
        Route::resource('category', 'CategoryController');
        Route::resource('document', 'DocumentController');
        Route::resource('description', 'DescriptionController');
        Route::resource('maintenance-cycle', 'MaintenanceCycleController');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);

        /** MASTER */

        Route::resource('school', 'SchoolController');
        Route::resource('license', 'LicenseController');
        Route::resource('storages', 'StorageController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('customer', 'CustomerController');
        Route::resource('supplier', 'SupplierController');
        Route::resource('language', 'LanguageController');
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
        Route::resource('quotation', 'QuotationController');
        Route::resource('workpackage', 'WorkPackageController');

        /** ITEM */

        Route::namespace('Item')->group(function () {

            Route::resource('item', 'ItemController');

            Route::name('item.')->group(function () {
                Route::prefix('item')->group(function () {

                    Route::post('/{item}/unit', 'ItemUnitController@store')->name('unit.store');
                    Route::delete('/{item}/{unit}/unit', 'ItemUnitController@destroy')->name('unit.destroy');

                    Route::post('/{item}/storage', 'ItemStorageController@store')->name('storage.store');
                    Route::put('/{item}/storage', 'ItemStorageController@update')->name('storage.update');
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
                    Route::resource('education', 'EmployeeEducationController');
                    Route::resource('travel-request', 'EmployeeTravelRequestController');
                    Route::resource('general-license', 'EmployeeGeneralLicenseController');

                });
            });

        });
        
        Route::view('/dependents', 'frontend.personal-information.dependents.index')->name('dependents');
        Route::view('/qualification', 'frontend.personal-information.qualifications.index')->name('qualification');
        Route::view('/personal-dashboard', 'frontend.personal-information.dashboard.index')->name('personal-dashboard');
        Route::view('/basic-information', 'frontend.personal-information.basic-information.index')->name('basic-information');
        Route::view('/emergency-contacts', 'frontend.personal-information.emergency-contacts.index')->name('emergency-contacts');

        Route::view('/project', 'frontend/project/index')->name('project.index');
        Route::view('/project/hm', 'frontend.project.hm.index')->name('project-hm.index');
        Route::view('/project/hm/create', 'frontend.project.hm.create')->name('project-hm.create');
        Route::view('/project/workshop', 'frontend.project.workshop.index')->name('project-workshop.index');
        Route::view('/project/workshop/create', 'frontend.project.workshop.create')->name('project-workshop.create');

    });

});
