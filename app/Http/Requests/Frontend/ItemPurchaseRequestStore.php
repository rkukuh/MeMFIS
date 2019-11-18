<?php

namespace App\Http\Requests\Frontend;

use App\Models\Item;
use App\Models\Unit;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ItemPurchaseRequestStore extends FormRequest
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
            'quantity' => 'required|numeric|min:0|not_in:0',
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
        $validator->after(function ($validator) {
            if (Unit::where('uuid', $this->unit_id)->first() == null) {
                $validator->errors()->add('quantity', 'Unit not found');
            } else {
                $unit_id = Unit::where('uuid', $this->unit_id)->first()->id;

                $item = Item::where('uuid', $this->item_id)->first();
                if ($unit_id == "" . $item->unit_id . "") {
                    //
                } else {
                    if ($qty_uom2 = $item->units->where('uom.unit_id', $unit_id)->first() == null) {
                        $validator->errors()->add('quantity', 'UOM have not Declared');
                    }

                }
            }

        });
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
