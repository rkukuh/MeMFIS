<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BenefitStore extends FormRequest
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
            'benefits_code' => 'required',
            'benefits_name' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
