<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DiscrepancyStore extends FormRequest
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
            'propose' => 'required',
            'zone[]' => 'required',
            'skill_id' => 'required',
            'complaint' => 'required',
            'estimation_manhour' => 'required',
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
            'project_id.required' => 'The work order field is required.',
            'requested_at.required' => 'The request date field is required.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
