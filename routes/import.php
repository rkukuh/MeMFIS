<?php

Route::name('import.')->group(function () {

    Route::group([

        'prefix'        => 'import',
        'namespace'     => 'Import'

    ], function () {

        Route::get('/engines','OldDataController@engines')->name('old-data.engines');
        Route::get('/work-areas','OldDataController@workAreas')->name('old-data.work-areas');

    });

});
