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
            $unit =  App\Models\Unit::where('name','Assembly')->first()->id;
            $qty = 1.5;
            $tc_i = $tc->items->last();
            if($tc_i->pivot->unit_id == $unit){
                if($qty > $tc_i->pivot->quantity){
                    dd('melebihi');
                }
                else{
                    dd('lolos');
                }
            }else if($unit == $tc->items->last()->unit_id){
                $qty_uom = $tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity; // quantity conversi
                $qty_pri = 1/$qty_uom;
                $result = $qty_pri*$qty;
                if($result > $tc_i->pivot->quantity){
                    dd('melebihi');
                }
                else{
                    dd('lolos');
                }
            }else{
                $qty_uom2 = $tc->items->last()->units->where('uom.unit_id',$unit)->first()->uom->quantity; // quantity conversi
                $result2 = $qty_uom2*$qty;
                $qty_uom = $tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity; // quantity conversi
                $qty_pri = 1/$qty_uom;
                $result = $qty_pri*$result2;
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
