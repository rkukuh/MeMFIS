<?php

namespace App\Http\Requests\Frontend;

use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Foundation\Http\FormRequest;

class leaveUpdate extends FormRequest
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
            //
        ];
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
                'employee_id' => optional(Employee::where('uuid', $this->employee_uuid)->first())->id,
                'leavetype_id' => optional(LeaveType::where('code', $this->attendance_correction_time_type)->first())->id
                ]);
        });
    }
}
