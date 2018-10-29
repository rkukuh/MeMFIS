<?php

namespace App\Http\Requests\Frontend;

use App\Models\Unit;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ItemStore extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'category' => [
                'required',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('of', 'item');
                }),
            ],
            'unit' => [
                'required',
                Rule::exists('units', 'id')->where(function ($query) {
                    $query->whereIn('type_id', (new Unit())->ofQuantity()->get());
                }),
            ],
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
