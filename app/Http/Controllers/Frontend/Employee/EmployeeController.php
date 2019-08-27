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
        $employee_history = DB::table('employee_histories')->where('employee_id',$employee->id)->whereNotNull('updated_at')->get();
       
        foreach($employee_history as $ht){

        }

        
        dd($employee_history);
        // dd($employee->addresses()->whereNotNull('updated_at')->where('addresses.created_at',$time)->get());
        // return view('frontend.employee.employee.show',['employee' => $employee,'age' => $age,'documents' => $documents,'emails' => $emails,'addresses' => $addreses,'phones' => $phones,'jobDetails' => $jobDetails]);
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

        return view('frontend.employee.employee.edit',['employee' => $employee,'age' => $age,'documents' => $documents,'emails' => $emails,'addresses' => $addreses,'phones' => $phones,'jobDetails' => $jobDetails]);
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
