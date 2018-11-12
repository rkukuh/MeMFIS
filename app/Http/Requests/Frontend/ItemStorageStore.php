<?php

namespace App\Http\Requests\Frontend;

use App\Models\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ItemStorageStore extends FormRequest
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
            'min' => 'required|integer|min:0',
            'max' => 'required|gt:min',
            'storage_id' => [
                'required',
                Rule::exists('storages', 'id')->where(function ($query) {
                    $query->where('is_active', '1');
                }),
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
            'storage_id.exists' => 'The selected storage is invalid.',
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
