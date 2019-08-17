<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Access;
use App\Models\Repeat;
use App\Models\Station;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use App\Helpers\DocumentNumber;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardRoutineStore;
use App\Http\Requests\Frontend\TaskCardRoutineUpdate;

class TaskCardRoutineController extends Controller
{

    protected $type;
    protected $task;
    protected $skill;
    protected $zones;
    protected $access;
    protected $aircraft;
    protected $taskcard;
    protected $work_area;
    protected $relationship;

    public function __construct()
    {
        $this->zones = Zone::get();
        $this->access = Access::get();
        $this->stations = Station::get();
        $this->aircraft = Aircraft::get();
        $this->taskcard = TaskCard::get();
        $this->task = Type::ofTaskCardTask()->get();
        $this->work_area = Type::ofWorkArea()->get();
        $this->skill = Type::ofTaskCardSkill()->get();
        $this->type = Type::ofTaskCardTypeRoutine()->get();
        $this->maintenanceCycle = Type::ofMaintenanceCycle()->get();
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
        return view('frontend.task-card.routine.create', [
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardRoutineStore $request)
    {
        $this->decoder($request);
        $accesses = $zones = [];
        if($request->work_area){
            $request->work_area = Type::firstOrCreate(
                ['name' => $request->work_area,'code' => strtolower(str_replace(" ","-",$request->work_area) ),'of' => 'work-area' ]
            );
        }

        if ($taskcard = TaskCard::create($request->all())) {
            $taskcard->aircrafts()->attach($request->applicability_airplane);

            if($request->access){
                foreach ($request->access as $access_name ) {
                    foreach ($request->applicability_airplane as $airplane) {
                        if(isset($access_name)){
                            $access = Access::firstOrCreate(
                                ['name' => $access_name, 'accessable_id' => $airplane, 'accessable_type' => 'App\Models\Aircraft']
                            );
                            array_push($accesses, $access->id);
                        }
                    }
                }

                $taskcard->accesses()->attach($accesses);

            }

            if(Type::where('id',$request->skill_id)->where('of','taskcard-skill')->first()->code == 'eri'){
                $taskcard->skills()->attach(Type::where('code','electrical')->first()->id);
                $taskcard->skills()->attach(Type::where('code','radio')->first()->id);
                $taskcard->skills()->attach(Type::where('code','instrument')->first()->id);
            }
            else{
                $taskcard->skills()->attach($request->skill_id);
            }

            if($request->zone){
                foreach ($request->zone as $zone_name ) {
                    foreach ($request->applicability_airplane as $airplane) {
                        if(isset($zone_name)){
                            $zone = Zone::firstOrCreate(
                                ['name' => $zone_name, 'zoneable_id' => $airplane, 'zoneable_type' => 'App\Models\Aircraft']
                            );
                            array_push($zones, $zone->id);
                        }
                    }
                }

                $taskcard->zones()->attach($zones);

            }

            if( !empty(json_decode($request->relationship, true)) ) {
                $taskcard->related_to()->attach(json_decode($request->relationship));
            }

            if(is_array($request->threshold_amount)){
            for ($i=0; $i < sizeof($request->threshold_amount) ; $i++) {
                if($request->threshold_type[$i] !== "Select Threshold"){
                    $taskcard->thresholds()->save(new Threshold([
                        'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                        'amount' => $request->threshold_amount[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->repeat_amount)){
            for ($i=0; $i < sizeof($request->repeat_amount) ; $i++) {
                if($request->repeat_type[$i] !== "Select Repeat"){
                    $taskcard->repeats()->save(new Repeat([
                        'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                        'amount' => $request->repeat_amount[$i],
                        ]));
                    }
                }
            }

            if ($request->hasFile('fileInput')) {
                $data = $request->input('image');
                $photo = $request->file('fileInput')->getClientOriginalName();
                $destination = 'master/taskcard/routine/';
                $stat = Storage::putFileAs($destination,$request->file('fileInput'), $photo);
            }

            if($request->station){
                foreach ($request->applicability_airplane as $airplane) {
                    if(isset($request->station)){
                        $station = Station::firstOrCreate(
                            ['name' => $request->station, 'stationable_id' => $airplane, 'stationable_type' => 'App\Models\Aircraft']
                        );
                    }

                    $taskcard->stations()->attach($station);
                }
            }

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
        $aircraft_taskcards = $access_taskcards = $zone_taskcards = $relation_taskcards = [];

        foreach($taskCard->aircrafts as $i => $aircraft_taskcard){
            $aircraft_taskcards[$i] =  $aircraft_taskcard->id;
        }

        foreach($taskCard->accesses as $i => $access_taskcard){
            $access_taskcards[$i] =  $access_taskcard->pivot->access_id;
        }

        foreach($taskCard->zones as $i => $zone_taskcard){
            $zone_taskcards[$i] =  $zone_taskcard->id;
        }

        foreach($taskCard->related_to as $i => $relation_taskcard){
            $relation_taskcards[$i] =  $relation_taskcard->pivot->related_to;
        }

        foreach($taskCard->stations as $i => $station){
            $station[$i] =  $station->name;
        }
        // dd($taskCard->type->name);

        return view('frontend.task-card.routine.show', [
            // 'stations' => $stations,
            'types' => $this->type,
            'tasks' => $this->task,
            'taskcard' => $taskCard,
            'zones' => $this->zones,
            'accesses' => $this->access,
            'aircrafts' => $this->aircraft,
            'taskcards' => $this->taskcard,
            'work_areas' => $this->work_area,
            'access_taskcards' => $access_taskcards,
            'zone_taskcards' => $zone_taskcards,
            'aircraft_taskcards' => $aircraft_taskcards,
            'relation_taskcards' => $relation_taskcards,
            'additionals' => json_decode($taskCard->additionals)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskCard $taskCard)
    {
        // dd($taskCard->section);
        $tc_stations = $aircraft_taskcards = [];

        foreach($taskCard->aircrafts as $i => $aircraft_taskcard){
            $aircraft_taskcards[$i] =  $aircraft_taskcard->id;
        }

        $access_taskcards = [];

        foreach($taskCard->accesses as $i => $access_taskcard){
            $access_taskcards[$i] =  $access_taskcard->pivot->access_id;
        }

        $zone_taskcards = [];

        foreach($taskCard->zones as $i => $zone_taskcard){
            $zone_taskcards[$i] =  $zone_taskcard->id;
            
        }

        $relation_taskcards = [];

        foreach($taskCard->related_to as $i => $relation_taskcard){
            $relation_taskcards[$i] =  $relation_taskcard->pivot->related_to;
        }

        $temp = $taskCard->stations->map(function ($stations) {
            return collect($stations->toArray())
            ->only(['uuid'])
            ->all();
        });
        $temp = array_values($temp->toArray());
        foreach($temp as $station){
            array_push($tc_stations, $station["uuid"]);
        }

        return view('frontend.task-card.routine.edit', [
            'tasks' => $this->task,
            'types' => $this->type,
            'zones' => $this->zones,
            'taskcard' => $taskCard,
            'skills' => $this->skill,
            'accesses' => $this->access,
            'stations' => $this->stations,
            'tc_stations' => $tc_stations,
            'aircrafts' => $this->aircraft,
            'taskcards' => $this->taskcard,
            'work_areas' => $this->work_area,
            'zone_taskcards' => $zone_taskcards,
            'access_taskcards' => $access_taskcards,
            'aircraft_taskcards' => $aircraft_taskcards,
            'relation_taskcards' => $relation_taskcards,
            'MaintenanceCycles' => $this->maintenanceCycle,
            'additionals' => json_decode($taskCard->additionals)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardRoutineUpdate $request, TaskCard $taskCard)
    {
        // dd($request->section);
        $this->decoder($request);
        $accesses = [];
        $zones = [];

        if ($taskCard->update($request->all())) {
            $taskCard->aircrafts()->sync($request->applicability_airplane);
            if(Type::where('id',$request->skill_id)->first()->code == 'eri'){
                $taskCard->skills()->detach();
                $taskCard->skills()->attach(Type::where('code','electrical')->first()->id);
                $taskCard->skills()->attach(Type::where('code','radio')->first()->id);
                $taskCard->skills()->attach(Type::where('code','instrument')->first()->id);
            }
            else{
                if(sizeof($taskCard->skills) > 1 ){
                    $taskCard->skills()->detach();
                }
                $taskCard->skills()->sync($request->skill_id);
            }

            if(is_array($request->access)){
                foreach ($request->access as $access_name ) {
                    foreach ($request->applicability_airplane as $airplane) {
                        if(isset($access_name)){
                            $access = Access::firstOrCreate(
                                ['name' => $access_name, 'accessable_id' => $airplane, 'accessable_type' => 'App\Models\Aircraft']
                            );
                            array_push($accesses, $access->id);
                        }
                    }
                }

                $taskCard->accesses()->sync($accesses);

            }

            if(is_array($request->zone)){
                foreach ($request->zone as $zone_name ) {
                    foreach ($request->applicability_airplane as $airplane) {
                        if(isset($zone_name)){
                            $zone = Zone::firstOrCreate(
                                ['name' => $zone_name, 'zoneable_id' => $airplane, 'zoneable_type' => 'App\Models\Aircraft']
                            );
                            array_push($zones, $zone->id);
                        }
                    }
                }

                $taskCard->zones()->sync($zones);

            }

            if( !empty(json_decode($request->relationship, true)) ) {
                $taskCard->related_to()->sync(json_decode($request->relationship));
            }

            if($taskCard->thresholds)$taskCard->thresholds()->delete();
            if($taskCard->repeats) $taskCard->repeats()->delete();

            if(is_array($request->threshold_amount)){
                for ($i=0; $i < sizeof($request->threshold_amount) ; $i++) {
                    if($request->threshold_type[$i] !== "Select Threshold"){
                        $taskCard->thresholds()->save(new Threshold([
                            'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                            'amount' => $request->threshold_amount[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->repeat_amount)){
                for ($i=0; $i < sizeof($request->repeat_amount) ; $i++) {
                    if($request->repeat_type[$i] !== "Select Repeat"){
                        $taskCard->repeats()->save(new Repeat([
                            'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                            'amount' => $request->repeat_amount[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->station) && sizeof($request->station) > 0){
                foreach ($request->applicability_airplane as $airplane) {
                    if(isset($request->station)){
                        $station = Station::firstOrCreate(
                            ['name' => $request->station, 'stationable_id' => $airplane, 'stationable_type' => 'App\Models\Aircraft']
                        );
                    }

                    $taskCard->stations()->sync($station);
                }
            }

            if ($request->hasFile('fileInput')) {
                $data = $request->input('image');
                $photo = $request->file('fileInput')->getClientOriginalName();
                $destination = 'master/taskcard/routine/';
                $stat = Storage::putFileAs($destination,$request->file('fileInput'), $photo);
            }

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

    public function decoder($req){

        $req->zone = json_decode($req->zone);
        $req->access = json_decode($req->access);
        // $req->stringer = json_encode($req->stringer);
        $req->sections = json_decode($req->sections);
        $req->repeat_type = json_decode($req->repeat_type);
        $req->repeat_amount = json_decode($req->repeat_amount);
        $req->threshold_amount = json_decode($req->threshold_amount);
        $req->threshold_type = json_decode($req->threshold_type);
        $req->applicability_airplane = json_decode($req->applicability_airplane);

        return $req;
    }
}
