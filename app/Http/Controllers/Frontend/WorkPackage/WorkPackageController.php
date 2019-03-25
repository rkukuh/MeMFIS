<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\Aircraft;
use App\Models\ListUtil;
use App\Models\WorkPackage;
use App\Models\TaskCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageStore;
use App\Http\Requests\Frontend\WorkPackageUpdate;

class WorkPackageController extends Controller
{
    protected $aircrafts;

    public function __construct()
    {
        $this->aircrafts = Aircraft::all();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.workpackage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.workpackage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkPackageStore $request)
    {
        $workpackage = Workpackage::create($request->all());

        return response()->json($workpackage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function addTaskCard(Request $request, WorkPackage $workPackage)
    {
        // dd((TaskCard::where('uuid', $request->taskcard)->first())->id);
        // $taskcard = TaskCard::where('uuid', $request->taskcard)->first();
        $workPackage->taskcards()->attach(TaskCard::where('uuid', $request->taskcard)->first()->id);

        return response()->json($workPackage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function show(WorkPackage $workPackage)
    {
        return view('frontend.workpackage.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkPackage $workPackage)
    {
        return view('frontend.workpackage.edit',[
            'workPackage' => $workPackage,
            'aircrafts' => $this->aircrafts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function update(WorkPackageUpdate $request, WorkPackage $workPackage)
    {
        $workPackage = WorkPackage::find($workPackage);
        // $workPackage->name = $request->name;
        // $workPackage->save();

        return response()->json($workPackage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkPackage $workPackage)
    {
        $workPackage->delete();

        return response()->json($workPackage);
    }

}
