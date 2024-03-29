<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** PROJECT */

        Route::namespace('Project')->group(function () {
            Route::post('/project-hm-additional/calculateManhours','ProjectHMAdditionalController@calculateManhours')->name('project-hm-additional.calculateManhours');

            Route::resource('project', 'ProjectController');
            Route::post('/project/{project}/approve', 'ProjectController@approve')->name('project.approve')->middleware('permission:project-approve');


            Route::resource('project-hm', 'ProjectHMController', [
                'parameters' => ['project-hm' => 'project']
            ]);

            Route::resource('project-hm-additional', 'ProjectHMAdditionalController',[
                'parameters' => ['project-hm-additional' => 'project']
            ])->except('create','store','destroy');

            Route::get('/project-hm-additional/create/{project}','ProjectHMAdditionalController@create')->name('project-hm-additional.create');
            Route::post('/project-hm-additional/{project}','ProjectHMAdditionalController@store')->name('project-hm-additional.store');
            Route::put('/project-hm-additional/{project}','ProjectHMAdditionalController@update')->name('project-hm-additional.update');
            Route::post('/project-hm-additional/{project}/destroy','ProjectHMAdditionalController@destroy')->name('project-hm-additional.destroy');
            Route::get('/project-hm-additional/{project}/summary','ProjectHMAdditionalController@summary')->name('project-hm-additional.summary');
            Route::post('/project-hm-additional/{project}/additional-store','ProjectHMAdditionalController@additionalStore')->name('project-hm-additional.store.data');

            Route::resource('project-workshop', 'ProjectWorkshopController', [
                'parameters' => ['project-workshop' => 'project']
            ]);

            Route::post('project-workpackage/{project}', 'BlankWorkPackageController@store')->name('project-workpackage.store');
            Route::get('project/{project}/blank-workpackage','BlankWorkPackageController@create')->name('project-blank-workpackage.create');
            Route::get('project/{project}/blank-workpackage/{workPackage}/edit','BlankWorkPackageController@edit')->name('project-blank-workpackage.edit');

            Route::prefix('project-hm')->group(function () {

                Route::name('project-hm.')->group(function () {

                    Route::resource('/{project}/workpackage', 'ProjectHMWorkPackageController', [
                        'parameters' => ['workpackage' => 'workPackage']
                    ]);

                    /** Summary */
                    Route::get('/{project}/workpackage/{workPackage}/summary/basic', 'SummaryRoutineTaskcardController@basic')->name('summary.basic');
                    Route::get('/{project}/workpackage/{workPackage}/summary/sip', 'SummaryRoutineTaskcardController@sip')->name('summary.sip');
                    Route::get('/{project}/workpackage/{workPackage}/summary/cpcp', 'SummaryRoutineTaskcardController@cpcp')->name('summary.cpcp');
                    Route::get('/{project}/workpackage/{workPackage}/summary/ad-sb', 'SummaryNonRoutineTaskcardController@adsb')->name('summary.ad-sb');
                    Route::get('/{project}/workpackage/{workPackage}/summary/cmr-awl', 'SummaryNonRoutineTaskcardController@cmrawl')->name('summary.cmr-awl');
                    Route::get('/{project}/workpackage/{workPackage}/summary/si', 'SummaryNonRoutineTaskcardController@si')->name('summary.si');
                    Route::get('/{project}/workpackage/{workPackage}/summary/preliminary', 'SummaryNonRoutineTaskcardController@preliminary')->name('summary.preliminary');
                    Route::get('/{project}/workpackage/{workPackage}/summary/ea', 'SummaryNonRoutineTaskcardController@ea')->name('summary.ea');
                    Route::get('/{project}/workpackage/{workPackage}/summary/eo', 'SummaryNonRoutineTaskcardController@eo')->name('summary.eo');
                    Route::get('/{project}/workpackage/{workPackage}/summary/routine', 'SummaryRoutineTaskcardController@summary')->name('summary.routine');
                    Route::get('/{project}/workpackage/{workPackage}/summary/non-routine', 'SummaryNonRoutineTaskcardController@summary')->name('summary.nonroutine');
                    Route::get('/{project}/workpackage/{workPackage}/summary', 'ProjectHMWorkPackageController@summary')->name('summary.workpackage');

                });

                Route::post('/{project}/workpackage/{workpackage}/engineerTeam','ProjectHMWorkPackageController@engineerTeam')->name('project-hm.engineerTeam.add');
                Route::post('/{project}/workpackage/{workpackage}/facilityUsed','ProjectHMWorkPackageController@facilityUsed')->name('project-hm.facilityUsed.add');
                Route::post('/{project}/workpackage/{workpackage}/manhoursPropotion','ProjectHMWorkPackageController@manhoursPropotion')->name('project-hm.manhoursPropotion.add');
                Route::put('/{ProjectWorkpackage}/sequence/', 'ProjectHMWorkPackageTaskCardController@sequence')->name('project-hm.sequence.workpackage');
                Route::put('/{ProjectWorkpackage}/sequence/instruction', 'ProjectHMWorkPackageTaskCardController@sequenceInstruction')->name('project-hm.sequence.instruction.workpackage');
                Route::put('/{ProjectWorkpackage}/mandatory/', 'ProjectHMWorkPackageTaskCardController@mandatory')->name('project-hm.mandatory.workpackage');
                Route::put('/{ProjectWorkpackage}/mandatory/instruction', 'ProjectHMWorkPackageTaskCardController@mandatoryInstruction')->name('project-hm.mandatory.instruction.workpackage');
                Route::put('/{ProjectWorkpackage}/rii/', 'ProjectHMWorkPackageTaskCardController@rii')->name('project-hm.rii.workpackage');
                Route::put('/{ProjectWorkpackage}/rii/instruction', 'ProjectHMWorkPackageTaskCardController@riiInstruction')->name('project-hm.rii.instruction.workpackage');
                Route::post('/{project}/workpackage/{workpackage}/taskcard/{taskcard}', 'ProjectHMWorkPackageTaskCardController@store')->name('project-hm.store.taskcard');
                Route::post('/{project}/workpackage/{workpackage}/instruction/{instruction}', 'ProjectHMWorkPackageEOInstructionController@store')->name('project-hm.store.instruction');
                Route::delete('/{ProjectWorkpackage}/destroy/', 'ProjectHMWorkPackageTaskCardController@destroy')->name('project-hm.destroy.taskcard');
                Route::delete('/{ProjectWorkpackage}/destroy/instruction', 'ProjectHMWorkPackageEOInstructionController@destroy')->name('project-hm.destroy.instruction');

                /** Transaction: HTCRR */

                Route::post('/htcrr','HtCrrController@store')->name('project-hm.htcrr.add');
                Route::post('/{project}/htcrr/engineer-team','ProjectHMHtcrrController@engineerTeam')->name('project-hm.htcrr.engineer_team');
                Route::post('/{project}/htcrr/manhoursPropotion','ProjectHMHtcrrController@manhoursPropotion')->name('project-hm.htcrr.engineer_team');

                /** Transaction: Item */
                Route::post('/htcrr/{htcrr}/item', 'HtCrrItemsController@store')->name('htcrr.item.store');
                Route::delete('/htcrr/{htcrr}/{item}/item', 'HtCrrItemsController@destroy')->name('htcrr.item.destroy');

                Route::get('/{project}/workpackage/{workPackage}/getManhours','ProjectHMWorkPackageController@getManhours')->name('project-hm.getManhours');

            });

            Route::prefix('project-htcrr')->group(function () {

                Route::name('project-htcrr.')->group(function () {

                    Route::resource('/{project}/project-htcrr', 'ProjectHMHtcrrController');
                    Route::get('/{project}/getManhours','ProjectHMHtcrrController@getManhours')->name('project-hm.htcrr.getManhours');

                });

                /** Transaction: HTCRR */

                // Route::post('/htcrr','HtCrrController@store')->name('project-htcrr.htcrr.add');

                /** Transaction: Item */
                // Route::post('/htcrr/{htcrr}/item', 'HtCrrItemsController@store')->name('htcrr.item.store');
                // Route::delete('/htcrr/{htcrr}/{item}/item', 'HtCrrItemsController@destroy')->name('htcrr.item.destroy');

                // Route::get('/{project}/workpackage/{workPackage}/getManhours','ProjectHMWorkPackageController@getManhours')->name('project-hm.getManhours');

            });


            Route::prefix('project-workshop')->group(function () {

                Route::name('project-workshop.')->group(function () {

                    Route::resource('/{project}/workpackage', 'ProjectHMWorkPackageController', [
                        'parameters' => ['workpackage' => 'workPackage']
                    ]);

                });

            });

        });

        /** PROJECT : WORKPACKAGE */

        Route::resource('project-workpackage', 'ProjectWorkPackageController');
        Route::resource('project-workpackage-manhour', 'ProjectWorkPackageManhourController');
        Route::resource('project-workpackage-engineer', 'ProjectWorkPackageEngineerController');
        Route::resource('project-workpackage-facility', 'ProjectWorkPackageFacilityController');
        Route::resource('project-workpackage-taskcard', 'ProjectWorkPackageTaskCardController');
        Route::resource('project-wp-eo', 'ProjectWorkPackageEOInstructionController');

    });

});
