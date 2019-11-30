<?php

namespace App\Http\Controllers\Datatables;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;

class AttendanceDatatables extends Controller
{
    public function index(){
        ini_set('memory_limit', '-1');
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        //testing
        // $anam = Employee::where('id',50)->first();
        // $attendances = EmployeeAttendance::where('employee_id',$anam->id)->with('attendance_correction','attendance_overtime','employee','statuses','parent')->get();

        $attendances = EmployeeAttendance::with('attendance_correction','attendance_overtime','employee','statuses','parent')->get();

        foreach($attendances as $attendance){
            //Time converison from second
            if($attendance->parent){
                $attendance->attendance_correction = $attendance->parent->attendance_correction;
            }else{
                $attendance->attendance_correction = $attendance->attendance_correction;
            }

            if(sizeof($attendance->statuses) > 0){
                $statuses =  $attendance->statuses()->pluck('name')->toArray();
                $attendance->status = join(', ', $statuses);
            }

            $date = Carbon::createFromFormat('Y-m-d', $attendance->date);
            $attendance->day = $days[$date->dayOfWeek];
            $attendance->late = gmdate('H:i:s',$attendance->late_in);
            $attendance->earlier = gmdate('H:i:s',$attendance->earlier_out);
            $attendance->overtime = gmdate('H:i:s',$attendance->overtime);
        }

        $data = $alldata = json_decode($attendances);

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
