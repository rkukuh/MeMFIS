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

        Route::get('/convert-unit-to-prelimary', function () {

            $item = App\Models\Item::find('1');

            $quantity_sekarang = 2;
            $unit_sekarang = App\Models\Unit::find('11');

            $qty_uom = $item->units->where('uom.unit_id',$unit_sekarang->id)->first()->uom->quantity; // quantity conversi

            dd($qty_uom*$quantity_sekarang);


        });

        Route::get('/manhour-htcrr', function () {
            $htcrr = App\Models\HtCrr::find(15);

            $defectcard = $htcrr;

            $statuses = App\Models\Status::ofHtCrr()->get();
            // $defectcard = App\Models\DefectCard::where('uuid',$jobcard->uuid)->first();
            foreach($defectcard->helpers as $helper){
                $helper->userID .= $helper->user->id;
            }


            //calculating defect card's actual manhours
            $manhours = 0;
            foreach($defectcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                $date1 = null;
                foreach($values as $value){
                    if($statuses->where('id',$value->status_id)->first()->code <> "open" or $statuses->where('id',$value->status_id)->first()->code <> "released" or $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                        if($htcrr->helpers->where('userID',$key)->first() == null){
                            if($date1 <> null){
                                $t1 = Carbon\Carbon::parse($date1);
                                $t2 = Carbon\Carbon::parse($value->created_at);
                                $diff = $t1->diffInSeconds($t2);
                                $manhours = $manhours + $diff;
                            }
                            $date1 = $value->created_at;
                        }
                    }

                }
            }
            $manhours = $manhours/3600;
            $manhours_break = 0;
            foreach($defectcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                for($i=0; $i<sizeOf($values->toArray()); $i++){
                    if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
                        if($defectcard->helpers->where('userID',$key)->first() == null){
                            if($date1 <> null){
                                if($i+1 < sizeOf($values->toArray())){
                                    $t2 = Carbon\Carbon::parse($values[$i]->created_at);
                                    $t3 = Carbon\Carbon::parse($values[$i+1]->created_at);
                                    $diff = $t2->diffInSeconds($t3);
                                    $manhours_break = $manhours_break + $diff;
                                }
                            }
                        }
                    }
                }
            }

            $manhours_break = $manhours_break/3600;
            $actual_manhours =number_format($manhours-$manhours_break, 2);
            //$jobcard->actual .= $actual_manhours;


            dd($actual_manhours);
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
