<?php

namespace App\Http\Requests\Frontend;

use App\Models\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ItemStorageUpdate extends FormRequest
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

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
