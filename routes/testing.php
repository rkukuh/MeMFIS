<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::view('/select2', 'frontend/testing/select2')->name('select2');
        Route::get('test', 'Frontend\FillComboxController@test')->name('test');

        // Route::get('/basic', function () {
        //     // $tool = App\Models\Category::ofItem()->where('code', 'tool')->first()->code;
        //     // return $tool;
        // // $taskcards = App\Models\TaskCard::with('type', function($query){
        // //     $query->where('name', 'Basic');
        // // })->get();

        //     $taskcards  = App\Models\TaskCard::with('type')
        //                             ->whereHas('type', function ($query) {
        //                                 $query->where('name', 'Basic');
        //                             })->get();

        // dd($taskcards);
        //     // $items = App\Models\Item::with('categories')
        //     //                         ->whereHas('categories', function ($query) {
        //     //                             $query->where('code', 'tool');
        //     //                         })->get();

        //     // return $items;
        // });

        Route::post('/post',function (Illuminate\Http\Request $request)
        {
                        $taskcards  = App\Models\TaskCard::find(1);
                        // dd($taskcards);
                        $taskcards->addMediaFromRequest('fileInput')
                        ->toMediaCollection('taskcard');

            // dd($request->all());
            // $length_request=count($request->all())-1;
            // if($length_request==0){
            //     //
            // }
            // elseif($length_request>=1){
            //     for ($i = 0; $i < $length_request; $i++) {
            //         $item = Item::where('code',$request->code)->first();
            //         $item->addMediaFromRequest('file'.$i)
            //          ->toMediaCollection('item');
            //     }
                dd('done');
            // }
        });



        Route::view('/select2-repeater', 'frontend/testing/select2Repeater')->name('select2-repeater');
        Route::view('/select2-repeater2', 'frontend/testing/repeaterBlank')->name('select2-repeater2');
        Route::view('/datatable', 'frontend/testing/datatable')->name('datatable');
        Route::view('/welcome', 'frontend/testing/welcome')->name('welcome');
        Route::view('/barcode', 'frontend/testing/barcode')->name('barcode');
        Route::view('/metronic', 'frontend/testing/metronic')->name('metronic');

        Route::get('/barcode-print', function () {
            $pdf = \PDF::loadView('frontend/form/barcode');
            return $pdf->stream();
        });

        Route::get('/repeater', function () {

            $website = App\Models\Website::all();

            return view('frontend.testing.repeaterBlankModif', [
                'websites' => $website,

            ]);
            });

    });

});
