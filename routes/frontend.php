<?php

require_once('print.php');

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::view('/dashboard', 'frontend.dashboard')->name('dashboard');
        Route::view('/project/hm', 'frontend.project.hm.index')->name('hm');
        Route::view('/project/hm/create', 'frontend.project.hm.create')->name('hm.create');
        Route::view('/project/workshop', 'frontend.project.workshop.index')->name('workshop');
        Route::view('/project/workshop/create', 'frontend.project.workshop.create')->name('workshop.create');

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
        Route::resource('address', 'AddressController');
        Route::resource('version', 'VersionController');
        Route::resource('website', 'WebsiteController');
        Route::resource('category', 'CategoryController');
        Route::resource('document', 'DocumentController');
        Route::resource('maintenance-cycle', 'MaintenanceCycleController');

        Route::resource('category-item', 'CategoryItemController', [
            'parameters' => ['category-item' => 'category']
        ]);

        /** MASTER */

        Route::resource('user', 'UserController');
        Route::resource('school', 'SchoolController');
        Route::resource('storage', 'StorageController');
        Route::resource('license', 'LicenseController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('language', 'LanguageController');
        Route::resource('supplier', 'SupplierController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('department', 'DepartmentController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('certification', 'CertificationController');

        /** LICENSE */

        Route::resource('general-license', 'GeneralLicenseController');
        Route::resource('employee-license', 'EmployeeLicenseController');

        /** CERTIFICATION */

        Route::resource('otr-certification', 'OTRCertificationController');
        Route::resource('certification-employee', 'CertificationEmployeeController');

        /** TRANSACTION */

        Route::resource('project', 'ProjectController');
        Route::resource('taskcard', 'TaskCardController');
        Route::resource('quotation', 'QuotationController');
        Route::get('quotation/{project}/project', 'QuotationController@project')->name('quotation.project');
        Route::resource('workpackage', 'WorkPackageController');

        /** AIRCRAFT  */

        Route::namespace('Aircraft')->group(function () {

            Route::resource('aircraft', 'AircraftController');

            Route::name('aircraft.')->group(function () {
                Route::prefix('aircraft')->group(function () {

                    /** Polymorph */
                    Route::resource('/{aircraft}/zones','AircraftZonesController');
                    Route::resource('/{aircraft}/accesses','AircraftAccessesController');

                });
            });

        });

        /** ITEM */

        Route::namespace('Item')->group(function () {

            Route::resource('item', 'ItemController');

            Route::name('item.')->group(function () {
                Route::prefix('item')->group(function () {

                    /** Transaction: Unit */
                    Route::post('/{item}/unit', 'ItemUnitController@store')->name('unit.store');
                    Route::delete('/{item}/{unit}/unit', 'ItemUnitController@destroy')->name('unit.destroy');

                    /** Transaction: Storage */
                    Route::post('/{item}/storage', 'ItemStorageController@store')->name('storage.store');
                    Route::put('/{item}/storage', 'ItemStorageController@update')->name('storage.update');
                    Route::delete('/{item}/{storage}/storage', 'ItemStorageController@destroy')->name('storage.destroy');

                });
            });

        });

        /** CUSTOMER  */

        Route::namespace('Customer')->group(function () {

            Route::resource('customer', 'CustomerController');

            Route::name('customer.')->group(function () {
                Route::prefix('customer')->group(function () {

                    /** Polymorph */
                    Route::resource('/{customer}/faxes','CustomerFaxesController');
                    Route::resource('/{customer}/emails','CustomerEmailsController');
                    Route::resource('/{customer}/phones','CustomerPhonesController');
                    Route::resource('/{customer}/websites','CustomerWebsitesController');
                    Route::resource('/{customer}/addresses','CustomerAddressesController');
                    Route::resource('/{customer}/documents','CustomerDocumentsController');

                });
            });

        });

        /** EMPLOYEE  */

        Route::namespace('Employee')->group(function () {

            Route::resource('employee', 'EmployeeController');

            Route::name('employee.')->group(function () {
                Route::prefix('employee')->group(function () {

                    /** Polymorph */
                    Route::resource('/{employee}/faxes','EmployeeFaxesController');
                    Route::resource('/{employee}/emails','EmployeeEmailsController');
                    Route::resource('/{employee}/phones','EmployeePhonesController');
                    Route::resource('/{employee}/websites','EmployeeWebsitesController');
                    Route::resource('/{employee}/addresses','EmployeeAddressesController');
                    Route::resource('/{employee}/documents','EmployeeDocumentsController');

                    /** Certifications and Licenses */
                    Route::resource('/{employee}/otr', 'EmployeeOTRController');
                    Route::resource('/{employee}/amel', 'EmployeeAMELController');

                    /** Transaction */
                    Route::resource('/{employee}/history', 'EmployeeHistoryController');
                    Route::resource('/{employee}/education', 'EmployeeEducationController');
                    Route::resource('/{employee}/travel-request', 'EmployeeTravelRequestController');
                    Route::resource('/{employee}/general-license', 'EmployeeGeneralLicenseController');

                });
            });

        });

    });

});
