<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequestUpdate extends FormRequest
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
            'requested_at' => 'required|date',
            'required_at' => 'required|date',
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
        //
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
    
}
