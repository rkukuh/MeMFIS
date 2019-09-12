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

        Route::get('/validation-quotation-item', function () {

            $item = App\Models\Item::find('1');

            $unit_primary = $item->unit->name;

            $unit_input = App\Models\Unit::find('11');

            $unit_kebutuhan = App\Models\Unit::find('27');

            $quantity = 2;
            $quantity_kebutuhan = 9;

            // dd($unit_input->name);

            // $items = QuotationWorkPackageTaskCardItem::where('uuid',$this->uuid)->first();
            // $tc = TaskCard::find($items->taskcard_id);
            $unit =  $unit_input->id;
            $qty = $quantity;
            $tc_i = $item;
            // if($tc_i->pivot->unit_id == $unit){
            //     if($qty > $tc_i->pivot->quantity){
            //     $validator->errors()->add('quantity', 'Quantity exceed limit');
            //     }
            // }else if($unit == $tc_i->unit_id){
            //     $qty_uom = $tc_i->units->where('uom.unit_id',$tc_i->pivot->unit_id)->first()->uom->quantity; // quantity conversi
            //     $qty_pri = 1/$qty_uom;
            //     $result = $qty_pri*$qty;
            //     if($result > $tc_i->pivot->quantity){
            //     $validator->errors()->add('quantity', 'Quantity exceed limit');
            //     }
            // }else{
                // dd( $tc_i->units);
                if($qty_uom2 = $tc_i->units->where('uom.unit_id',$unit)->first() == null){
                    // $validator->errors()->add('quantity', 'UOM have not Declared');
                    dd('UOM have not Declared');
                }
                else{
                    // dd('masuk');
                    $qty_uom2 = $tc_i->units->where('uom.unit_id',$unit)->first()->uom->quantity; // quantity conversi
                    // dd($qty_uom2); // quantity primari from uom
                    $result2 = $qty_uom2*$qty;
                    // dd($result2);// perkalian antara quantity uom dan inputan jadi ini adalah inputan quantity masukan dalam primary unit

                    //dijadikan uom kebutuhan yaitu liter
                    // dd($unit_kebutuhan);

                    $qty_uom_kebutuhan = $tc_i->units->where('uom.unit_id',$unit_kebutuhan->id)->first()->uom->quantity; // quantity conversi //$unit_kebutuhan->id diganti kebutuhan quantity
                    // dd($qty_uom_kebutuhan);
                    $quantity_convert = $result2/$qty_uom_kebutuhan;

                    // dd($quantity_convert);

                    // $qty_pri = 1/$qty_uom;
                    // $result = $qty_pri*$result2;
                        if($quantity_convert > $quantity_kebutuhan){
                            // $validator->errors()->add('quantity', 'Quantity exceed limit');
                            dd( 'Quantity exceed limit');
                        }
                        else{
                            dd( 'ok');
                        }
                    }
                // }


        });

        Route::get('/wp', function () {

            $project_workpackage = App\Models\Pivots\ProjectWorkPackage::where('project_id',1)->where('workpackage_id',1)->first()->id;
            $tes = App\Models\ProjectWorkPackageTaskCard::with('taskcard','taskcard.type','taskcard.task')->where('project_workpackage_id',$project_workpackage)
            ->whereHas('taskcard', function ($query) {
                $query->whereHas('type', function ($query) {
                        $query->where('name', 'Basic');
                    });
                        // $query->where('task_id', $request->task_type_id);
                //     });
            })->get();
            // dd($tes);

            foreach($tes as $te){
                // dump($te->taskcard->type->name);
                dump($te);
            }

            // whereIn
            // $taskcards = $project_workpackage->taskcards;

            // foreach($taskcards as $taskcard){
            //     dump($taskcard->taskcard);
            // }
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
                        'origin_taskcard' => $tc->toJson(),
                        'origin_taskcard_items' => $tc->items->toJson(),
                    ]);
                                       // // echo $tc->title.'<br>';
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
