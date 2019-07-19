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
        Route::resource('zone', 'ZoneController');
        Route::resource('email', 'EmailController');
        Route::resource('phone', 'PhoneController');
        Route::resource('price', 'PriceController');
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

        /** MASTER */

        Route::resource('item', 'ItemController');
        Route::resource('school', 'SchoolController');
        Route::resource('vendor', 'VendorController');
        Route::resource('storage', 'StorageController');
        Route::resource('license', 'LicenseController');
        Route::resource('aircraft', 'AircraftController');
        Route::resource('language', 'LanguageController');
        Route::resource('customer', 'CustomerController');
        Route::resource('employee', 'EmployeeController');
        Route::resource('facility', 'FacilityController');
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

        /** TRANSACTION */

        Route::resource('rts', 'RTSController');
        Route::resource('htcrr', 'HtCrrController');
        Route::resource('project', 'ProjectController');
        Route::resource('jobcard', 'JobCardController');
        Route::resource('taskcard', 'TaskCardController');
        Route::resource('quotation', 'QuotationController');
        Route::resource('defectcard', 'DefectCardController');
        Route::resource('workpackage', 'WorkPackageController');
        Route::resource('eo-instruction', 'EOInstructionController');
        Route::resource('goods-received', 'GoodsReceivedController');
        Route::resource('purchase-order', 'PurchaseRequestController');
        Route::resource('purchase-request', 'PurchaseOrderController');

        /** PROJECT'S WORKPACKAGEs */

        Route::resource('project-workpackage', 'ProjectWorkPackageController');
        Route::resource('project-workpackage-manhour', 'ProjectWorkPackageManhourController');
        Route::resource('project-workpackage-engineer', 'ProjectWorkPackageEngineerController');
        Route::resource('project-workpackage-facility', 'ProjectWorkPackageFacilityController');

        /** WORKPACKAGE's TASKCARDs */

        Route::resource('taskcard-workpackage', 'TaskCardWorkPackageController');
        Route::resource('taskcard-workpackage-predecessor', 'TaskCardWorkPackagePredecessorController');
        Route::resource('taskcard-workpackage-successor', 'TaskCardWorkPackageSuccessorController');

        /** QUOTATION's WORKPACKAGEs */

        Route::resource('quotation-workpackage', 'QuotationWorkPackageController');
        Route::resource('quotation-workpackage-item', 'QuotationWorkPackageItemController');

        /** QUOTATION's WORKPACKAGE's TASKCARD's */

        Route::resource('qtn-wp-tc-item', 'QuotationWorkPackageTaskCardItemController');

        /** QUOTATION's WORKPACKAGE's HT/CRR's */

        Route::resource('qtn-wp-htcrr-item', 'QuotationWorkPackageHtcrrItemController');

    });

});
