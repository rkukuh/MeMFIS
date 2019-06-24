<?php

Route::name('component.')->group(function () {

    Route::view('/update-button', 'frontend.common.buttons.update')->name('button-update');
    Route::view('/submit-button', 'frontend.common.buttons.submit')->name('button-submit');


    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend'

    ], function () {

        Route::get('get-tags', 'FillComboxController@tags')->name('get-tags');
        Route::get('get-employees', 'FillComboxController@employee')->name('get-employee');
        Route::get('get-tools', 'FillComboxController@tool')->name('get-tool');
        Route::get('get-zones', 'FillComboxController@zone')->name('get-zones');
        Route::get('get-items', 'FillComboxController@item')->name('get-items');
        Route::get('get-units', 'FillComboxController@units')->name('get-units');
        Route::get('get-vendors', 'FillComboxController@vendor')->name('get-vendor');
        Route::get('get-projects', 'FillComboxController@project')->name('get-project');
        Route::get('get-accesses', 'FillComboxController@access')->name('get-accesses');
        Route::get('get-materials', 'FillComboxController@material')->name('get-material');
        Route::get('get-aircrafts', 'FillComboxController@aircraft')->name('get-aircrafts');
        Route::get('get-customers', 'FillComboxController@customer')->name('get-customers');
        Route::get('get-taskcards', 'FillComboxController@taskcard')->name('get-taskcards');
        Route::get('get-task-types', 'FillComboxController@taskType')->name('get-task-types');
        Route::get('get-unit-types', 'FillComboxController@unitType')->name('get-unit-types');
        Route::get('get-work-areas', 'FillComboxController@workArea')->name('get-work-areas');
        Route::get('get-facilities', 'FillComboxController@facility')->name('get-facilities');
        Route::get('get-work-orders', 'FillComboxController@workOrder')->name('get-work-orders');
        Route::get('get-licenses/{id}', 'FillComboxController@licenses')->name('get-licenses');
        Route::get('get-currencies', 'FillComboxController@currencies')->name('get-currencies');
        Route::get('get-recurrences', 'FillComboxController@recurrence')->name('get-recurrences');
        Route::get('get-storages-combobox', 'FillComboxController@storages')->name('get-storages');
        Route::get('get-repeat-types', 'FillComboxController@repeatType')->name('get-repeat-types');
        Route::get('get-categories-item', 'FillComboxController@categories')->name('get-categories');
        Route::get('get-payment-term', 'FillComboxController@paymentTerm')->name('get-payment-term');
        Route::get('get-accountcodes', 'FillComboxController@accountCodes')->name('get-accountcodes');
        Route::get('get-website-types', 'FillComboxController@websiteType')->name('get-website-types');
        Route::get('get-employees-data', 'FillComboxController@employees')->name('get-employees-data');
        Route::get('get-address-types', 'FillComboxController@addressType')->name('get-address-types');
        Route::get('get-account-codes', 'AccountCodeController@getJournals')->name('get-account-codes');
        Route::get('get-manufacturers', 'FillComboxController@manufacturer')->name('get-manufacturers');
        Route::get('get-takcard-types', 'FillComboxController@taskcardType')->name('get-takcard-types');
        Route::get('get-customer-level', 'FillComboxController@customerLevel')->name('get-customer-level');
        Route::get('get-threshold-types', 'FillComboxController@thresholdType')->name('get-threshold-types');
        Route::get('get-gnrl-license/{id}', 'FillComboxController@generalLicenses')->name('get-gnrl-license');
        Route::get('get-aviation-degree', 'FillComboxController@aviationDegrees')->name('get-eaviation-degree');
        Route::get('get-manual-affecteds', 'FillComboxController@manualAffected')->name('get-manual-affecteds');
        Route::get('get-category-taskcard', 'FillComboxController@categorieTakcard')->name('get-category-taskcard');
        Route::get('get-otr-certifications', 'FillComboxController@otrCertification')->name('get-otr-certifications');
        Route::get('get-aircraft-taskcards', 'FillComboxController@aircraftTaskcard')->name('get-aircraft-taskcards');
        Route::get('get-categories-material', 'FillComboxController@categoriesMaterial')->name('get-categoriesMaterial');
        Route::get('get-scheduled-priorities', 'FillComboxController@scheduledPriority')->name('get-scheduled-priorities');
        Route::get('get-takcard-routine-types', 'FillComboxController@taskcardTypeRoutine')->name('get-takcard-routine-types');
        Route::get('get-applicability-engines', 'FillComboxController@applicabilityEngine')->name('get-applicability-engines');
        Route::get('get-taskcard-relationships', 'FillComboxController@taskcardRelationship')->name('get-taskcard-relationships');
        Route::get('get-scheduled-payment-types', 'FillComboxController@scheduledPaymentType')->name('get-scheduled-payment-types');
        Route::get('get-takcard-non-routine-types', 'FillComboxController@taskcardTypeNonRoutine')->name('get-takcard-non-routine-types');
        Route::get('get-takcard-si-types', 'FillComboxController@taskcardTypeSI')->name('get-takcard-si-types');
        Route::get('get-takcard-preliminary-types', 'FillComboxController@taskcardTypePreliminary')->name('get-takcard-preliminary-types');

        Route::prefix('label')->group(function () {
            Route::get('get-vendors/{vendor}', 'FillLabelController@vendor')->name('get-vendor');
            Route::get('get-purchase-request/{purchaseRequest}', 'FillLabelController@purchaseRequest')->name('get-purchase-request');
            Route::get('get-customer/{customer}', 'FillLabelController@customer')->name('get-customer');
            Route::get('get-project/{project}', 'FillLabelController@project')->name('get-project');
        });
    });
});

