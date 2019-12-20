<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RIRUpdate extends FormRequest
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
            'packing_type' => 'required',
            'packing_condition' => 'required',
            'preservation_check' => 'required',
            'material_condition' => 'required',
            'material_quality' => 'required',
            'material_identification' => 'required',

        ];
    }
}
