<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Carbon\Carbon;

class EmployeeUpdate extends FormRequest
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
            'code' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|before:'.Carbon::now(),
            'gender' => 'required',
            'nationality' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'address_line_1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'mobile_phone' => 'required',
            'email_1' => 'required',
            'joined_date' => 'required|before_or_equal:'.Carbon::now()->toDateString(),
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
                ]);
        });
    }
}
