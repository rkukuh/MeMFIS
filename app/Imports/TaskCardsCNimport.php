<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Access;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use App\Models\Repeat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskCardsCNimport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        /** Set the workarea */

        switch ($row['task_type']) {
            case 'RESTORE':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
                break;
            case 'INSPECTION - DETAILED':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Inspection')->first()->id;
                break;
            case 'INSPECTION - GEN VISUAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Inspection')->first()->id;
                break;
            case 'SERVICE':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Service')->first()->id;
                break;
            case 'LUBRICATE':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Lubrication')->first()->id;
                break;
            case 'VISUAL CHECK':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Visual Check')->first()->id;
                break;
            // case 'DISCARD':
            //     $task_type = Type::ofTaskCardTask()
            //                         ->where('name', 'Restore')->first()->id;
            //     break;
            // case 'OPERATIONAL':
            //     $task_type = Type::ofTaskCardTask()
            //                         ->where('name', 'Restore')->first()->id;
            //     break;
            // case 'FUNCTIONAL':
            //     $task_type = Type::ofTaskCardTask()
            //                         ->where('name', 'Restore')->first()->id;
            //     break;
            // case 'GENERAL VISUAL':
            //     $task_type = Type::ofTaskCardTask()
            //                         ->where('name', 'Restore')->first()->id;
            //     break;
            // case 'ZONAL (GV)':
            //     $task_type = Type::ofTaskCardTask()
            //                         ->where('name', 'Restore')->first()->id;
            //     break;
            // case 'DETAILED':
            //     $task_type = Type::ofTaskCardTask()
            //                         ->where('name', 'Restore')->first()->id;
            //     break;
            // case 'SPECIAL DETAILED':
            //     $task_type = Type::ofTaskCardTask()
            //                         ->where('name', 'Restore')->first()->id;
            // break;
                default:
                $task_type = null;

        }

        /** Set the workarea */

        switch ($row['work_area']) {
            case 'PASS CABIN':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'PASS CABIN')->first()->id;
                break;
            case 'NOSE COMP T':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'LWR NOSE COMPARTMENT')->first()->id;
                break;
            case 'MAIN W/W':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'MAIN WHEEL WELL')->first()->id;
                break;
            case 'APU COMPARTMENT':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'APU COMPARTMENT')->first()->id;
                break;
            case 'LT WING INBD LE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'L WING LEADING EDGE')->first()->id;
                break;
            case 'STRUTS':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'ENGINE/STRUT')->first()->id;
                break;
            case 'TAIL COMPT':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'TAIL COMPARTMENT')->first()->id;
                break;
            case 'A/C BAY':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'FUSELAGE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'FUSELAGE')->first()->id;
                break;
            case 'LEFT ENGINE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'LEFT ENGINE')->first()->id;
                break;
            case 'RIGHT ENGINE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'RIGHT ENGINE')->first()->id;
                break;
            // case 'CREW CABIN':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'MAIN EE CTR':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'FWD AIRSTAIR':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'FWD CARGO':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'FT CARGO':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'ENGINE #1':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'ENGINE #2':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'ENGINE #1':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'MULTIPLE':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'L WING LE':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'R WING LE':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'TAIL CONE':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'LEFT CARGO':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'EMERG DOORS':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
            //     break;
            // case 'DOORS':
            //     $work_area = Type::ofWorkArea()
            //                         ->where('name', 'AC DIST BAY')->first()->id;
                break;
            default:
                $work_area = null;

        }

        $taskcard_type = Type::ofTaskCardTypeRoutine()
        ->where('name', 'Basic')->first()->id;



        $taskcard =  new TaskCard([
            'number' => $row['number'],
            'title' => $row['title'],
            'type_id' => $taskcard_type, // TODO: Import appropriate value
            'task_id' => $task_type, // TODO: Import appropriate value
            'skill_id' => null, // TODO: Import appropriate value
            'work_area' => $work_area, // TODO: Import appropriate value
            'estimation_manhour' => $row['manhours'],
            'is_rii' => $row['is_rii'],
            'source' => $row['source'],
            'effectivity' => $row['effectivity'],
            'version' => json_encode(explode(';',$row['version'])),
            'description' => $row['description'],
        ]);

        $taskcard->save();


        // TODO: M-M values:
        // - Table: aircraft_taskcard
        $airplanes = Aircraft::where('name','B737-300')->orwhere('name','B737-400')->orwhere('name','B737-500')->get();

        foreach($airplanes as $airplane){
            $taskcard->aircrafts()->attach($airplane->id);
        }

        // - Table: taskcard_zone
        $zones = [];
        if($row['zone']){
            foreach (explode(' ',$row['zone']) as $zone_name ) {
                foreach ($airplanes as $airplane) {
                    if(isset($zone_name)){
                        $zone = Zone::firstOrCreate(
                            ['name' => $zone_name, 'zoneable_id' => $airplane->id, 'zoneable_type' => 'App\Models\Aircraft']
                        );
                        array_push($zones, $zone->id);
                    }
                }
            }
            $taskcard->zones()->attach($zones);
        }

        // TODO: Polymorph values:
        // - Table: accesses
        $accesses = [];
        if($row['access']){
            foreach (explode(' ',$row['access']) as $access_name ) {
                foreach ($airplanes as $airplane) {
                    if(isset($access_name)){
                        $access = Access::firstOrCreate(
                            ['name' => $access_name, 'accessable_id' => $airplane->id, 'accessable_type' => 'App\Models\Aircraft']
                        );
                        array_push($accesses, $access->id);
                    }
                }
            }
            $taskcard->accesses()->attach($accesses);
        }

        // - Table: thresholds
        // if($row['threshold']){
        //     foreach (explode(';',$row['threshold']) as $threshold ) {
        //         $e = explode(' ',$threshold);
        //         $threshold_type = Type::ofMaintenanceCycle()->where('name', 'like', '%' . $e[1] . '%')->first()->id;
        //         $taskcard->thresholds()->save(new Threshold([
        //             'amount' => $e[0],
        //             'type_id' => $threshold_type,
        //         ]));
        //     }
        // }
        // - Table: repeats
        // if($row['repeat']){
            // foreach (explode(';',$row['repeat']) as $threshold ) {
            //     $e = explode(' ',$threshold);
            //     $threshold_type = Type::ofMaintenanceCycle()->where('name', 'like', '%' . $e[1] . '%')->first()->id;
            //     $taskcard->repeats()->save(new Repeat([
            //         'amount' => $e[0],
            //         'type_id' => $threshold_type,
            //     ]));
            // }
        // }

    }
}
