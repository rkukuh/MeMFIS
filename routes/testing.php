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

        Route::get('/manhour', function () {
//             $hours = 2;
//             $minutes = 2400;
//             $now  = Carbon\Carbon::now();
//             dump($now);
// $days = $now->diffInMinutes($now->copy()->addHours($hours)->addMinutes($minutes));
// dd($days);
            // $t1 = Carbon\Carbon::parse('2016-07-05 12:29:16');
            // $t2 = Carbon\Carbon::parse('2016-07-03 13:30:10');
            // $diff = $t1->diff($t2);
            // dd($diff);
            // dd('manhoour');
            $statuses = App\Models\Status::ofJobCard()->get();
            $jobcard = App\Models\JobCard::find(1);
            foreach($jobcard->helpers as $helper){
                $helper->userID .= $helper->user->id;
            }
            // dd($jobcard->progresses->sortBy('created_at'));
            $manhours = null;
            foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                // if($this->statuses->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code <> "closed" and $this->statuses->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code <> "open"){
                //     // dump($statuses->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code);

                //     }
                    // $jobcard->progresses()->save(new Progress([
                    //     'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                    //     'reason_id' =>  Type::ofJobCardCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                    //     'reason_text' =>  $request->note,
                    //     'progressed_by' =>  $key
                    // ]));
                    $date1 = null;
                    foreach($values as $value){
                        if($statuses->where('id',$value->status_id)->first()->code <> "open"){


                            if($jobcard->helpers->where('userID',$key)->first() == null){
                                // dump($jobcard->id);
                                // dump($value->created_at);

                                // dump($key);
                                // dump($date1);
                                if($date1 <> null){
                                    // dump('tes');
                                    $t1 = Carbon\Carbon::parse($date1);
                                    $t2 = Carbon\Carbon::parse($value->created_at);
                                    // $diff = $t1->diff($t2);
                                    $diff = $t1->diffInSeconds($t2);
                                    // dump($diff);
                                    $manhours = $manhours + $diff;
                                    // dump(gmdate("H:i:s", $diff));
                                }
                                $date1 = $value->created_at;
                                // $date2 = $value->created_at;
                                // dump($date2);
                                // dump('-------------------------');
                            }
                        }

                    }
                }
                // dump($manhours);
                $manhours = $manhours/3600;
                dump(number_format($manhours, 2));

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
