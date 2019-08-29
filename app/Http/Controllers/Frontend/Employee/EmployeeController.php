<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EmployeeStore;
use App\Http\Requests\Frontend\EmployeeUpdate;
use App\Models\JobTittle;
use App\Models\Position;
use App\Models\Status;
use App\Models\Department;
use App\Models\Type;
use App\Models\BPJS;
use App\Models\Benefit;
use Carbon\Carbon;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.employee.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.employee.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\EmployeeStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStore $request)
    {

        $job_tittle = JobTittle::where('uuid', $request->job_title)->first()->id;
        $position = Position::where('uuid', $request->job_position)->first()->id;
        $statuses = Status::where('uuid', $request->employee_status)->first()->id;
        $department = Department::where('uuid', $request->department)->first()->id;

        $indirect = null;
        if($request->indirect_supervisor){
            $indirect = Employee::where('uuid', $request->indirect_supervisor)->first()->id;   
        }

        $supervisor = null;
        if($request->supervisor){
        $supervisor = Employee::where('uuid', $request->indirect_supervisor)->first()->id;
        }

        $time = Carbon::now();

        $employee = Employee::create([
            'code' => $request->code,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'dob_place' => $request->dob_place,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'nationality' => $request->nationality,
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip_code,
            'joined_date' => $request->joined_date,
            'job_tittle_id' => $job_tittle,
            'position_id' => $position,
            'statuses_id' => $statuses,
            'department_id' => $department,
            'indirect_supervisor_id' => $indirect,
            'supervisor_id' => $supervisor,
            'created_at' => $time,
            'updated_at' => null,
        ]);

        $employee->addresses()->create([
            'address' => $request->address_line_1,
            'type_id' => Type::where('of','address')->where('code','address_1')->first()->id,
            'created_at' => $time,
            'updated_at' => null
        ]);

        if($request->address_line_2){
            $employee->addresses()->create([
                'address' => $request->address_line_2,
                'type_id' => Type::where('of','address')->where('code','address_2')->first()->id,
                'created_at' => $time,
                'updated_at' => null
            ]);
        }

        $employee->phones()->create([
            'number' => $request->mobile_phone,
            'type_id' => Type::where('of','phone')->where('code','mobile')->first()->id,
            'created_at' => $time,
            'updated_at' => null
        ]);

        if($request->work_phone){
            $employee->phones()->create([
                'number' => $request->work_phone,
                'type_id' => Type::where('of','phone')->where('code','work')->first()->id,
                'created_at' => $time,
                'updated_at' => null
            ]);
        }

        if($request->other_phone){
            $employee->phones()->create([
                'number' => $request->other_phone,
                'type_id' => Type::where('of','phone')->where('code','other')->first()->id,
                'created_at' => $time,
                'updated_at' => null
            ]);
        }

        $employee->emails()->create([
            'address' => $request->email_1,
            'type_id' => Type::where('of','email')->where('code','email_1')->first()->id,
            'created_at' => $time,
            'updated_at' => null
        ]);

        if($request->email_2){
        $employee->emails()->create([
            'address' => $request->email_2,
            'type_id' => Type::where('of','email')->where('code','email_2')->first()->id,
            'created_at' => $time,
            'updated_at' => null
        ]);
        }

        if($request->card_number){
            $employee->documents()->create([
                'number' => $request->card_number,
                'type_id' => Type::where('of','document')->where('code','ktp')->first()->id,
                'created_at' => $time,
                'updated_at' => null
            ]);
        }

        // if($request->document){
            // $employee->addMediaFromRequest()->toMediaCollection('ktp');
            // $employee->media()->create([
            //     'address' => $request->email_2,
            //     'type_id' => Type::where('of','email')->where('code','email_2')->first()->id
            // ]);
            // }

        // TODO: Return error message as JSON
        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //Basic Information
        $dateOfBirth = $employee->dob;
        $age = Carbon::parse($dateOfBirth)->age;

        $data_documents = $employee->documents()->whereNull('documents.updated_at')->get();
        $data_emails = $employee->emails()->whereNull('emails.updated_at')->get();
        $data_addreses = $employee->addresses()->whereNull('addresses.updated_at')->get();
        $data_phones = $employee->phones()->whereNull('phones.updated_at')->get();

        $documents[] = null; 
        $emails[] = null;
        $addreses[] = null;
        $phones[] = null;

        foreach($data_documents as $dd){
            $type = Type::find($dd->type_id);
            $documents[$type->code] = $dd->address;
        }

        foreach($data_emails as $e){
            $type = Type::find($e->type_id);
            $emails[$type->code] = $e->address;
        }

        foreach($data_addreses as $ad){
            $type = Type::find($ad->type_id);
            $addreses[$type->code] = $ad->address;
        }

        foreach($data_phones as $p){
            $type = Type::find($p->type_id);
            $phones[$type->code] = $p->number;
        }

        $jobDetails[] = null;
 
        if($employee->job_tittle()->first()){
            $jobDetails['job_tittle'] = $employee->job_tittle()->first()->name;
        };
        if($employee->position()->first()){
            $jobDetails['position'] = $employee->position()->first()->name;
        }
        if($employee->statuses()->first()){
            $jobDetails['status'] = $employee->statuses()->first()->name;
        }
        if($employee->department()->first()){
            $jobDetails['department'] = $employee->department()->first()->name;
        }
        if($employee->indirect_supervisor()->first()){
            $first_name = $employee->indirect_supervisor()->first()->first_name;
            $last_name = $employee->indirect_supervisor()->first()->last_name;

            if($last_name == $first_name){
                $name = $first_name;
            }else{
                $name = $first_name.' '.$last_name;
            }
            $jobDetails['indirect'] = $name;
        }
        if($employee->supervisor()->first()){
            $first_name = $employee->supervisor()->first()->first_name;
            $last_name = $employee->supervisor()->first()->last_name;

            if($last_name == $first_name){
                $name = $first_name;
            }else{
                $name = $first_name.' '.$last_name;
            }
        $jobDetails['supervisor'] = $name;
        }
        
        //BASIC INFORMATION HISTORY
        $employee_history = DB::table('employee_histories')->where('employee_id',$employee->id)->whereNotNull('updated_at')->orderBy('created_at','desc')->get();
       
        $history[] = null;

        $i = 0;
        foreach($employee_history as $ht){
            $addresses_history = null;
            $phones_history = null;
            $emails_history = null;

            $addresses_history_data = $employee->addresses()->where('type_id',Type::where('code','address_1')->first()->id)->where('addresses.created_at',$ht->created_at)->whereNotNull('addresses.updated_at')->first();
            $phones_history_data = $employee->phones()->where('type_id',Type::where('code','mobile')->first()->id)->where('phones.created_at',$ht->created_at)->whereNotNull('phones.updated_at')->first();
            $emails_history_data = $employee->emails()->where('type_id',Type::where('code','email_1')->first()->id)->where('emails.created_at',$ht->created_at)->whereNotNull('emails.updated_at')->first();


            if(isset($addresses_history_data->address)){
                $addresses_history = $addresses_history_data->address;
            }

            if(isset($phones_history_data->number)){
                $phones_history = $phones_history_data->number;
            }

            if(isset($emails_history_data->address)){
                $emails_history = $emails_history_data->address;
            }

            if($ht->last_name == $ht->first_name){
                $name = $ht->first_name;
            }else{
                $name = $ht->first_name.' '.$ht->last_name;
            }

            if($ht->gender == 'f'){
                $gender = 'Female';
            }else if($ht->gender == 'm'){
                $gender = 'Male';
            }else{
                $gender = null;
            }

            $job_tittle = null;
            if($ht->job_tittle_id){
                $job_tittle = JobTittle::where('id',$ht->job_tittle_id)->first()->name;
            }

            $position = null;
            if($ht->position_id){
                $position = Position::where('id',$ht->position_id)->first()->name;
            }

            $status = null;
            if($ht->statuses_id){
                $status = Status::where('id',$ht->statuses_id)->first()->name;
            }

            $department = null;
            if($ht->department_id){
                $department = Department::where('id',$ht->department_id)->first()->name;
            }

            $indirect_supervisor = null;
            if($ht->indirect_supervisor_id){
                $indirect_supervisor_data = Employee::where('id',$ht->indirect_supervisor_id)->first();
                
                if($indirect_supervisor_data->last_name == $indirect_supervisor_data->first_name){
                    $indirect_supervisor = $indirect_supervisor_data->first_name;
                }else{
                    $indirect_supervisor = $indirect_supervisor_data->first_name.' '.$indirect_supervisor_data->last_name;
                }
            }

            $supervisor = null;
            if($ht->supervisor_id){
                $supervisor_data = Employee::where('id',$ht->supervisor_id)->first();
                
                if($supervisor_data->last_name == $supervisor_data->first_name){
                    $supervisor = $supervisor_data->first_name;
                }else{
                    $supervisor = $supervisor_data->first_name.' '.$supervisor_data->last_name;
                }
            }

            $history[$i] = [
                'created_at' => $ht->created_at,
                'updated_at' => $ht->updated_at,
                'name' => $name,
                'code' => $ht->code,
                'dobdata' => $ht->dob.' & '.$ht->dob_place,
                'gender' => $gender,
                'nationality' => $ht->nationality,
                'religion' => $ht->religion,
                'martial_status' => $ht->marital_status,
                'address_1' => $addresses_history,
                'city' => $ht->city,
                'country' => $ht->country,
                'mobile_phone' => $phones_history,
                'email_1' => $emails_history,
                'job_tittle' => $job_tittle,
                'position' => $position,
                'status' => $status,
                'department' => $department,
                'joined_date' => $ht->joined_date,
                'indirect_supervisor' => $indirect_supervisor,
                'supervisor' => $supervisor
            ];

            $i++;
        }

        return view('frontend.employee.employee.show',['employee' => $employee,'age' => $age,'documents' => $documents,'emails' => $emails,'addresses' => $addreses,'phones' => $phones,'jobDetails' => $jobDetails,'history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //Basic Information
        $dateOfBirth = $employee->dob;
        $age = Carbon::parse($dateOfBirth)->age;

        $data_documents = $employee->documents()->whereNull('documents.updated_at')->get();
        $data_emails = $employee->emails()->whereNull('emails.updated_at')->get();
        $data_addreses = $employee->addresses()->whereNull('addresses.updated_at')->get();
        $data_phones = $employee->phones()->whereNull('phones.updated_at')->get();

        $documents[] = null; 
        $emails[] = null;
        $addreses[] = null;
        $phones[] = null;


        foreach($data_documents as $dd){
            $type = Type::find($dd->type_id);
            $documents[$type->code] = $dd->address;
        }

        foreach($data_emails as $e){
            $type = Type::find($e->type_id);
            $emails[$type->code] = $e->address;
        }
        
        foreach($data_addreses as $ad){
            $type = Type::find($ad->type_id);
            $addreses[$type->code] = $ad->address;
        }

        foreach($data_phones as $p){
            $type = Type::find($p->type_id);
            $phones[$type->code] = $p->number;
        }

        $jobDetails[] = null;
 
        if($employee->job_tittle()->first()){
            $jobDetails['job_tittle'] = $employee->job_tittle()->first()->name;
        };
        if($employee->position()->first()){
            $jobDetails['position'] = $employee->position()->first()->name;
        }
        if($employee->statuses()->first()){
            $jobDetails['status'] = $employee->statuses()->first()->name;
        }
        if($employee->department()->first()){
            $jobDetails['department'] = $employee->department()->first()->name;
        }
        if($employee->indirect_supervisor()->first()){
            $first_name = $employee->indirect_supervisor()->first()->first_name;
            $last_name = $employee->indirect_supervisor()->first()->last_name;

            if($last_name == $first_name){
                $name = $first_name;
            }else{
                $name = $first_name.' '.$last_name;
            }
            $jobDetails['indirect'] = $name;
        }

        if($employee->supervisor()->first()){
        $first_name = $employee->supervisor()->first()->first_name;
        $last_name = $employee->supervisor()->first()->last_name;

            if($last_name == $first_name){
                $name = $first_name;
            }else{
                $name = $first_name.' '.$last_name;
            }
        $jobDetails['supervisor'] = $name;
        }

        //BASIC INFORMATION HISTORY
        $employee_history = DB::table('employee_histories')->where('employee_id',$employee->id)->whereNotNull('updated_at')->orderBy('created_at','desc')->get();
       
        $history[] = null;

        $i = 0;
        foreach($employee_history as $ht){
            $addresses_history = null;
            $phones_history = null;
            $emails_history = null;

            $addresses_history_data = $employee->addresses()->where('type_id',Type::where('code','address_1')->first()->id)->where('addresses.created_at',$ht->created_at)->whereNotNull('addresses.updated_at')->first();
            $phones_history_data = $employee->phones()->where('type_id',Type::where('code','mobile')->first()->id)->where('phones.created_at',$ht->created_at)->whereNotNull('phones.updated_at')->first();
            $emails_history_data = $employee->emails()->where('type_id',Type::where('code','email_1')->first()->id)->where('emails.created_at',$ht->created_at)->whereNotNull('emails.updated_at')->first();


            if(isset($addresses_history_data->address)){
                $addresses_history = $addresses_history_data->address;
            }

            if(isset($phones_history_data->number)){
                $phones_history = $phones_history_data->number;
            }

            if(isset($emails_history_data->address)){
                $emails_history = $emails_history_data->address;
            }

            if($ht->last_name == $ht->first_name){
                $name = $ht->first_name;
            }else{
                $name = $ht->first_name.' '.$ht->last_name;
            }

            if($ht->gender == 'f'){
                $gender = 'Female';
            }else if($ht->gender == 'm'){
                $gender = 'Male';
            }else{
                $gender = null;
            }

            $job_tittle = null;
            if($ht->job_tittle_id){
                $job_tittle = JobTittle::where('id',$ht->job_tittle_id)->first()->name;
            }

            $position = null;
            if($ht->position_id){
                $position = Position::where('id',$ht->position_id)->first()->name;
            }

            $status = null;
            if($ht->statuses_id){
                $status = Status::where('id',$ht->statuses_id)->first()->name;
            }

            $department = null;
            if($ht->department_id){
                $department = Department::where('id',$ht->department_id)->first()->name;
            }

            $indirect_supervisor = null;
            if($ht->indirect_supervisor_id){
                $indirect_supervisor_data = Employee::where('id',$ht->indirect_supervisor_id)->first();
                
                if($indirect_supervisor_data->last_name == $indirect_supervisor_data->first_name){
                    $indirect_supervisor = $indirect_supervisor_data->first_name;
                }else{
                    $indirect_supervisor = $indirect_supervisor_data->first_name.' '.$indirect_supervisor_data->last_name;
                }
            }

            $supervisor = null;
            if($ht->supervisor_id){
                $supervisor_data = Employee::where('id',$ht->supervisor_id)->first();
                
                if($supervisor_data->last_name == $supervisor_data->first_name){
                    $supervisor = $supervisor_data->first_name;
                }else{
                    $supervisor = $supervisor_data->first_name.' '.$supervisor_data->last_name;
                }
            }

            $history[$i] = [
                'created_at' => $ht->created_at,
                'updated_at' => $ht->updated_at,
                'name' => $name,
                'code' => $ht->code,
                'dobdata' => $ht->dob.' & '.$ht->dob_place,
                'gender' => $gender,
                'nationality' => $ht->nationality,
                'religion' => $ht->religion,
                'martial_status' => $ht->marital_status,
                'address_1' => $addresses_history,
                'city' => $ht->city,
                'country' => $ht->country,
                'mobile_phone' => $phones_history,
                'email_1' => $emails_history,
                'job_tittle' => $job_tittle,
                'position' => $position,
                'status' => $status,
                'department' => $department,
                'joined_date' => $ht->joined_date,
                'indirect_supervisor' => $indirect_supervisor,
                'supervisor' => $supervisor
            ];

            $i++;
        }

        //EMPLOYEE BENEFIT
        $employee_benefit = [];
        $employee_benefit_data = $employee->position()->get();

        if(isset($employee_benefit_data[0])){
            $j = 0;
            for($i=0; $i<count($employee_benefit_data[0]->benefits); $i++){
                if($employee_benefit_data[0]->benefits[$i]->pivot->updated_at == null){

                $base_calculation = null;
                if($employee_benefit_data[0]->benefits[$i]->base_calculation){
                    $base_calculation = Type::where('id',$employee_benefit_data[0]->benefits[$i]->base_calculation)->first()->name;
                }

                $prorate_calculation = null;
                if($employee_benefit_data[0]->benefits[$i]->prorate_calculation){
                    $prorate_calculation = Type::where('id',$employee_benefit_data[0]->benefits[$i]->prorate_calculation)->first()->name;
                }

                $employee_benefit[$j] = [
                    'benefit_uuid' => $employee_benefit_data[0]->benefits[$i]->uuid,
                    'benefit_name' => $employee_benefit_data[0]->benefits[$i]->name,
                    'min' => $employee_benefit_data[0]->benefits[$i]->pivot->min,
                    'max' => $employee_benefit_data[0]->benefits[$i]->pivot->max,
                    'base_calculation' => $base_calculation,
                    'prorate_calculation' => $prorate_calculation
                ];
                $j++;

            }
            }
        }

        //EMPLOYEE BPJS
        $employee_bpjs_data = BPJS::get();
        
        $button_parameter_data = $employee->where('employees.id',$employee->id)->with('employee_benefit','employee_bpjs','employee_provisions')->get();
        
        if(count($button_parameter_data[0]->employee_benefit) == 0 && count($button_parameter_data[0]->employee_bpjs) == 0 && count($button_parameter_data[0]->employee_provisions) == 0){
            $button_parameter = 'create';
        }else{
            $button_parameter = 'update';
        }
        
        //EMPLOYEE BENEFIT HISTORY
        $created_at = $employee->employee_provisions()->select('employee_provisions.created_at')->whereNotNull('employee_provisions.updated_at')->orderBy('created_at','DESC')->get();
        
        
        $j = 0;
        foreach($created_at as $ct){
            $employee_benefit_history_data[$j] = $employee->employee_benefit()->where('employee_benefit.created_at',$ct->created_at)->whereNotNull('employee_benefit.updated_at')->get();
            $employee_bpjs_history_data[$j] = $employee->employee_bpjs()->where('employee_bpjs.created_at',$ct->created_at)->whereNotNull('employee_bpjs.updated_at')->get();
            $employee_provisions_history_data[$j] = $employee->employee_provisions()->where('employee_provisions.created_at',$ct->created_at)->whereNotNull('employee_provisions.updated_at')->get();
        $j++;
        }

        $employee_benefit_history = [];
        
        if($j > 0){
        for ($g=0; $g < count($employee_provisions_history_data); $g++) {
            $employee_benefit_history[$g] = [
                'created_at' => $employee_provisions_history_data[$g][0]->created_at,
                'updated_at' => $employee_provisions_history_data[$g][0]->updated_at,
                'maximum_overtime' => $employee_provisions_history_data[$g][0]->maximum_overtime,
                'minimum_overtime' => $employee_provisions_history_data[$g][0]->minimum_overtime,
                'pph' => $employee_provisions_history_data[$g][0]->pph,
                'late_tolerance' => $employee_provisions_history_data[$g][0]->late_tolerance,
                'late_punishment' => $employee_provisions_history_data[$g][0]->late_punishment,
                'absence_punishment' => $employee_provisions_history_data[$g][0]->absence_punishment,
                'holiday_overtime' => $employee_provisions_history_data[$g][0]->holiday_overtime,
                'benefit' => $employee_benefit_history_data[$g],
                'bpjs' => $employee_bpjs_history_data[$g]
            ];

            for($t=0; $t<count($employee_benefit_history_data[$g]); $t++){
            $employee_benefit_history[$g]['benefit_name'][$t] = [
                'name' =>  Benefit::where('id',$employee_benefit_history_data[$g][$t]->benefit_id)->first()->name
                ];
            }

            for($t=0; $t<count($employee_bpjs_history_data[$g]); $t++){
                $employee_benefit_history[$g]['bpjs_name'][$t] = [
                    'name' => BPJS::where('id',$employee_bpjs_history_data[$g][$t]->bpjs_id)->first()->name
                    ];
                }
        }
        }
        //EMPLOYEE BENEFIT CURRENT
        $benefit_name_data = $employee->employee_benefit()->whereNull('employee_benefit.updated_at')->get();
        $bpjs_name_data = $employee->employee_bpjs()->whereNull('employee_bpjs.updated_at')->get();
        
        $benefit_name = [];
        $bpjs_name = [];

        $p = 0;
        foreach($benefit_name_data as $bnd){
            $benefit_name[$p] = [
                'name' => Benefit::where('id',$bnd->benefit_id)->first()->name
            ];
            $p++;
        }
        
        $q = 0;
        foreach($bpjs_name_data as $bpd){
            $bpjs_name[$q] = [
                'name' => BPJS::where('id',$bpd->bpjs_id)->first()->name
            ];
            $q++;
        }
        $current = [
            'provisions' => $employee->employee_provisions()->whereNull('employee_provisions.updated_at')->get(),
            'benefit_name' => $benefit_name,
            'benefit' => $employee->employee_benefit()->whereNull('employee_benefit.updated_at')->get(),
            'bpjs_name' => $bpjs_name,
            'bpjs' => $employee->employee_bpjs()->whereNull('employee_bpjs.updated_at')->get()
        ];
        
        
        // dd($bpjs_name);
        // dd($benefit_name);
        // dd(count($employee_bpjs_history_data[0]));
        // dd($employee_benefit_history);
        // dd($bpjs_name_history);
        // dd($employee_benefit_history_data[0][1]->benefit_id);
        // dd($current['benefit']);
        // dd($employee_provisions_history_data);
        // dd(count($employee_bpjs_history_data));
        // dd($created_at);
        // dd($employee_provisions_history_data[0][0]->created_at);
        // dd($employee_bpjs_history_data);
        // dd($emails);
        // dd($data_phones);
        return view('frontend.employee.employee.edit',[
        'employee' => $employee,
        'age' => $age,
        'documents' => $documents,
        'emails' => $emails,
        'addresses' => $addreses,
        'phones' => $phones,
        'jobDetails' => $jobDetails,
        'history' => $history,
        'employee_benefit' => $employee_benefit,
        'employee_bpjs' => $employee_bpjs_data,
        'button_parameter' => $button_parameter,
        'current' => $current,
        'employee_benefit_history' =>  $employee_benefit_history
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\EmployeeUpdate  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdate $request, Employee $employee)
    {
        $job_tittle = JobTittle::where('uuid', $request->job_tittle)->first()->id;
        $position = Position::where('uuid', $request->job_position)->first()->id;
        $statuses = Status::where('uuid', $request->employee_status)->first()->id;
        $department = Department::where('uuid', $request->department)->first()->id;

        $indirect = null;
        if($request->indirect_supervisor){
            $indirect = Employee::where('uuid', $request->indirect_supervisor)->first()->id;   
        }

        $supervisor = null;
        if($request->supervisor){
        $supervisor = Employee::where('uuid', $request->supervisor)->first()->id;
        }

        $time_update = Carbon::now();

        $employee->addresses()->whereNull('addresses.updated_at')->update([
            'updated_at' => $time_update
        ]);

        $employee->phones()->whereNull('phones.updated_at')->update([
            'updated_at' => $time_update
        ]);

        $employee->emails()->whereNull('emails.updated_at')->update([
            'updated_at' => $time_update
        ]);

        $employee->documents()->whereNull('documents.updated_at')->update([
            'updated_at' => $time_update
        ]);

        $employee->history()->create([
            'code' => $employee->code,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'dob' => $employee->dob,
            'dob_place' => $employee->dob_place,
            'gender' => $employee->gender,
            'religion' => $employee->religion,
            'marital_status' => $employee->marital_status,
            'nationality' => $employee->nationality,
            'country' => $employee->country,
            'city' => $employee->city,
            'zip' => $employee->zip_code,
            'joined_date' => $employee->joined_date,
            'job_tittle_id' => $employee->job_tittle_id,
            'position_id' => $employee->position_id,
            'statuses_id' => $employee->statuses_id,
            'department_id' => $employee->department_id,
            'indirect_supervisor_id' => $employee->indirect_supervisor_id,
            'supervisor_id' => $employee->supervisor_id,
            'created_at' => $employee->created_at->toDateTimeString(),
            'updated_at' => $time_update,
        ]);

        $employee->addresses()->create([
            'address' => $request->address_line_1,
            'type_id' => Type::where('of','address')->where('code','address_1')->first()->id,
            'created_at' => $time_update,
            'updated_at' => null
        ]);

        if($request->address_line_2){
            $employee->addresses()->create([
                'address' => $request->address_line_2,
                'type_id' => Type::where('of','address')->where('code','address_2')->first()->id,
                'created_at' => $time_update,
                'updated_at' => null
            ]);
        }

        $employee->phones()->create([
            'number' => $request->mobile_phone,
            'type_id' => Type::where('of','phone')->where('code','mobile')->first()->id,
            'created_at' => $time_update,
            'updated_at' => null
        ]);

        if($request->work_phone){
            $employee->phones()->create([
                'number' => $request->work_phone,
                'type_id' => Type::where('of','phone')->where('code','work')->first()->id,
                'created_at' => $time_update,
                'updated_at' => null
            ]);
        }

        if($request->other_phone){
            $employee->phones()->create([
                'number' => $request->other_phone,
                'type_id' => Type::where('of','phone')->where('code','other')->first()->id,
                'created_at' => $time_update,
                'updated_at' => null
            ]);
        }

        $employee->emails()->create([
            'address' => $request->email_1,
            'type_id' => Type::where('of','email')->where('code','email_1')->first()->id,
            'created_at' => $time_update,
            'updated_at' => null
        ]);

        if($request->email_2){
        $employee->emails()->create([
            'address' => $request->email_2,
            'type_id' => Type::where('of','email')->where('code','email_2')->first()->id,
            'created_at' => $time_update,
            'updated_at' => null
        ]);
        }

        if($request->card_number){
            $employee->documents()->create([
                'number' => $request->card_number,
                'type_id' => Type::where('of','document')->where('code','ktp')->first()->id,
                'created_at' => $time_update,
                'updated_at' => null
            ]);
        }

        $employee->update([
            'code' => $request->code,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'dob_place' => $request->dob_place,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'nationality' => $request->nationality,
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip_code,
            'joined_date' => $request->joined_date,
            'job_tittle_id' => $job_tittle,
            'position_id' => $position,
            'statuses_id' => $statuses,
            'department_id' => $department,
            'indirect_supervisor_id' => $indirect,
            'supervisor_id' => $supervisor,
            'created_at' => $time_update,
            'updated_at' => $time_update,
        ]);

        // TODO: Return error message as JSON
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        // TODO: Return error message as JSON
        return response()->json($employee);
    }
}
