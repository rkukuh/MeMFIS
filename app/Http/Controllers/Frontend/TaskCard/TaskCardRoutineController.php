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
        // $aircrafts = Aircraft::whereIn('id', $request->applicability_airplane)->pluck('id');
        
        $checker = [];
        // get all the taskcard with the same number
        $taskcards = TaskCard::where('number', $request->number)->get();
        if(sizeof($taskcards) > 0){
            // to check all internal number every taskcard
            foreach($taskcards as $taskcard){
                $taskcard->additionals = json_decode($taskcard->additionals);
                $zones = $taskcard->zones()->pluck('name')->toArray();

                // check if the internal number are the same 
                if($request->additionals->internal_number == $taskcard->additionals->internal_number){
                    // TODO : check even they are have the same zone's name but have a diffrent airplane type, it's okay
                    //check if the zones got any diffrents if yes (not empty), it's okay, if not (empty), then it's identical taskcard
                    $diff = array_diff( $request->zone , $zones);
                    array_push($checker, empty($diff));
                }
            }  
        }else{
            $taskcard = $this->createTaskcard($request);

            return response()->json($taskcard->original);
        }

        if(in_array(true, $checker)){
            $error_message = array(
                'message' => "a taskcard with same number, company number and zones already exists",
                'title' => "Taskcard already exists!",
                'alert-type' => "error"
            );
            return response()->json(['error' => [$error_message]], '403');
        }else{
            $taskcard = $this->createTaskcard($request);

            return response()->json($taskcard->original);
        }
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

        // dd($this->work_area);
        return view('frontend.task-card.routine.show', [
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
        $tc_stations = $aircraft_taskcards = $access_taskcards = $zone_taskcards = $relation_taskcards = [];

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

        $temp = $taskCard->stations->map(function ($stations) {
            return collect($stations->toArray())
            ->only(['uuid'])
            ->all();
        });
        $temp = array_values($temp->toArray());

        foreach($temp as $station){
            array_push($tc_stations, $station["uuid"]);
        }

        // dd(in_array("ca05f56a-bf54-467d-962c-88c3d819cffb", $tc_stations));
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
        $this->decoder($request);
        $accesses = $zones = $additionals = [];
        
        $additionals["internal_number"] = $request->additionals->internal_number;
        $additionals["document_library"] = $request->document_library;
        $request->merge(['additionals' => json_encode($additionals, true)]);

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

            if(is_array($request->threshold_type)){
                for ($i=0; $i < sizeof($request->threshold_type) ; $i++) {
                    if($request->threshold_type[$i] !== "Select Threshold"){
                        if($request->threshold_amount[$i] == ''){
                            $request->threshold_amount[$i] = null;
                        }
                        $taskCard->thresholds()->save(new Threshold([
                            'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                            'amount' => $request->threshold_amount[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->repeat_type)){
                for ($i=0; $i < sizeof($request->repeat_type) ; $i++) {
                    if($request->repeat_type[$i] !== "Select Repeat"){
                        if($request->repeat_amount[$i] == ''){
                            $request->repeat_amount[$i] = null;
                        }
                        $taskCard->repeats()->save(new Repeat([
                            'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                            'amount' => $request->repeat_amount[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->station) && sizeof($request->station) > 0){
                $station_array = [];
                foreach ($request->applicability_airplane as $airplane) {
                    if(isset($request->station)){
                        foreach($request->station as $data){
                            $station = Station::firstOrCreate(
                                ['name' => $data, 'stationable_id' => $airplane, 'stationable_type' => 'App\Models\Aircraft']
                            )->id;
                            array_push($station_array, $station);
                        }
                    }
                    $taskCard->stations()->sync($station_array);
                }
        }

            if ($request->hasFile('fileInput')) {
                $data = $request->input('image');
                $photo = $request->file('fileInput')->getClientOriginalName();
                $destination = 'master/taskcard/routine/';
                $stat = Storage::disk('public')->putFileAs($destination,$request->file('fileInput'), $photo);
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

    public function decoder($request){

        $request->zone = json_decode($request->zone);
        $request->access = json_decode($request->access);
        $request->station = json_decode($request->station);
        $request->sections = json_decode($request->sections);
        $request->additionals = json_decode($request->additionals);
        $request->repeat_type = json_decode($request->repeat_type);
        $request->repeat_amount = json_decode($request->repeat_amount);
        $request->threshold_type = json_decode($request->threshold_type);
        $request->threshold_amount = json_decode($request->threshold_amount);
        $request->document_library = json_decode($request->document_library);
        $request->applicability_airplane = json_decode($request->applicability_airplane);

        return $request;
    }

    /**
     * create taskcard 
     */

    public function createTaskcard($request)
    {
        $accesses = $zones = $additionals = [];

        $additionals["internal_number"] = $request->additionals->internal_number;
        $additionals["document_library"] = $request->document_library;
        $request->merge(['additionals' => json_encode($additionals, true)]);

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

            if(is_array($request->threshold_type)){
            for ($i=0; $i < sizeof($request->threshold_type) ; $i++) {
                if($request->threshold_type[$i] !== "Select Threshold"){
                    if($request->threshold_amount[$i] == ''){
                        $request->threshold_amount[$i] = null;
                    }
                    $taskcard->thresholds()->save(new Threshold([
                        'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                        'amount' => $request->threshold_amount[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->repeat_type)){
            for ($i=0; $i < sizeof($request->repeat_type) ; $i++) {
                if($request->repeat_type[$i] !== "Select Repeat"){
                    if($request->repeat_amount[$i] == ''){
                        $request->repeat_amount[$i] = null;
                    }
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
                $stat = Storage::disk('public')->putFileAs($destination,$request->file('fileInput'), $photo);
            }

            if($request->station){
                foreach ($request->applicability_airplane as $airplane) {
                    if(isset($request->station)){
                        foreach($request->station as $station){
                            $station = Station::firstOrCreate(
                                ['name' => $station, 'stationable_id' => $airplane, 'stationable_type' => 'App\Models\Aircraft']
                            );
                            $taskcard->stations()->attach($station);
                        }
                    }
                }
            }
            return response()->json($taskcard);
        }else{
            // TODO: Return error message as JSON
            return false;
        }

    }
}
