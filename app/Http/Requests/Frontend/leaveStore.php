<?php

namespace App\Http\Requests\Frontend;

use App\Models\Leave;
use App\Models\Status;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Helpers\DocumentNumber;

use Illuminate\Foundation\Http\FormRequest;

class leaveStore extends FormRequest
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
            'leave_type'    => 'required:exists:leavetypes,uuid',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date',
            'description'   => 'required',
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
                'leavetype_id' => optional(LeaveType::where('uuid', $this->leave_type)->first())->id,
                'code' => DocumentNumber::generate('LEAV-', Leave::withTrashed()->whereYear('created_at', date("Y"))->count()+1),
                'status_id' => optional(Status::ofLeave()->where('code','open')->first())->id,
                ]);
        });
    }
}
