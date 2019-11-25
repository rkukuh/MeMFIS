<?php
        // use DataTables;

Route::name('testing.')->group(function () {

    Route::group(['prefix' => '_test'], function () {

        Route::get('/view/files', function() {
            $key = 'master/taskcard/routine/Progress Report 6 Nop 2019.pdf';
            $s3 = Storage::disk('s3');
            $client = $s3->getDriver()->getAdapter()->getClient();
            $bucket = Config::get('filesystems.disks.s3.bucket');

            $command = $client->getCommand('GetObject', [
                'Bucket' => $bucket,
                'Key' => $key
            ]);

            $request = $client->createPresignedRequest($command, '+20 minutes');

            $url = $request->getUri();
            // return (string) $request->getUri();

            return view('frontend.testing.view-file',[
                'url' => $url
            ]);
        });

        Route::get('/prr2', function () {
            dd(App\Models\TaskCard::find(730)->tools);
        });
        Route::get('/prr', function () {
            // dd(App\Models\PurchaseRequest::find(3)->items->where('pivot.deleted_at',null));
            dd(App\Models\Pivots\PurchaseRequestItem::with('item','item.categories')->where('purchase_request_id',3)->whereHas('item', function ($query) {
                $query->whereHas('categories', function ($query2) {
                    // dump($query2->get());
                    $query2->whereIn('code', ['raw', 'cons', 'comp']);
                    // dump($query2);
                    // $query2->where('categories.0.code','comp');
                });
                // where('code','MT-DUM-1114616723');
                // ->where('item.code','MT-DUM-1114616723')->get()
            })->get());
            // dd(App\Models\Pivots\PurchaseRequestItem::with('item',)->whereHas('item.categories', function ($query) {
            //     $query->where('categories.0.code','comp');
            //     // dump($query);
        // })->get());


            // ->where('item.categories.[0].code','comp')->get()
        });
        Route::get('/grn', function () {
            $grn = App\Models\GoodsReceived::find(1)->items->load('categories')->where('categories.0.code', 'tool')->count();
            dd($grn);
        });
        Route::get('/po', function () {
            // $po = App\Models\PurchaseOrder::find(16);

            // foreach ($po->promos as $promo) {
            //     dump($promo->pivot);

            //     // if ($promo->pivot->promo_id == 19) {
            //     //     dump($promo->pivot);
            //     // }
            // }

            // DB::table('promoables')
            //         ->where('promoable_type', 'App\Models\PurchaseOrder')
            //         ->where('promoable_id', 16)
            //         ->where('promo_id', 19)
            //         ->update([
            //             'value' => 99,
            //             'amount' => 9999
            //         ]);
        });

        // Route::get('/serverSide', [
        //     // 'as'   => 'serverSide',
        //     'uses' => function () {
        //         ini_set('memory_limit', '-1');
        //         $users = App\Models\Item::all();
        //         return DataTables::of($users)->make();
        //     }
        // ]);

        // Route::get('/serverSide', [
        //     'as'   => 'serverSide',
        //     'uses' => function () {
        //         ini_set('memory_limit', '-1');

        //         $users = App\Models\Item::with('unit')->get();
        //         // ->whereHas('categories', function ($query) {
        //         //     $query->where('code','<>','tool');
        //         // })->get();
        //         return Datatables::of($users)->make();
        //     }
        // ]);

        Route::get('/server', function () {
            ini_set('memory_limit', '-1');
            $tsim_array = App\Models\Item::get();
            foreach (array_chunk($tsim_array,1000) as $t) {
                dd($t);
                // DB::table('tsim')->insert($t);


             }

        });
        Route::get('/docnum', function () {

            echo App\Helpers\DocumentNumber::generate('TC-', App\Models\TaskCard::count());
            echo "\n";
            echo App\Helpers\DocumentNumber::generate('JC-', App\Models\JobCard::count());
            echo "\n";
            echo App\Helpers\DocumentNumber::generate('WP-', App\Models\WorkPackage::count());

        });

        Route::get('/check', function () {
            $test  = new App\Models\CheckStock;

            $result = $test->item('a7455650-b740-47ec-9a30-ffbfdcc2446b');
            dd($result);

        });
        Route::get('/test22', function () {
            $test  = Directoryxx\Finac\Model\APaymentA::all();

            dd($test);

        });

        Route::get('/convert-unit-to-prelimary', function () {

            $item = App\Models\Item::find('1');

            $quantity_sekarang = 2;
            $unit_sekarang = App\Models\Unit::find('11');

            $qty_uom = $item->units->where('uom.unit_id',$unit_sekarang->id)->first()->uom->quantity; // quantity conversi

            dd($qty_uom*$quantity_sekarang);


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
