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

class WorkPackageItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkPackageStore $request, WorkPackage $workPackage)
    {
        $workPackage->items()->attach($workPackage->id, [
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'quantity' => $request->quantity
        ]);

        return response()->json($workPackage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function addTaskCard(Request $request, WorkPackage $workPackage)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function show(WorkPackage $workPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkPackage $workPackage)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkPackage $workPackage)
    {
        //
    }

}
