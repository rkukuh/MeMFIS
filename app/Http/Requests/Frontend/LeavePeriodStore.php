<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Support\Carbon;
use App\Rules\LeavePeriodDateRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LeavePeriodStore extends FormRequest
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
            'period_start' => ['required','after_or_equal:'.Carbon::now()->toDateString(),new LeavePeriodDateRule($this->request->get("period_start"))],
            'period_end'=> ['required','date','after:period_start',new LeavePeriodDateRule($this->request->get("period_end"))]
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }

}
