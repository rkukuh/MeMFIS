<?php

namespace App\Http\Controllers\Datatables;

use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;

class AttendanceDatatables extends Controller
{
    public function index(){
        ini_set('memory_limit', '-1');
        $anam = Employee::where('code','18040060')->first();
        $raw_attendance = EmployeeAttendance::where('employee_id',$anam->id)->get();

        $attendance = [];

        foreach($raw_attendance as $i => $ra){
            $statuses = null;

            // if($leave){
            //     $ra->statuses_name .= "On Leave";
            // }
       
            $employee_data = $ra->employee()->get();
            $employee_statuses = $ra->statuses()->get();

            $name = $employee_data[0]->first_name;
            $nrp = $employee_data[0]->code;

            if($ra->leave){
                $statuses = "ON LEAVE";

            }elseif(isset($employee_statuses[0])){
                $statuses = $employee_statuses[0]->name;
            }

            if($employee_data[0]->first_name != $employee_data[0]->last_name){
                $name = $employee_data[0]->first_name.' '.$employee_data[0]->last_name;
            }

            //Time converison from second
            $late = gmdate('H:i:s',$ra->late_in);
            $earlier = gmdate('H:i:s',$ra->earlier_out);
            $overtime = gmdate('H:i:s',$ra->overtime);
                                                               

            $attendance[$i] = [
                'uuid' => $ra->uuid,
                'nrp' => $nrp,
                'employee_name' => $name,
                'date' => $ra->date,
                'days' => date('l', strtotime($ra->date)),
                'in' => $ra->in,
                'out' => $ra->out,
                'late_in' => $late,
                'earlier_out' => $earlier,
                'overtime' => $overtime,
                'second' => $ra->overtime,
                'statuses_name' => $statuses,
                'leave' => $ra->leave
            ];
        }

        $data = $alldata = $attendance;

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
