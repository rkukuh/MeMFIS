<?php

namespace App\Http\Controllers\Datatables\DefectCard;

use Auth;
use Carbon\Carbon;
use App\User;
use App\Models\Status;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\Quotation;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefectCardDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DefectCard = DefectCard::with('jobcard','progresses')
                        ->has('approvals','>',1) //? harus di approve engineer dan mechanic
                        ->get();

        foreach($DefectCard as $jobcard){
            if($jobcard->approvals->toArray() == []){
                $conducted_by = "";
                $conducted_at = "";
            }
            else{
                $conducted_by = User::find($jobcard->approvals->last()->conducted_by)->name;
                $conducted_at = $jobcard->approvals->last()->created_at;
            }

            if($jobcard->jobcard->jobcardable_type == "App\Models\TaskCard"){
                $jobcard->tc_number    .= $jobcard->jobcard->jobcardable->number;
                $jobcard->tc_uuid     .= $jobcard->jobcard->jobcardable->uuid;
            }else if($jobcard->jobcard->jobcardable_type == "App\Models\EOInstruction"){
                $jobcard->tc_number    .= $jobcard->jobcard->jobcardable->eo_header->number;
                $jobcard->tc_uuid     .= $jobcard->jobcard->jobcardable->eo_header->uuid;
            }

            $jobcard->customer_name     .= $jobcard->jobcard->quotation->quotationable->customer->name;
            $jobcard->taskcard_number   .= $jobcard->jobcard->jobcardable->number;
            $jobcard->aircraft          .= $jobcard->jobcard->quotation->quotationable->aircraft->name;

            //auditable, Technichal Writer request to show this
            $jobcard->conducted_by      .= $conducted_by;
            $jobcard->conducted_at      .= $conducted_at;

            $jobcard->create_date       .= $jobcard->audits->first()->created_at;
            $jobcard->created_by        .= User::find($jobcard->audits->first()->user_id)->name;

            $jobcard->update_date       .= $jobcard->audits->last()->updated_at;
            $jobcard->updated_by        .= User::find($jobcard->audits->last()->user_id)->name;
            
            // get skill
            if(isset($jobcard->jobcard->jobcardable->skills) ){
                if(sizeof($jobcard->jobcard->jobcardable->skills) == 3){
                    $jobcard->skill .= "ERI";
                }
                else if(sizeof($jobcard->jobcard->jobcardable->skills) == 1){
                    $jobcard->skill .= $jobcard->jobcard->jobcardable->skills[0]->name;
                }
                else{
                    $jobcard->skill .= '';
                }
            }

            $jobcard->actual .= $jobcard->ActualManhour;

            $count_user = $jobcard->progresses->groupby('progressed_by')->count()-1;

            $status = [];

            if($jobcard->is_rii == 1 and $jobcard->approvals->count()== 4){
                $jobcard->status .= 'Released';
            }
            else if($jobcard->is_rii == 1 and $jobcard->approvals->count()== 3){
                $jobcard->status .= 'Waiting for RII';
            }
            elseif($jobcard->is_rii == 0 and $jobcard->approvals->count()== 3){
                $jobcard->status .= 'Released';
            }
            elseif($jobcard->progresses->where('progressed_by',Auth::id())->first() == null){
                $jobcard->status .= 'Open';
            }else{
                if($jobcard->progresses->where('progressed_by',Auth::id())->last()->status_id == Status::ofdefectcard()->where('code','closed')->first()->id){
                    $jobcard->status .= 'Closed';
                }
                elseif($jobcard->progresses->where('progressed_by',Auth::id())->last()->status_id == Status::ofdefectcard()->where('code','pending')->first()->id){
                    $jobcard->status .= 'Pending';
                }
                elseif($jobcard->progresses->where('progressed_by',Auth::id())->last()->status_id == Status::ofdefectcard()->where('code','progress')->first()->id){
                    $jobcard->status .= 'Progress';
                }
                elseif($jobcard->progresses->where('progressed_by',Auth::id())->last()->status_id == Status::ofdefectcard()->where('code','open')->first()->id){
                    $jobcard->status .= 'Open';
                }
            }
        }

        $data = $alldata = json_decode($DefectCard);

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
    public function project()
    {
        $DefectCard=DefectCard::with('jobcard','progresses')->has('approvals','>',1)->get();

        foreach($DefectCard as $jobcard){
            $jobcard->taskcard_number .= $jobcard->jobcard->jobcardable->number;
        }

        foreach($DefectCard as $jobcard){
            $jobcard->customer_name .= $jobcard->jobcard->quotation->quotationable->customer->name;
        }

        foreach($DefectCard as $jobcard){
            if(isset($jobcard->jobcardable->skills) ){
                if(sizeof($jobcard->jobcardable->skills) == 3){
                    $jobcard->skill .= "ERI";
                }
                else if(sizeof($jobcard->jobcardable->skills) == 1){
                    $jobcard->skill .= $jobcard->jobcardable->skills[0]->name;
                }
                else{
                    $jobcard->skill .= '';
                }
            }

        }

        foreach($DefectCard as $jobcard){
            $jobcard->aircraft .= $jobcard->jobcard->quotation->quotationable->aircraft->name;
        }

        $data = $alldata = json_decode($DefectCard);

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
    public function show(Project $project)
    {
        $quotation = Quotation::where('quotationable_id',$project->id)->first()->id;

        $defectcard = DefectCard::with('jobcard')
                                ->whereHas('jobcard', function ($query) use ($quotation){
                                    $query->where('quotation_id', $quotation);
                                })->get();

        $data = $alldata = json_decode($defectcard);

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
        $DefectCard=DefectCard::with('jobcard');

        // if (!empty($request->task_type_id)) {
        //     $JobCard->whereHas('taskcard', function ($query) use ($request) {
        //         $query->where('task_id', $request->task_type_id);
        //     });
        // }
        // if (!empty($request->applicability_airplane)) {
        //     $JobCard->whereHas('applicability_airplane', function ($query) use ($request) {
        //         $query->whereIn('id', $request->applicability_airplane);
        //     });
        // }
        // if (!empty($request->otr_certification)) {
        //     $JobCard->whereHas('otr_certification', function ($query) use ($request) {
        //         $query->where('id', $request->otr_certification);
        //     });
        // }
        // if (!empty($request->project_no)) {
        //     $JobCard->orderBy('project_no', $request->project_no);
        // }
        // if (!empty($request->taskcard_routine_type)) {
        //     $JobCard->whereHas('taskcard_routine_type', function ($query) use ($request) {
        //     $query->where('task_id', $request->task_type_id);
        // });
        // // }
        // if (!empty($request->date_issued)) {
        //     $JobCard->orderBy('created_at', $request->date_issued);
        // }
        // if (!empty($request->jc_no)) {
        //     $JobCard->orderBy('number', $request->jc_no);
        // }
        // if (!empty($request->customer)) {
        //     $request->whereHas('otr_certification', function ($query) use ($request) {
        //         $query->where('id', $request->otr_certification);
        //     });
        // }
        // if (!empty($request->status_jobcard)) {
        //      $request->whereHas('statuses', function ($query) use ($request) {
        //     $query->where('id', $request->status_jobcard);
        // });
        // }

        $data = $alldata = json_decode($DefectCard);

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
