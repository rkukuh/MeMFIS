<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeBenefitUpdate extends FormRequest
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
            'uuid_benefit' => 'required|array',
            'amount' => 'required|array',
            'uuid_bpjs' => 'required|array',
            'employee_paid' => 'required|array',
            'employee_min' => 'required|array',
            'employee_max' => 'required|array',
            'company_paid' => 'required|array',
            'company_min' => 'required|array',
            'company_max' => 'required|array',
            'maximum_overtime' => 'required',
            'minimum_overtime' => 'required',
            'holiday_overtime' => 'required',
            'pph' => 'required',
            'late_tolerance' => 'required',
            'late_punishment' => 'required',
            'absence_punishment' => 'required' 
        ];
    }


    /**
     * Set custom validation error message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'uuid_bpjs.required' => 'BPJS is required, please select at least one.',
            'amount.required' => 'Allowance is required, please select at least one.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
