<?php

namespace App\Http\Controllers\Frontend;

use DB;
use Carbon\Carbon;
use App\Models\Type;
use App\Models\License;
use App\Models\Employee;
use App\Models\ListUtil;
use App\Models\GeneralLicense;
use App\Http\Controllers\Controller;
use App\Models\Pivots\EmployeeLicense;
use App\Http\Requests\Frontend\GeneralLicenseStore;
use App\Http\Requests\Frontend\GeneralLicenseUpdate;

class GeneralLicenseController extends Controller
{
    /**
     * Show data from model for DataTable.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGeneralLicenses()
    {
        // GeneralLicense::with('employee_license')->get()
        // $employees = Employee::with('general_licenses')->get();
        // $employees = Employee::with('general_licenses')->first();
        $general_licenses = DB::table('employees')
                ->join('employee_license', 'employee_license.employee_id', '=', 'employees.id')
                ->join('licenses', 'licenses.id', '=', 'employee_license.license_id')
                ->join('general_licenses', 'general_licenses.employee_license_id', '=', 'employee_license.id')
                ->select('general_licenses.*', 'employee_license.code', 'employee_license.issued_at', 'employee_license.revoke_at', 'employee_license.valid_until','employee_license.employee_id','employees.first_name')
                // ->where('employee_license.employee_id',$employee)
                // ->where('general_licenses.id',$generallicense)
                ->get();

        

        $data = $alldata = json_decode($general_licenses);

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GeneralLicenseStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneralLicenseStore $request)
    {
        $employee =  Employee::find($request->name);
        $general_license = License::where('code', 'general-license')->first();

        $employee->licenses()->attach($general_license, [
            'code' => $request->code,
            'issued_at' => Carbon::createFromFormat('Y-m-d', $request->issued_at),
            'valid_until' => Carbon::createFromFormat('Y-m-d', $request->valid_until),
            'revoke_at' => Carbon::createFromFormat('Y-m-d', $request->revoke_at),
        ]);

        $employeelicense = EmployeeLicense::whereHas('employee', function ($query) use ($employee) {
            return $query->where('employee_id', $employee->id);
        })
        ->where('code', $request->code)
        ->first()
        ->general_licenses()
        ->createMany([
            [
                'aviation_degree' => $request->aviation_degree,
                'aviation_degree_no' => $request->aviation_degree_no,
                'exam_no' => $request->exam_no,
                'exam_date' => Carbon::createFromFormat('Y-m-d',$request->exam_date),
                'attendance_no' => $request->attendance_no,
            ]
        ]);

        return response()->json($employeelicense);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function edit($generallicense, $employee)
    {
        $general_license = DB::table('employees')
                ->join('employee_license', 'employee_license.employee_id', '=', 'employees.id')
                ->join('licenses', 'licenses.id', '=', 'employee_license.license_id')
                ->join('general_licenses', 'general_licenses.employee_license_id', '=', 'employee_license.id')
                ->select('general_licenses.*', 'employee_license.code', 'employee_license.issued_at', 'employee_license.revoke_at', 'employee_license.valid_until','employee_license.employee_id','employees.first_name')
                ->where('employee_license.employee_id',$employee)
                ->where('general_licenses.id',$generallicense)
                ->first();
        // dd($general_licenses);
        // $employee = Employee::with('general_licenses')->find($employee);
        //     dd($employee);
        //    dd($employee->general_licenses->code);
        // $general_license = GeneralLicense::find($generallicense);
        return response()->json($general_license);

        // dd($general_license);

    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function employeeLicense($generallicense, $employee)
    {
        $general_license = EmployeeLicense::find($generallicense);
        return response()->json($general_license);

        // dd($general_license);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GeneralLicenseUpdate  $request
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralLicenseUpdate $request, GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralLicense $generalLicense)
    {
        $user->roles()->detach($roleId);
    }
}
