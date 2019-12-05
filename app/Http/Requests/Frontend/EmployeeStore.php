<?php

namespace App\Http\Requests\Frontend;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Status;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Religion;
use App\Models\JobTitle;
use App\Models\Department;
use App\Models\Nationality;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:employees',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|before:'.Carbon::now(),
            'joined_date' => 'required|before_or_equal:'.Carbon::now()->toDateString(),
            'gender' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'address_line_1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'mobile_phone' => 'required',
            'email_1' => 'required',
            'job_title' => 'required',
            'job_position' => 'required',
            'employee_status' => 'required',
            'department' => 'required',
            'document' => 'nullable|image'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $this->merge([
                'created_at' => Carbon::now(),
                'job_title_id' => optional(JobTitle::where('uuid', $this->job_title)->first())->id,
                'position_id' => optional(Position::where('uuid', $this->job_position)->first())->id,
                'statuses_id' =>  optional(Status::where('uuid', $this->employee_status)->first())->id,
                'department_id' =>  optional(Department::where('uuid', $this->department)->first())->id,
                'supervisor_id' => optional(Employee::where('uuid', $this->supervisor)->first())->id,
                'indirect_supervisor_id' =>  optional(Employee::where('uuid', $this->indirect_supervisor)->first())->id,
                'gender_id' => optional(Type::ofGender()->where('uuid', $this->gender)->first())->id,
                'religion_id' => optional(Religion::where('uuid', $this->religion)->first())->id,
                'marital_id' => optional(Status::ofMarital()->where('uuid', $this->marital_status)->first())->id,
                'country_id' => optional(Country::where('uuid', $this->country)->first())->id,
                'nationality_id' => optional(Nationality::where('uuid', $this->nationality)->first())->id,
                ]);
        });
    }
}
