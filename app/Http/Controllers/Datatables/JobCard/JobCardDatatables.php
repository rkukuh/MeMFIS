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
        $JobCard = JobCard::with('quotation','quotation.quotationable','jobcardable')->get();

        foreach($JobCard as $taskcard){
            if($taskcard->jobcardable_type == "App\Models\TaskCard"){
                $taskcard->tc_number .= $taskcard->jobcardable->number;
                $taskcard->tc_title .= $taskcard->jobcardable->title;
                if(isset($taskcard->jobcardable->task_id)){
                    $taskcard->task_name .= $taskcard->jobcardable->task->name;
                }
                $taskcard->type_name .= $taskcard->jobcardable->type->name;
                $taskcard->skill .= $taskcard->jobcardable->skill;
            }else if($taskcard->jobcardable_type == "App\Models\EOInstruction"){
                $taskcard->tc_number .= $taskcard->jobcardable->eo_header->number;
                $taskcard->tc_title .= $taskcard->jobcardable->eo_header->title;
                $taskcard->task_name .= "-";
                $taskcard->type_name .= $taskcard->jobcardable->eo_header->type->name;
                if(sizeof($taskcard->jobcardable->skills) > 1){
                    $taskcard->skill .= $taskcard->jobcardable->skills->first()->name;
                }else{
                    $taskcard->skill .= "ERI";
                }
            }

            $count_user = $taskcard->progresses->groupby('progressed_by')->count()-1;

            $status = [];
            foreach($taskcard->progresses->groupby('progressed_by') as $key => $value){
                if(Status::ofJobCard()->where('id',$taskcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code == "pending"){
                    array_push($status, 'Pending');
                }
            }

            if($taskcard->is_rii == 1 and $taskcard->approvals->count()==2){
                $taskcard->status .= 'Released';
            }
            elseif($taskcard->is_rii == 1 and $taskcard->approvals->count()==1){
                if($taskcard->progresses->where('status_id', Status::ofJobCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                    $taskcard->status .= 'Waiting for RII';
                }
            }
            elseif($taskcard->is_rii == 0 and sizeof($taskcard->approvals)==1){
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

            $taskcard->actual .= $taskcard->ActualManhour;

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
        $JobCard = JobCard::with('jobcardable','jobcardable.task','jobcardable.aircrafts','jobcardable.skills','jobcardable.type')->first();
        // dd($JobCard);
        if (!empty($request->task_type_id)) {
            $JobCard->whereHas('jobcardable.task', function ($query) use ($request) {
                $query->where('task_id', $request->task_type_id);
            });
        }
        if (!empty($request->aircrafts)) {
            $JobCard->whereHas('jobcardable.aircrafts', function ($query) use ($request) {
                $query->whereIn('aircraft_id', $request->aircrafts);
            });
        }
        if (!empty($request->skills)) {
            $JobCard->whereHas('jobcardable.skills', function ($query) use ($request) {
                $query->where('skill_id', $request->skills);
            });
        }
        if (!empty($request->taskcard_routine_type)) {
            $JobCard->whereHas('jobcardable.type', function ($query) use ($request) {
                $query->where('type_id', $request->taskcard_routine_type);
            });
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
        $taskcard = TaskCard::find($jobcard->task_id);

        $items =[];

                foreach($jobcard->jobcardable->materials as $material){
                    $unit_id = $material->pivot->unit_id;
                    $material->unit_name .= Unit::find($unit_id)->name;
                    array_push($items, $material);
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

        foreach($jobcard->jobcardable->tools as $tool){
            $unit_id = $tool->pivot->unit_id;
            $tool->unit_name .= Unit::find($unit_id)->name;
            array_push($items, $tool);
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
