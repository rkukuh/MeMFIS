<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Quotation')->group(function () {

            Route::resource('quotation', 'QuotationController');
            Route::get('quotation/{project}/project', 'QuotationController@project')->name('quotation.project');

            Route::prefix('quotation')->group(function () {

                Route::get('/{quotation}/print', 'QuotationController@print');
                Route::post('/{quotation}/workpackage/{workpackage}/discount', 'QuotationController@discount')->name('quotation.discount');
                Route::post('/{quotation}/approve', 'QuotationController@approve')->name('quotation.approve');
                
                Route::name('quotation.')->group(function () {

                    Route::resource('/{quotation}/workpackage', 'QuotationWorkPackageController', [
                        'parameters' => ['workpackage' => 'workPackage']
                    ]);

                });

                Route::get('/{quotation}/workpackage/{workPackage}/summary/basic', 'SummaryRoutineTaskcardController@basic')->name('quotation.summary.basic');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/sip', 'SummaryRoutineTaskcardController@sip')->name('quotation.summary.sip');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/cpcp', 'SummaryRoutineTaskcardController@cpcp')->name('quotation.summary.cpcp');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/adsb', 'SummaryNonRoutineTaskcardController@adsb')->name('quotation.summary.adsb');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/cmrawl', 'SummaryNonRoutineTaskcardController@cmrawl')->name('quotation.summary.cmrawl');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/si', 'SummaryNonRoutineTaskcardController@si')->name('quotation.summary.si');

            });

        });

    });

});