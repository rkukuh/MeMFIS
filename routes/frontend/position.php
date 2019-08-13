<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('position')->group(function () {
            Route::resource('position', 'PositionController');

            Route::name('position.')->group(function () {
                Route::prefix('position')->group(function () {
                    
                    /** Polymorph */
                    Route::resource('/update-benefits', 'BenefitsPositionController');
                    // Route::resource('/{employee}/emails', 'EmployeeEmailsController');
                    // Route::resource('/{employee}/phones', 'EmployeePhonesController');
                    // Route::resource('/{employee}/websites', 'EmployeeWebsitesController');
                    // Route::resource('/{employee}/addresses', 'EmployeeAddressesController');
                    // Route::resource('/{employee}/documents', 'EmployeeDocumentsController');

                    // /** Certifications and Licenses */
                    // Route::resource('/{employee}/otr', 'EmployeeOTRController');
                    // Route::resource('/{employee}/amel', 'EmployeeAMELController');

                    // /** Transaction */
                    // Route::resource('/{employee}/history', 'EmployeeHistoryController');
                    // Route::resource('/{employee}/education', 'EmployeeEducationController');
                    // Route::resource('/{employee}/travel-request', 'EmployeeTravelRequestController');
                    // Route::resource('/{employee}/general-license', 'EmployeeGeneralLicenseController');

                });

            });
        });
    });

});