<?php

namespace App\Http\Controllers\Datatables\JobCard;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\JobCard;
use App\Models\TaskCard;
use App\Models\Status;
use App\Models\ListUtil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobCardDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobCard = JobCard::with('taskcard','quotation','quotation.project','quotation.project.customer')->get();

        foreach($JobCard as $taskcard){
            $taskcard->task_name .= $taskcard->taskcard->task;
            $taskcard->task_name .= $taskcard->taskcard->type;
            if(isset($taskcard->taskcard->skills) ){
                if(sizeof($taskcard->taskcard->skills) == 3){
                    $taskcard->skill_name .= "ERI";
                }
                else if(sizeof($taskcard->taskcard->skills) == 1){
                    $taskcard->skill_name .= $taskcard->taskcard->skills[0]->name;
                }
                else{
                    $taskcard->skill_name .= '';
                }
            }

            
            $count_user = $taskcard->progresses->groupby('progressed_by')->count()-1;

            $status = [];
            foreach($taskcard->progresses->groupby('progressed_by') as $key => $value){
                if(Status::ofJobCard()->where('id',$taskcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code == "pending"){
                    array_push($status, 'Pending');
                }
            }

            if($taskcard->taskcard->is_rii == 1 and $taskcard->approvals->count()==2){
                $taskcard->status .= 'Released';
            }
            elseif($taskcard->taskcard->is_rii == 1 and $taskcard->approvals->count()==1){
                if($taskcard->progresses->where('status_id', Status::ofJobCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                    $taskcard->status .= 'Waiting for RII';
                }
            }
            elseif($taskcard->taskcard->is_rii == 0 and sizeof($taskcard->approvals)==1){
                if($taskcard->progresses->where('status_id', Status::ofJobCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                    $taskcard->status .= 'Released';
                }
            }
            elseif($taskcard->progresses->where('status_id', Status::ofJobCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                $taskcard->status .= 'Closed';
            }
            elseif(sizeof($status) == $count_user and $count_user <> 0){
                $taskcard->status .= 'Pending';
            }
            elseif(sizeof($status) <> $count_user and $count_user <> 0){
                $taskcard->status .= 'Progress';
            }
            elseif($taskcard->progresses->count()==1){
                $taskcard->status .= 'Open';
            }

            $statuses = Status::ofJobCard()->get();
            $jobcard = JobCard::where('uuid',$taskcard->uuid)->first();
            foreach($jobcard->helpers as $helper){
                $helper->userID .= $helper->user->id;
            }
            $manhours = 0;
            foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                $date1 = null;
                foreach($values as $value){
                    if($statuses->where('id',$value->status_id)->first()->code <> "open" or $statuses->where('id',$value->status_id)->first()->code <> "released" or $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                        if($jobcard->helpers->where('userID',$key)->first() == null){
                            if($date1 <> null){
                                $t1 = Carbon::parse($date1);
                                $t2 = Carbon::parse($value->created_at);
                                $diff = $t1->diffInSeconds($t2);
                                $manhours = $manhours + $diff;
                            }
                            $date1 = $value->created_at;
                        }
                    }

                }
            }
            $manhours = $manhours/3600;
            $manhours_break = 0;
            foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
                // dump(sizeOf($values->toArray()));
                // dump($values);
                for($i=0; $i<sizeOf($values->toArray()); $i++){
                    if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
                        if($jobcard->helpers->where('userID',$key)->first() == null){
                            if($date1 <> null){
                                if($i+1 < sizeOf($values->toArray())){
                                    $t2 = Carbon::parse($values[$i]->created_at);
                                    $t3 = Carbon::parse($values[$i+1]->created_at);
                                    $diff = $t2->diffInSeconds($t3);
                                    $manhours_break = $manhours_break + $diff;
                                }
                            }
                        }
                    }
                }
            }
            // dd('s');

            $manhours_break = $manhours_break/3600;
            $actual_manhours =number_format($manhours-$manhours_break, 2);
            $taskcard->actual .= $actual_manhours;

        }

        $data = $alldata = json_decode($JobCard);

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
                    ? $datatable['query']['generalSearch'] : '';

        if (! empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean)preg_grep("/$filter/i", (array)$a);
            });

            unset($datatable['query']['generalSearch']);
        }

        $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;

        if (is_array($query)) {
            $query = array_filter($query);

            foreach ($query as $key => $val) {
                $data = $this->list_filter($data, [$key => $val]);
            }
        }

        $sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
        $field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'RecordID';

        $meta    = [];
        $page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
        $perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

        $pages = 1;
        $total = count($data);

        usort($data, function ($a, $b) use ($sort, $field) {
            if (! isset($a->$field) || ! isset($b->$field)) {
                return false;
            }

            if ($sort === 'asc') {
                return $a->$field > $b->$field ? true : false;
            }

            return $a->$field < $b->$field ? true : false;
        });

        if ($perpage > 0) {
            $pages  = ceil($total / $perpage);
            $page   = max($page, 1);
            $page   = min($page, $pages);
            $offset = ($page - 1) * $perpage;

            if ($offset < 0) {
                $offset = 0;
            }

            $data = array_slice($data, $offset, $perpage, true);
        }

        $meta = [
            'page'    => $page,
            'pages'   => $pages,
            'perpage' => $perpage,
            'total'   => $total,
        ];

        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        $result = [
            'meta' => $meta + [
                    'sort'  => $sort,
                    'field' => $field,
                ],
            'data' => $data,
        ];

        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $JobCard = JobCard::with('taskcard');

        if (!empty($request->task_type_id)) {
            $JobCard->whereHas('taskcard.task', function ($query) use ($request) {
                $query->where('task_id', $request->task_type_id);
            });
        }
        if (!empty($request->aircrafts)) {
            $JobCard->whereHas('taskcard.aircrafts', function ($query) use ($request) {
                $query->whereIn('aircraft_id', $request->aircrafts);
            });
        }
        if (!empty($request->skills)) {
            $JobCard->whereHas('taskcard.skills', function ($query) use ($request) {
                $query->where('skill_id', $request->skills);
            });
        }
        if (!empty($request->project_no)) {
            $JobCard->orderBy('project_no', $request->project_no);
        }
        if (!empty($request->taskcard_routine_type)) {
            $JobCard->whereHas('taskcard.type', function ($query) use ($request) {
                $query->where('type_id', $request->taskcard_routine_type);
            });
        }
        if (!empty($request->date_issued)) {
            $JobCard->orderBy('created_at', $request->date_issued);
        }
        if (!empty($request->jc_no)) {
            $JobCard->orderBy('number', $request->jc_no);
        }
        if (!empty($request->customer)) {
            $JobCard->whereHas('customer', function ($query) use ($request) {
                $query->where('id', $request->customer);
            });
        }
        if (!empty($request->status_jobcard)) {
            $JobCard->whereHas('progresses', function ($query) use ($request) {
                $query->where('status_id', $request->status_jobcard);
            });
        }
        $JobCard = $JobCard->get();

        foreach($JobCard as $taskcard){
            if(isset($taskcard->taskcard->skills) ){
                if(sizeof($taskcard->taskcard->skills) == 3){
                    $taskcard->skill_name .= "ERI";
                }
                else if(sizeof($taskcard->taskcard->skills) == 1){
                    $taskcard->skill_name .= $taskcard->taskcard->skills[0]->name;
                }
                else{
                    $taskcard->skill_name .= '';
                }
            }
        }

        foreach($JobCard as $taskcard){
            if(isset($taskcard->taskcard->aircrafts) ){
                for($index = 0; sizeof($taskcard->taskcard->aircrafts) > $index; $index++){
                    if(sizeof($taskcard->taskcard->aircrafts)-1 == $index){
                    $taskcard->pesawat .= $taskcard->taskcard->aircrafts[$index]->name;
                    }
                    else{
                    $taskcard->pesawat .= $taskcard->taskcard->aircrafts[$index]->name.", ";
                    }
                }
            }
        }

        foreach($JobCard as $taskcard){
            $taskcard->task_name .= $taskcard->taskcard->task;
        }

        foreach($JobCard as $taskcard){
            $taskcard->status .= Status::find($taskcard->progresses->last()->status_id);
        }

        foreach($JobCard as $taskcard){
            $taskcard->task_name .= $taskcard->taskcard->type;
        }

        $data = $alldata = json_decode($JobCard);

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
                    ? $datatable['query']['generalSearch'] : '';

        if (! empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean)preg_grep("/$filter/i", (array)$a);
            });

            unset($datatable['query']['generalSearch']);
        }

        $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;

        if (is_array($query)) {
            $query = array_filter($query);

            foreach ($query as $key => $val) {
                $data = $this->list_filter($data, [$key => $val]);
            }
        }

        $sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
        $field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'RecordID';

        $meta    = [];
        $page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
        $perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

        $pages = 1;
        $total = count($data);

        usort($data, function ($a, $b) use ($sort, $field) {
            if (! isset($a->$field) || ! isset($b->$field)) {
                return false;
            }

            if ($sort === 'asc') {
                return $a->$field > $b->$field ? true : false;
            }

            return $a->$field < $b->$field ? true : false;
        });

        if ($perpage > 0) {
            $pages  = ceil($total / $perpage);
            $page   = max($page, 1);
            $page   = min($page, $pages);
            $offset = ($page - 1) * $perpage;

            if ($offset < 0) {
                $offset = 0;
            }

            $data = array_slice($data, $offset, $perpage, true);
        }

        $meta = [
            'page'    => $page,
            'pages'   => $pages,
            'perpage' => $perpage,
            'total'   => $total,
        ];

        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        $result = [
            'meta' => $meta + [
                    'sort'  => $sort,
                    'field' => $field,
                ],
            'data' => $data,
        ];

        echo json_encode($result, JSON_PRETTY_PRINT);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function material(JobCard $jobcard)
    {
        //TODO API used is API's Datatables Metronic. FIX search Datatables API because not work
        $taskcard = TaskCard::find($jobcard->taskcard_id);

        $items =[];
        if ($taskcard->type->code == "eo"){
            foreach($taskcard->eo_instructions as $instructions){
                foreach($instructions->materials as $material){
                    $unit_id = $material->pivot->unit_id;
                    $material->unit_name .= Unit::find($unit_id)->name;
                    array_push($items, $material);
                }
            }
        }else{
            foreach($taskcard->materials as $material){
                    $unit_id = $material->pivot->unit_id;
                    $material->unit_name .= Unit::find($unit_id)->name;
                    array_push($items, $material);
            }
        }

        $data = $alldata = $items;

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
                    ? $datatable['query']['generalSearch'] : '';

        if (! empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean)preg_grep("/$filter/i", (array)$a);
            });

            unset($datatable['query']['generalSearch']);
        }

        $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;

        if (is_array($query)) {
            $query = array_filter($query);

            foreach ($query as $key => $val) {
                $data = $this->list_filter($data, [$key => $val]);
            }
        }

        $sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
        $field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'RecordID';

        $meta    = [];
        $page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
        $perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

        $pages = 1;
        $total = count($data);

        usort($data, function ($a, $b) use ($sort, $field) {
            if (! isset($a->$field) || ! isset($b->$field)) {
                return false;
            }

            if ($sort === 'asc') {
                return $a->$field > $b->$field ? true : false;
            }

            return $a->$field < $b->$field ? true : false;
        });

        if ($perpage > 0) {
            $pages  = ceil($total / $perpage);
            $page   = max($page, 1);
            $page   = min($page, $pages);
            $offset = ($page - 1) * $perpage;

            if ($offset < 0) {
                $offset = 0;
            }

            $data = array_slice($data, $offset, $perpage, true);
        }

        $meta = [
            'page'    => $page,
            'pages'   => $pages,
            'perpage' => $perpage,
            'total'   => $total,
        ];

        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        $result = [
            'meta' => $meta + [
                    'sort'  => $sort,
                    'field' => $field,
                ],
            'data' => $data,
        ];

        echo json_encode($result, JSON_PRETTY_PRINT);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tool(JobCard $jobcard)
    {
        //TODO API used is API's Datatables Metronic. FIX search Datatables API because not work
        $taskcard = TaskCard::find($jobcard->taskcard_id);

        $items =[];
        if ($taskcard->type->code == "eo"){
            foreach($taskcard->eo_instructions as $instructions){
                foreach($instructions->tools as $tool){
                    $unit_id = $tool->pivot->unit_id;
                    $tool->unit_name .= Unit::find($unit_id)->name;
                    array_push($items, $tool);
                }
            }
        }else{
            foreach($taskcard->tools as $tool){
                $unit_id = $tool->pivot->unit_id;
                $tool->unit_name .= Unit::find($unit_id)->name;
                array_push($items, $tool);
            }
        }

        $data = $alldata = $items;

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
                    ? $datatable['query']['generalSearch'] : '';

        if (! empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean)preg_grep("/$filter/i", (array)$a);
            });

            unset($datatable['query']['generalSearch']);
        }

        $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;

        if (is_array($query)) {
            $query = array_filter($query);

            foreach ($query as $key => $val) {
                $data = $this->list_filter($data, [$key => $val]);
            }
        }

        $sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
        $field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'RecordID';

        $meta    = [];
        $page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
        $perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

        $pages = 1;
        $total = count($data);

        usort($data, function ($a, $b) use ($sort, $field) {
            if (! isset($a->$field) || ! isset($b->$field)) {
                return false;
            }

            if ($sort === 'asc') {
                return $a->$field > $b->$field ? true : false;
            }

            return $a->$field < $b->$field ? true : false;
        });

        if ($perpage > 0) {
            $pages  = ceil($total / $perpage);
            $page   = max($page, 1);
            $page   = min($page, $pages);
            $offset = ($page - 1) * $perpage;

            if ($offset < 0) {
                $offset = 0;
            }

            $data = array_slice($data, $offset, $perpage, true);
        }

        $meta = [
            'page'    => $page,
            'pages'   => $pages,
            'perpage' => $perpage,
            'total'   => $total,
        ];

        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        $result = [
            'meta' => $meta + [
                    'sort'  => $sort,
                    'field' => $field,
                ],
            'data' => $data,
        ];

        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    /**
     * Show data from model with flter on datatable.
     *
     * @param $list, $args, $operator
     * @return \Illuminate\Http\Response
     */
    public function list_filter($list, $args = array(), $operator = 'AND')
    {
        if (! is_array($list)) {
            return array();
        }

        $util = new ListUtil($list);

        return $util->filter($args, $operator);
    }
}
