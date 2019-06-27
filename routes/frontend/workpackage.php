<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('WorkPackage')->group(function () {

            Route::resource('workpackage', 'WorkPackageController', [
                'parameters' => ['workpackage' => 'workPackage']
            ]);

            Route::prefix('workpackage')->group(function () {

                Route::post('/{workPackage}/taskcard', 'WorkPackageController@addTaskCard')->name('taskcard.workpackage');
                Route::delete('/{workPackage}/taskcard/{taskcard}', 'WorkPackageController@deleteTaskCard')->name('delete_taskcard.workpackage');
                Route::put('/{workPackage}/sequence/{taskcard}', 'WorkPackageController@sequence')->name('sequence.workpackage');
                Route::put('/{workPackage}/mandatory/{taskcard}', 'WorkPackageController@mandatory')->name('mandatory.workpackage');

                /** Summary */
                Route::get('/{workPackage}/summary/basic', 'SummaryRoutineTaskcardController@basic')->name('summary.basic');
                Route::get('/{workPackage}/summary/sip', 'SummaryRoutineTaskcardController@sip')->name('summary.sip');
                Route::get('/{workPackage}/summary/cpcp', 'SummaryRoutineTaskcardController@cpcp')->name('summary.cpcp');
                Route::get('/{workPackage}/summary/ad-sb', 'SummaryNonRoutineTaskcardController@adsb')->name('summary.ad-sb');
                Route::get('/{workPackage}/summary/cmr-awl', 'SummaryNonRoutineTaskcardController@cmrawl')->name('summary.cmr-awl');
                Route::get('/{workPackage}/summary/si', 'SummaryNonRoutineTaskcardController@si')->name('summary.si');
                Route::get('/{workPackage}/summary/routine', 'SummaryRoutineTaskcardController@summary')->name('summary.routine');
                Route::get('/{workPackage}/summary/non-routine', 'SummaryNonRoutineTaskcardController@summary')->name('summary.nonroutine');
                Route::get('/{workPackage}/summary/', 'WorkPackageController@summary')->name('summary.workpackage');

                /** Transaction: Item */
                Route::post('/{workPackage}/item', 'WorkPackageItemsController@store')->name('item.workpackage');
                Route::delete('/{workPackage}/{item}/item/', 'WorkPackageItemsController@destroy')->name('item.workpackage.delete');

            });

        });

    });

});