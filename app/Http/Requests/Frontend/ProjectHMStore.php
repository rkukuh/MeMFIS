<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectHMStore extends FormRequest
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
            'customer_id' => 'required',
            'no_wo' => 'required',
            'aircraft_id' => 'required|exists:aircrafts,id',
            'aircraft_register' => 'required',
            'aircraft_sn' => 'required',
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
            'aircraft_sn.required' => 'The aircraft serial number is required',
            'customer_id.required' => 'The customer is required',
            'aircraft_id.required' => 'The aircraft is required',
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
        //
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
