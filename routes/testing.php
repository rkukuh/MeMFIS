<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/greeting/{name?}', function ($name = 'World') {
            return "Hello $name !";
        });

        Route::resource('/testing', 'Frontend\TestingController');
        Route::view('/maps', 'frontend\testing\maps')->name('maps');
        Route::get('/view', 'Frontend\TestingController@view')->name('view');
        Route::post('/text', 'Frontend\TestingController@text')->name('text');
        Route::post('/photo', 'Frontend\TestingController@photo')->name('photo');
        Route::get('/metronic', 'Frontend\TestingController@metronic')->name('metronic');
        Route::post('/testing-photos','Frontend\TestingController@postPhotos')->name('testing-photos');

        Route::get('/certified-staff/{staffId}', function ($staffId) {

            /** Get a specific license of a given employee and license's number */

            $result = App\Models\Pivots\EmployeeLicense::with('employee', 'license')
                        ->whereHas('employee', function ($query) use ($staffId) {
                            $query->where('employee_id', $staffId);
                        })
                        ->where('code', 'E/I.3475') // license's number, omittable
                        ->get();

            return $result;
        });

        Route::get('/employee-license-staff/{staffId}', function ($staffId) {

            $ei_3475 = App\Models\Pivots\EmployeeLicense::where('code', 'E/I.3475')->first();

            return App\Models\Pivots\EmployeeLicense::whereHas('employee', function ($query) use ($staffId) {
                        $query->where('employee_id', $staffId);
                    })
                    ->find($ei_3475->id) // with ID = a Model returned, without ID = an array returned
                    ->employee;
        });

    });

});
