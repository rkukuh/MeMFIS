<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Quotation')->group(function () {

            Route::resource('quotation', 'QuotationController');
            Route::get('quotation/{project}/project', 'QuotationController@project')->name('quotation.project');

            Route::resource('quotation-additional', 'QuotationAdditionalController',[
                'parameters' => ['quotation-additional' => 'quotation']
            ])->except('create');
            Route::prefix('quotation-additional')->group(function () {
                Route::get('/create/{project}','QuotationAdditionalController@create')->name('quotation-additional.create');
                Route::post('/{quotation}/discount','QuotationAdditionalController@discount')->name('quotation-additional.discount');
                Route::post('/{quotation}/approve', 'QuotationAdditionalController@approve')->name('quotation.approve');
                Route::get('/{quotation}/print', 'QuotationAdditionalController@print');
            });

            Route::prefix('quotation')->group(function () {

                Route::get('/{quotation}/print', 'QuotationController@print');
                Route::post('/{quotation}/workpackage/{workpackage}/discount', 'QuotationController@discount')->name('quotation.discount');
                Route::post('/{quotation}/workpackage/{workpackage}/discount/htcrr', 'QuotationController@discount_htcrr')->name('quotation.discount.htcrr');
                Route::post('/{quotation}/approve', 'QuotationController@approve')->name('quotation.approve');

                Route::name('quotation.')->group(function () {

                    Route::resource('/{quotation}/workpackage', 'QuotationWorkPackageController', [
                        'parameters' => ['workpackage' => 'workPackage']
                    ]);

                    Route::resource('/htcrr', 'QuotationHtcrrController', [
                        'parameters' => ['htcrr' => 'quotation']
                    ]);

                    Route::post('/{quotation}/htcrr/discount','QuotationHtcrrController@discount')->name('htcrr.discount');
                });

                Route::get('/{quotation}/workpackage/{workPackage}/summary/basic', 'SummaryRoutineTaskcardController@basic')->name('quotation.summary.basic');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/sip', 'SummaryRoutineTaskcardController@sip')->name('quotation.summary.sip');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/cpcp', 'SummaryRoutineTaskcardController@cpcp')->name('quotation.summary.cpcp');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/adsb', 'SummaryNonRoutineTaskcardController@adsb')->name('quotation.summary.adsb');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/cmrawl', 'SummaryNonRoutineTaskcardController@cmrawl')->name('quotation.summary.cmrawl');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/si', 'SummaryNonRoutineTaskcardController@si')->name('quotation.summary.si');
                Route::get('/{quotation}/workpackage/{workPackage}/summary/preliminary', 'SummaryNonRoutineTaskcardController@preliminary')->name('quotation.summary.preliminary');

                
                /** QUOTATION's DEFECTCARDs */

                Route::resource('qtn-defectcard-item', 'QuotationDefectCardItemController');
                
                /** QUOTATION's WORKPACKAGE's TASKCARDs */

                Route::resource('qtn-wp-tc-item', 'QuotationWorkPackageTaskCardItemController');

                /** QUOTATION's HT/CRRs */

                Route::resource('qtn-htcrr-item', 'QuotationHtcrrItemController');
            });

        });

    });

});
