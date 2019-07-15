<?php

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/docnum', function () {

            echo App\Helpers\DocumentNumber::generate('TC-', App\Models\TaskCard::count());
            echo "\n";
            echo App\Helpers\DocumentNumber::generate('JC-', App\Models\JobCard::count());
            echo "\n";
            echo App\Helpers\DocumentNumber::generate('WP-', App\Models\WorkPackage::count());

        });
        Route::get('/unit-validation', function () {
            $tc = App\Models\TaskCard::find(573);
            $i = App\Models\Item::find(1);
            // Tube
            // dd($i->units);
            $unit =  App\Models\Unit::where('name','Assembly')->first()->id;
            $qty = 1.5;
            // dd($unit);
            $tc_i = $tc->items->last();
            // dd($tc_i->pivot);
            if($tc_i->pivot->unit_id == $unit){
                if($qty > $tc_i->pivot->quantity){
                    dd('melebihi');
                }
                else{
                    dd('lolos');
                }
            }else if($unit == $tc->items->last()->unit_id){
                // dump($tc->items->last()->pivot->unit_id); // unit yang dibutuhkan taskcard
                // dd($tc->items->last()->unit_id); // unit primary
                $qty_uom = $tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity; // quantity conversi
                $qty_pri = 1/$qty_uom;
                $result = $qty_pri*$qty;
                // dd($result);

                if($result > $tc_i->pivot->quantity){
                    dd('melebihi');
                }
                else{
                    dd('lolos');
                }
            }else{
                // dd($tc->items->last());
                // dd($tc->items->last()->unit_id); // unit primary
                // dd($tc->items->last()->pivot->unit_id); // unit yang dibutuhkan taskcard
                // dd($tc->items->last()->pivot->quantity); // qty yang dibutuhkan taskcard

                // dd($tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity);
                // dd($tc->items->last()->units); //unit conversi


                $qty_uom2 = $tc->items->last()->units->where('uom.unit_id',$unit)->first()->uom->quantity; // quantity conversi
                // $qty_pri2 = 1/$qty_uom2;
                $result2 = $qty_uom2*$qty;
                // dd($result);

                $qty_uom = $tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity; // quantity conversi
                $qty_pri = 1/$qty_uom;
                $result = $qty_pri*$result2;


                // $pembagian = 1/$tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity;
                // $perkalian = $pembagian*$tc->items->last()->units->where('uom.unit_id',$unit)->first()->uom->quantity;

                // dd($perkalian);
                if($result > $tc_i->pivot->quantity){
                    dd('melebihi');
                }
                else{
                    dd('lolos');
                }

            }

            // dd($tc->items->last()->pivot->quantity);
            // echo 'tes';
        });

        Route::view('/select2', 'frontend/testing/select2')->name('select2');
        Route::get('test', 'Frontend\FillComboxController@test')->name('test');
        Route::view('/taskcard-wip', 'frontend/testing/taskcard-wip')->name('taskcard');
        Route::view('/taskcard', 'frontend/testing/taskcard')->name('taskcard');
        // Route::post('/taskcard/filer', 'Datatables\Taskcard\TaskCardDatatables@filter')->name('taskcard.filter');

        Route::view('/select2-repeater', 'frontend/testing/select2Repeater')->name('select2-repeater');
        Route::view('/select2-repeater2', 'frontend/testing/repeaterBlank')->name('select2-repeater2');
        Route::view('/datatable', 'frontend/testing/datatable')->name('datatable');
        Route::view('/welcome', 'frontend/testing/welcome')->name('welcome');
        Route::view('/barcode', 'frontend/testing/barcode')->name('barcode');
        Route::view('/metronic', 'frontend/testing/metronic')->name('metronic');
        Route::view('/test1', 'frontend/testing/khusnul/create_new');
        Route::view('/test2', 'frontend/testing/khusnul/interchange_datalist');
        Route::view('/test3', 'frontend/testing/khusnul/create_RIR');
        Route::view('/test4', 'frontend/testing/khusnul/checkbox-inline');
        Route::view('/test5', 'frontend/testing/khusnul/add_rir');
        Route::view('/test11', 'frontend/testing/ibnu/mi');
        Route::view('/test31', 'frontend/testing/ibnu/rir');
        Route::view('/testing', 'frontend/testing/ibnu/testing');
                // Route::view('/jcprint', 'frontend/job-card/print');
        Route::view('/jcprintraw', 'frontend/form/jobcard');
        Route::resource('setting', 'Frontend\SettingController');

        Route::get('/jcprint', function () {
            $pdf = \PDF::loadView('frontend/form/jobcard');
            return $pdf->stream();
        });
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

        Route::get('/jobcard/{project}', function ($project) {

            $project = App\Models\Project::where('uuid',$project)->first();
            foreach($project->workpackages as $wp){
                foreach($wp->taskcards as $tc){
                    App\Models\JobCard::create([
                        'number' => 'JC-DUM-'.md5(uniqid(rand(), true)),
                        'taskcard_id' => $tc->id,
                        'data_taskcard' => $tc->toJson(),
                        'data_taskcard_items' => $tc->items->toJson(),
                    ]);                    // // echo $tc->title.'<br>';
                    // foreach($tc->items as $item){
                    //     echo $item->name.'<br>';
                    // }
                    // dump($tc->materials->toJson());
                }
            }

            dd('done');

        });

    });

});
