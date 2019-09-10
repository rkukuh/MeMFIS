<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Employee')->group(function () {

            Route::resource('employee', 'EmployeeController');
            Route::resource('statuses', 'EmployeeStatusesController');

            Route::name('employee.')->group(function () {
                Route::prefix('employee')->group(function () {
                    
                    /** Polymorph */
                    Route::resource('/{employee}/faxes', 'EmployeeFaxesController');
                    Route::resource('/{employee}/emails', 'EmployeeEmailsController');
                    Route::resource('/{employee}/phones', 'EmployeePhonesController');
                    Route::resource('/{employee}/websites', 'EmployeeWebsitesController');
                    Route::resource('/{employee}/addresses', 'EmployeeAddressesController');
                    Route::resource('/{employee}/documents', 'EmployeeDocumentsController');

                    /** Certifications and Licenses */
                    Route::resource('/{employee}/otr', 'EmployeeOTRController');
                    Route::resource('/{employee}/amel', 'EmployeeAMELController');

                    /** Transaction */
                    Route::resource('/{employee}/history', 'EmployeeHistoryController');
                    Route::resource('/{employee}/education', 'EmployeeEducationController');
                    Route::post('/{employee}/education/{education}/update-document','EmployeeEducationController@update_file');
                    Route::resource('/{employee}/travel-request', 'EmployeeTravelRequestController');
                    Route::resource('/{employee}/general-license', 'EmployeeGeneralLicenseController');
                    Route::resource('/{employee}/benefit-salary', 'EmployeeBenefitController');
                    Route::post('/{employee}/update-id-card','EmployeeController@update_file');
                    Route::post('/{employee}/benefit-approval', 'EmployeeBenefitController@approval');
                    Route::post('/{employee}/benefit-reject', 'EmployeeBenefitController@reject');
                    Route::resource('/{employee}/account', 'EmployeeUserController');
                    Route::resource('/{employee}/bank', 'EmployeeBankController');
                    Route::resource('/{employee}/workshift', 'EmployeeWorkshiftController');
                    Route::resource('/{employee}/termiantion', 'EmployeeTerminationController');
                });

            });

        });

    });

});