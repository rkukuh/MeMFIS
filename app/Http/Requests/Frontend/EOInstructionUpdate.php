<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EOInstructionUpdate extends FormRequest
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
            'estimation_manhour' => 'required|numeric',
            'performance_factor' => 'required|numeric',
            'work_area' => 'required|exists:types,id',
            'helper_quantity' => 'required|numeric',
            'engineer_quantity' => 'required|numeric',
        ];
    }
}
