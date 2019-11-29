<?php

namespace App\Http\Requests\Frontend;

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
            'joined_name' => 'required',
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
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
