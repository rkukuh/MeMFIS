<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Overtime;
use Carbon\Carbon;
use Auth;

class OvertimeDatatables extends Controller
{
    public function index()
    {
        $isAdmin = Auth::user()->hasRole("admin");
        $overtime_datas = null;
        $i = 0;
        $overtime = null;
        if ($isAdmin) {
            $overtime_datas = Overtime::all();
            $overtime = $this->getAllData($i,$overtime_datas);
            // $uuid = $validated["search-journal-val"];
            // $employee_id = Employee::where("uuid",$uuid)->first()->id;
        }else{
            $employee_id = Auth::id();
            $overtime_datas = Employee::find($employee_id)->overtime;
            $overtime = $this->getAllData($i,$overtime_datas);
            // $overtime = ($i,$overtime_datas);
            // echo json_encode($overtime_datas,JSON_PRETTY_PRINT);
        }
        
        // if empty, then quit.
        if (empty($overtime)) {
            // error_log("Setop");
            return response()->json($overtime);
        }
        // error_log("Lanjot");

        $data = $alldata = $overtime;

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

    private function getAllData($i,$overtime_datas)
    {
        $overtime = [];
        if (!empty($overtime_datas)) {
            foreach($overtime_datas as $od){
                $employee_data = $od->employee;
                $formated_start = Carbon::parse($od->start,"Asia/Jakarta")->toTimeString();
                $formated_end = Carbon::parse($od->end,"Asia/Jakarta")->toTimeString();
                $formatted_date = Carbon::parse($od->date,"Asia/Jakarta")->toDateString();
                $status_name = $od->statuses->name;
                $approvals = $od->approvals->toArray();
                $isApproved = "Approved";
                // check approvals
                if (empty($approvals)) {
                    $isApproved = "Approved";
                }else{
                    $isApproved = "Not Approved";
                }

                $overtime[$i] = [
                    "date" => $formatted_date,
                    "uuid" => $od->uuid,
                    "nrp" => $employee_data->code,
                    "employee_name" => $employee_data->first_name,
                    "start" => $formated_start,
                    "end" => $formated_end,
                    "total" => $od->total,
                    "desc" => $od->desc,
                    "status" => $status_name,
                    "id" => $od->id,
                    "isApproved"-> $isApproved
                ];
                $i++;
            }   
        }
        return $overtime;
    }
}
