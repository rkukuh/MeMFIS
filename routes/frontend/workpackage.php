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
                Route::post('/{workPackage}/taskcard/instruction', 'WorkPackageController@addInstruction')->name('instruction.workpackage');
                Route::delete('/{workPackage}/taskcard/{taskcard}', 'WorkPackageController@deleteTaskCard')->name('delete_taskcard.workpackage');
                Route::delete('/{workPackage}/taskcard/{instruction}/instruction', 'WorkPackageController@deleteInstruction')->name('delete_instruction.workpackage');
                Route::put('/{workPackage}/sequence/{taskcard}', 'WorkPackageController@sequence')->name('sequence.workpackage');
                Route::put('/{workPackage}/mandatory/{taskcard}', 'WorkPackageController@mandatory')->name('mandatory.workpackage');
                Route::put('/{workPackage}/sequence/{instruction}/instruction', 'WorkPackageController@sequenceInstruction')->name('sequence.instruction.workpackage');
                Route::put('/{workPackage}/mandatory/{instruction}/instruction', 'WorkPackageController@mandatoryInstruction')->name('mandatory.instruction.workpackage');

                Route::name('workPackage.')->group(function () {
                /** Summary */
                    Route::get('/{workPackage}/summary/sip', 'SummaryRoutineTaskcardController@sip')->name('summary.sip');
                    Route::get('/{workPackage}/summary/cpcp', 'SummaryRoutineTaskcardController@cpcp')->name('summary.cpcp');
                    Route::get('/{workPackage}/summary/basic', 'SummaryRoutineTaskcardController@basic')->name('summary.basic');

                    Route::get('/{workPackage}/summary/si', 'SummaryNonRoutineTaskcardController@si')->name('summary.si');
                    Route::get('/{workPackage}/summary/eo', 'SummaryNonRoutineTaskcardController@eo')->name('summary.eo');
                    Route::get('/{workPackage}/summary/ea', 'SummaryNonRoutineTaskcardController@ea')->name('summary.ea');
                    Route::get('/{workPackage}/summary/ad-sb', 'SummaryNonRoutineTaskcardController@adsb')->name('summary.ad-sb');
                    Route::get('/{workPackage}/summary/cmr-awl', 'SummaryNonRoutineTaskcardController@cmrawl')->name('summary.cmr-awl');
                    Route::get('/{workPackage}/summary/preliminary', 'SummaryNonRoutineTaskcardController@preliminary')->name('summary.preliminary');

                    Route::get('/{workPackage}/summary/routine', 'SummaryRoutineTaskcardController@summary')->name('summary.routine');
                    Route::get('/{workPackage}/summary/non-routine', 'SummaryNonRoutineTaskcardController@summary')->name('summary.nonroutine');
                    Route::get('/{workPackage}/summary/', 'WorkPackageController@summary')->name('summary.workpackage');
                });

                /** Transaction: Item */
                Route::post('/{workPackage}/item', 'WorkPackageItemsController@store')->name('item.workpackage');
                Route::delete('/{workPackage}/{item}/item/', 'WorkPackageItemsController@destroy')->name('item.workpackage.delete');

                /** Transaction: Predecessor */
                Route::post('/{WorkPackage}/taskcard/{taskcard}/predecessor/', 'TaskCardWorkPackagePredecessorController@store')->name('create.predecessor.workpackage');
                Route::delete('/{taskCardWorkPackagePredecessor}/predecessor/', 'TaskCardWorkPackagePredecessorController@destroy')->name('delete.predecessor.workpackage');
                Route::post('/{WorkPackage}/instruction/{instruction}/predecessor/', 'EOInstructiondWorkPackagePredecessorController@store')->name('create.predecessor.workpackage');
                Route::delete('/{EOIWorkPackagePredecessor}/predecessor/instruction', 'EOInstructiondWorkPackagePredecessorController@destroy')->name('delete.predecessor.workpackage');

                /** Transaction: Successor */
                Route::post('/{WorkPackage}/taskcard/{taskcard}/successor/', 'TaskCardWorkPackageSuccessorController@store')->name('create.taskcard.successor.workpackage');
                Route::delete('/{taskCardWorkPackageSuccessor}/successor/', 'TaskCardWorkPackageSuccessorController@destroy')->name('delete.taskcard.successor.workpackage');
                Route::post('/{WorkPackage}/instruction/{instruction}/successor/', 'EOInstructionWorkPackageSuccessorController@store')->name('create.instruction.successor.workpackage');
                Route::delete('/{EOIWorkPackageSuccessor}/successor/instruction', 'EOInstructionWorkPackageSuccessorController@destroy')->name('delete.instruction.successor.workpackage');

            });

        });

    });

});
