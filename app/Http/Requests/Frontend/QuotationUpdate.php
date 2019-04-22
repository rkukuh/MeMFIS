<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuotationUpdate extends FormRequest
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
            'customer_id' => 'required|exists:customers,id', 
            'project_id' => 'required|exists:projects,id', 
            'requested_at' => 'required|date', 
            'valid_until' => 'required|date', 
            'currency_id' => 'required|exists:currencies,id', 
            'exchange_rate' => 'required', 
            'scheduled_payment_amount' => 'required', 
            'scheduled_payment_type' => 'required', 
            'description' => 'required', 
            // 'title' => 'required', 
            // 'term_of_payment' => 'required',
            // 'name' => 'required|min:3|max:50|regex:/^[\pL\s\-]+$/u',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
