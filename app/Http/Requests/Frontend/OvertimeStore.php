<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OvertimeDateRule;
use App\Rules\OvertimeTimesRule;

class OvertimeStore extends FormRequest
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
            "date" => ["bail","required", new OvertimeDateRule],
            "start_time" => "required",
            "end_time" => ["required",new OvertimeTimesRule($this->request->get("start_time"))],
            "description" => "bail|required|min:5|max:100"
        ];
    }
}
