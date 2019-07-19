<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('TaskCard')->group(function () {

            Route::resource('taskcard', 'TaskCardController');

            Route::resource('taskcard-routine', 'TaskCardRoutineController', [
                'parameters' => ['taskcard-routine' => 'taskCard']
            ]);

            Route::resource('taskcard-eo', 'TaskCardEOController', [
                'parameters' => ['taskcard-eo' => 'taskCard']
            ]);

            Route::resource('taskcard-si', 'TaskCardSIController', [
                'parameters' => ['taskcard-si' => 'taskCard']
            ]);

            Route::resource('preliminary', 'PreliminaryController', [
                'parameters' => ['preliminary' => 'taskCard']
            ]);

            // Relationships

            Route::name('taskcard-routine.')->group(function () {
                Route::prefix('taskcard-routine')->group(function () {

                    /** Transaction: Item */
                    Route::post('/{taskcard}/item', 'TaskCardRoutineItemsController@store')->name('item.store');
                    Route::delete('/{taskcard}/{item}/item', 'TaskCardRoutineItemsController@destroy')->name('item.destroy');

                    /** Transaction: Threshold */
                    Route::post('/{taskcard}/threshold', 'TaskCardRoutineThresholdController@store')->name('threshold.store');
                    Route::delete('/{taskcard}/{threshold}/threshold', 'TaskCardRoutineThresholdController@destroy')->name('itthresholdem.destroy');

                    /** Transaction: Repeat */
                    Route::post('/{taskcard}/repeat', 'TaskCardRoutineRepeatController@store')->name('repeat.store');
                    Route::delete('/{taskcard}/{repeat}/repeat', 'TaskCardRoutineRepeatController@destroy')->name('repeat.destroy');

                });

            });

            Route::name('taskcard-eo.')->group(function () {

                Route::prefix('taskcard-eo')->group(function () {

                    Route::resource('/{taskcard}/eo-instruction', 'EOInstructionController');

                    /** Transaction: Item */
                    Route::post('/eo-instruction/{taskcard}/item', 'EOInstructionItemController@store')->name('item.store');
                    Route::delete('/eo-instruction/{taskcard}/{item}/item', 'EOInstructionItemController@destroy')->name('item.destroy');

                });

            });

            Route::name('taskcard-si.')->group(function () {

                Route::prefix('taskcard-si')->group(function () {

                    /** Transaction: Item */
                    Route::post('/{taskcard}/item', 'TaskCardSIItemController@store')->name('item.store');
                    Route::delete('/{taskcard}/{item}/item', 'TaskCardSIItemController@destroy')->name('item.destroy');

                });

            });

            Route::name('preliminary.')->group(function () {

                Route::prefix('preliminary')->group(function () {

                    /** Transaction: Item */
                    // Route::post('/{preliminary}/item', 'TaskCardSIItemController@store')->name('item.store');
                    // Route::delete('/{preliminary}/{item}/item', 'TaskCardSIItemController@destroy')->name('item.destroy');

                });

            });

        });

    });

});