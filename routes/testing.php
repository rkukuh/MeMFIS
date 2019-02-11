<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/tools', function () {
            // $tool = App\Models\Category::ofItem()->where('code', 'tool')->first()->code;
            // return $tool;

            $items = App\Models\Item::with('categories')
                                    ->whereHas('categories', function ($query) {
                                        $query->where('code', 'tool');
                                    })->get();

            return $items;
        });

        Route::get('/materials', function () {
            // $material = App\Models\Category::ofItem()->where('code', 'rawmat')->first()->code;
            // return $material;

            $items = App\Models\Item::with('categories')
                                    ->whereHas('categories', function ($query) {
                                        $query->where('code', 'rawmat');
                                    })->get();

            return $items;
        });
        
        Route::view('/select2', 'frontend/testing/select2')->name('select2');
        Route::get('test', 'Frontend\FillComboxController@test')->name('test');

        Route::view('/select2-repeater', 'frontend/testing/select2Repeater')->name('select2-repeater');
        Route::view('/select2-repeater2', 'frontend/testing/repeaterBlank')->name('select2-repeater2');
        Route::view('/datatable', 'frontend/testing/datatable')->name('datatable');
        Route::view('/welcome', 'frontend/testing/welcome')->name('welcome');
    });

});
