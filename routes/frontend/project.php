<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        /** PROJECT */

        Route::namespace('Project')->group(function () {

            Route::resource('project', 'ProjectController');
            Route::post('/project/{project}/approve', 'ProjectController@approve')->name('project.approve');


            Route::resource('project-hm', 'ProjectHMController', [
                'parameters' => ['project-hm' => 'project']
            ]);

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
                });

                Route::post('/{project}/workpackage/{workpackage}/engineerTeam','ProjectHMWorkPackageController@engineerTeam')->name('project-hm.engineerTeam.add');
                Route::post('/{project}/workpackage/{workpackage}/facilityUsed','ProjectHMWorkPackageController@facilityUsed')->name('project-hm.facilityUsed.add');
                Route::post('/{project}/workpackage/{workpackage}/manhoursPropotion','ProjectHMWorkPackageController@manhoursPropotion')->name('project-hm.manhoursPropotion.add');

                /** Transaction: HTCRR */

                Route::post('/htcrr','HtCrrController@store')->name('project-hm.htcrr.add');

                /** Transaction: Item */
                Route::post('/htcrr/{htcrr}/item', 'HtCrrItemsController@store')->name('htcrr.item.store');
                Route::delete('/htcrr/{htcrr}/{item}/item', 'HtCrrItemsController@destroy')->name('htcrr.item.destroy');

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

    });

});
