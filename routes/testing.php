<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/taskcard/{taskcard}', function ($taskcard) {
            $tc = App\Models\TaskCard::with('items', 
                                            'items.unit', 
                                            'items.categories'
            )->find($taskcard);
            
            echo '<h1>Item: Material</h1>';
            dump(collect($tc->items->where('categories.0.code', 'rawmat')->all()));

            echo '<h1>Item: Tool</h1>';
            dump(collect($tc->items->where('categories.0.code', 'tool')->all()));

            echo '<h1>Item: Component</h1>';
            dump(collect($tc->items->where('categories.0.code', 'component')->all()));
        });

        Route::view('/select2', 'frontend/testing/select2')->name('select2');
        Route::get('test', 'Frontend\FillComboxController@test')->name('test');

        Route::view('/select2-repeater', 'frontend/testing/select2Repeater')->name('select2-repeater');
        Route::view('/select2-repeater2', 'frontend/testing/repeaterBlank')->name('select2-repeater2');
        Route::view('/datatable', 'frontend/testing/datatable')->name('datatable');
        Route::view('/welcome', 'frontend/testing/welcome')->name('welcome');
        Route::view('/barcode', 'frontend/testing/barcode')->name('barcode');

        Route::get('/barcode-print', function () {
            $pdf = \PDF::loadView('frontend/form/barcode');
            return $pdf->stream();
        });

    });

});
