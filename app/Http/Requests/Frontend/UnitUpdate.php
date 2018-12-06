<?php

namespace App\Http\Requests\Frontend;

use App\Models\Type;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UnitUpdate extends FormRequest
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
            'name' => 'required',
            'symbol' => 'required',
            'type_id' => [
                'required',
                // Rule::exists('type', 'id')->where(function ($query) {
                //     $query->whereIn('id', (new Type())->ofUnit()->get());
                // }),
            ],
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
            'type_id.exists' => 'The selected Type is invalid.',
        ];
    }

    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()])); 
    }
}
