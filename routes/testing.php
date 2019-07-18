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
            $statuses = App\Models\Status::ofJobCard()->get();
            $jobcard = App\Models\JobCard::find(1);
            foreach($jobcard->helpers as $helper){
                $helper->userID .= $helper->user->id;
            }
            $manhours = null;
            foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                $date1 = null;
                foreach($values as $value){
                    if($statuses->where('id',$value->status_id)->first()->code <> "open"){
                        if($jobcard->helpers->where('userID',$key)->first() == null){
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
            $manhours_break = null;
            foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                for($i=0; $i<sizeOf($values->toArray()); $i++){
                    if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
                        if($jobcard->helpers->where('userID',$key)->first() == null){
                            if($date1 <> null){
                                $t2 = Carbon\Carbon::parse($values[$i]->created_at);
                                $t3 = Carbon\Carbon::parse($values[$i+1]->created_at);
                                $diff = $t2->diffInSeconds($t3);
                                $manhours_break = $manhours_break + $diff;
                            }
                        }
                    }
                }
            }
            $manhours_break = $manhours_break/3600;
            $actual_manhours =number_format($manhours-$manhours_break, 2);


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
