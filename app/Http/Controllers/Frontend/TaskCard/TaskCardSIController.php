<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\TaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardSIStore;
use App\Http\Requests\Frontend\TaskCardSIUpdate;

class TaskCardSIController extends Controller
{
    protected $applicability_airplane;
    protected $skill;
    protected $work_area;

    public function __construct()
    {
        $this->work_area = Type::ofWorkArea()->get();
    }

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
        return view('frontend.taskcard.nonroutine.si.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardSIStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardSIStore $request)
    {
        if ($taskcard = TaskCard::create($request->all())) {
            // $item->categories()->attach($request->category);

            return response()->json($taskcard);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $taskCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit($taskCard)
    {
        //TODO Data binding not work
        $taskCard = TaskCard::where('uuid',$taskCard)->first();
        // dd($taskCard);
        return view('frontend.taskcard.nonroutine.si.edit', [
            'taskcard' => $taskCard,
            'work_areas' => $this->work_area,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardSIUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardSIUpdate $request,$taskCard)
    {
        //TODO Data binding not work

        $taskCard = TaskCard::where('uuid',$taskCard)->first();

        // dd($request->all());
        if ($taskCard->update($request->all())) {
            // $item->categories()->sync($request->category);

            return response()->json($taskCard);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taskcard $taskCard)
    {
        //
    }
}
