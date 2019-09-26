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
            $manhours_removal = 0;
            $manhours_installation = 0;
            foreach($defectcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                $date1_removal = null;
                $date1_installation = null;
                foreach($values as $value){
                    if($statuses->where('id',$value->status_id)->first()->code <> "removal-open" and $statuses->where('id',$value->status_id)->first()->code <> "installation-open" and $statuses->where('id',$value->status_id)->first()->code <> "released" and $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                        if (strpos($statuses->where('id',$value->status_id)->first()->code , "removal") !== false) {
                            if($htcrr->helpers->where('userID',$key)->first() == null){
                                if($date1_removal <> null){
                                    // dump($statuses->where('id',$value->status_id)->first()->code);
                                    $t1 = Carbon\Carbon::parse($date1_removal);
                                    $t2 = Carbon\Carbon::parse($value->created_at);
                                    $diff = $t1->diffInSeconds($t2);
                                    $manhours_removal = $manhours_removal + $diff;
                                }
                                $date1_removal = $value->created_at;
                                // dump($date1_removal);
                            }
                        }
                        else if(strpos($statuses->where('id',$value->status_id)->first()->code , "installation") !== false){
                            if($htcrr->helpers->where('userID',$key)->first() == null){
                                if($date1_installation <> null){
                                    $t3 = Carbon\Carbon::parse($date1_installation);
                                    $t4 = Carbon\Carbon::parse($value->created_at);
                                    $diff2 = $t3->diffInSeconds($t4);
                                    $manhours_installation = $manhours_installation + $diff2;
                                }
                                $date1_installation = $value->created_at;
                            }
                        }





                    }

                }
            }

            $manhours_removal = $manhours_removal/3600;
            $manhours_installation = $manhours_installation/3600;
            $manhours_break_removal = 0;
            $manhours_break_installation = 0;
            foreach($defectcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                for($i=0; $i<sizeOf($values->toArray()); $i++){
                    // if($statuses->where('id',$values[$i]->status_id)->first()->code == "removal-pending" or $statuses->where('id',$values[$i]->status_id)->first()->code == "installation-pending"){
                        // dump('s');
                        // dump(strpos("removal-pending", "removal-pending"));
                        // dump($statuses->where('id',$values[$i]->status_id)->first()->code );
                        // if (strpos("removal-pending", "removal") !== false) {
                        if ($statuses->where('id',$values[$i]->status_id)->first()->code == "removal-pending") {
                            // dump('1');
                            if($defectcard->helpers->where('userID',$key)->first() == null){
                                if($date1_removal <> null){
                                    if($i+1 < sizeOf($values->toArray())){
                                        $t5 = Carbon\Carbon::parse($values[$i]->created_at);
                                        $t6 = Carbon\Carbon::parse($values[$i+1]->created_at);
                                        $diff3 = $t5->diffInSeconds($t6);
                                        $manhours_break_removal = $manhours_break_removal + $diff3;
                                        // dump($t5."----".$t6);
                                    }
                                }
                            }

                        }
                        // else if(strpos("installation-pending" , "installation") !== false){
                        else if($statuses->where('id',$values[$i]->status_id)->first()->code  == "installation-pending"){
                            // dump('2');
                            // dump($statuses->where('id',$values[$i]->status_id)->first()->code );

                            if($defectcard->helpers->where('userID',$key)->first() == null){
                                if($date1_installation <> null){
                                    if($i+1 < sizeOf($values->toArray())){
                                        // dump($statuses->where('id',$values[$i]->status_id)->first()->code );
                                        $t7 = Carbon\Carbon::parse($values[$i]->created_at);
                                        $t8 = Carbon\Carbon::parse($values[$i+1]->created_at);
                                        $diff4 = $t7->diffInSeconds($t8);
                                        $manhours_break_installation = $manhours_break_installation + $diff4;
                                    }
                                }
                            }
                        }




                    // }
                }
            }
            // dump($manhours_removal);
            // dump($manhours_installation);
            // dump($manhours_break_removal);
            // dump($manhours_break_installation);
            $manhours_break_removal = $manhours_break_removal/3600;
            $manhours_break_installation = $manhours_break_installation/3600;
            // dd($manhours_break);
            $actual_manhours_removal =number_format($manhours_removal-$manhours_break_removal, 2);
            $actual_manhours_installation =number_format($manhours_installation-$manhours_break_installation, 2);
            //$jobcard->actual .= $actual_manhours;

            dump($actual_manhours_removal);
            dump($actual_manhours_installation);


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
