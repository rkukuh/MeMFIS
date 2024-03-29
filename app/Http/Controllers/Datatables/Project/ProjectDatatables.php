<?php

namespace App\Http\Controllers\Datatables\Project;

use App\User;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\Quotation;
use App\Models\DefectCard;
use App\Models\HtCrr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WorkPackage;

class ProjectDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('aircraft','customer')->get();
        foreach($projects as $project){
            if($project->deleted_at <> null){
                $project->status .= 'Void';
            }elseif(empty($project->approvals->toArray())){
                $project->status .= 'Project Open';
            }elseif(sizeof($project->approvals->toArray()) == 1){
                $project->status .= 'Project Approved';
                $project->conducted_by.= User::find($project->approvals->first()->conducted_by)->name;
                $project->approval_time .= $project->approvals->first()->created_at;

            }elseif(sizeof($project->approvals->toArray()) == 2){
                $project->status .= 'Quotation Approved';
                $project->conducted_by.= User::find($project->approvals->first()->conducted_by)->name;
                $project->approval_time .= $project->approvals->first()->created_at;
            }
            else{
                $project->status .= (sizeof($project->approvals->toArray())).'?'; // *Find bug size of approve
            }

            $project->aircraft_type.= $project->aircraft->name;
            
            if($project->audits->first()->user_id ==  null){
                $project->created_by.= "System";

            }else{
                $project->created_by.= User::find($project->audits->first()->user_id)->name;
            }
            

            if($project->parent_id ==  null){
                $project->project_type.= "Project";

            }else{
                $project->project_type.= "Additional";
            }

        }

        $data = $alldata = json_decode($projects);

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
    public function defectCard(Project $project)
    {
        $quotation = Quotation::where('quotationable_id',$project->id)->first()->id;

        $defectcards = DefectCard::with('jobcard','jobcard.jobcardable')
                                ->whereHas('jobcard', function ($query) use ($quotation){
                                    $query->where('quotation_id', $quotation);
                                })->where('project_additional_id', null)->get();

                                // RecordID

        foreach($defectcards as $defectcard){
            if($defectcard->jobcard->jobcardable_type == "App\Models\TaskCard"){
                $defectcard->tc_number    .= $defectcard->jobcard->number;
                $defectcard->tc_uuid        .= $defectcard->jobcard->uuid;
                $defectcard->tc_title     .= $defectcard->jobcard->title;
                if(isset($defectcard->jobcard->task_id)){
                    $defectcard->task_name .= $defectcard->jobcard->task->name;
                }
                $defectcard->skill        .= $defectcard->jobcard->skill;
            }else if($defectcard->jobcard->jobcardable_type == "App\Models\EOInstruction"){
                $defectcard->tc_number    .= $defectcard->jobcard->number;
                $defectcard->tc_uuid        .= $defectcard->jobcard->uuid;
                $defectcard->tc_title     .= $defectcard->jobcard->title;
                $defectcard->task_name    .= "-";
                $defectcard->skill        .= $defectcard->jobcard->skill;
            }

            $defectcard->RecordID .= $defectcard->uuid;
            $defectcard->taskcard .= $defectcard->jobcard->taskcard;
            if(isset($defectcard->skills) ){
                if(sizeof($defectcard->skills) == 3){
                    $defectcard->defectcard_skill .= "ERI";
                }
                else if(sizeof($defectcard->skills) == 1){
                    $defectcard->defectcard_skill .= $defectcard->skills[0]->name;
                }
                else{
                    $defectcard->defectcard_skill .= '';
                }
            }

            if($defectcard->audits->first()->user_id ==  null){
                $project->created_by.= "System";

            }else{
                $defectcard->created_by.= User::find($defectcard->audits->first()->user_id)->name;
            }

        }

        $data = $alldata = json_decode($defectcards);

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
    public function selectedDefectCard(Project $project)
    {
        $defectcards = DefectCard::with('jobcard','jobcard.jobcardable')->where('project_additional_id', $project->id)->get();

        // RecordID

        foreach($defectcards as $defectcard){
            if($defectcard->jobcard->jobcardable_type == "App\Models\TaskCard"){
                $defectcard->tc_number    .= $defectcard->jobcard->number;
                $defectcard->tc_uuid        .= $defectcard->jobcard->uuid;
                $defectcard->tc_title     .= $defectcard->jobcard->title;
                if(isset($defectcard->jobcard->task_id)){
                    $defectcard->task_name .= $defectcard->jobcard->task->name;
                }
                $defectcard->skill        .= $defectcard->jobcard->skill;
            }else if($defectcard->jobcard->jobcardable_type == "App\Models\EOInstruction"){
                $defectcard->tc_number    .= $defectcard->jobcard->number;
                $defectcard->tc_uuid        .= $defectcard->jobcard->uuid;
                $defectcard->tc_title     .= $defectcard->jobcard->title;
                $defectcard->task_name    .= "-";
                $defectcard->skill        .= $defectcard->jobcard->skill;
            }
            $defectcard->RecordID .= $defectcard->uuid;
            $defectcard->taskcard .= $defectcard->jobcard->taskcard;
            if(isset($defectcard->skills) ){
                if(sizeof($defectcard->skills) == 3){
                    $defectcard->defectcard_skill .= "ERI";
                }
                else if(sizeof($defectcard->skills) == 1){
                    $defectcard->defectcard_skill .= $defectcard->skills[0]->name;
                }
                else{
                    $defectcard->defectcard_skill .= '';
                }
            }

            if($defectcard->audits->first()->user_id ==  null){
                $project->created_by.= "System";

            }else{
                $defectcard->created_by.= User::find($defectcard->audits->first()->user_id)->name;
            }

        }

        $data = $alldata = json_decode($defectcards);

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workpackage(Project $project)
    {
        $workpackages = $project->workpackages;

        foreach($workpackages as $workpackage){
            $workpackage->ac_type = $workpackage->aircraft->name;
        }

        $htcrrs = HtCrr::where('project_id',$project->id)->whereNull('parent_id')->get();
        if (sizeof($htcrrs) > 0) {
            $htcrr_workpackage = new WorkPackage();
            $htcrr_workpackage->code = "Workpackage HT CRR";
            $htcrr_workpackage->title = "Workpackage HT CRR";
            $htcrr_workpackage->is_template = 0;
            $htcrr_workpackage->ac_type = $project->aircraft->name;

            $workpackages[sizeof($workpackages)] = $htcrr_workpackage;
        }

        $data = $alldata = json_decode($workpackages);

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
}
