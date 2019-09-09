<?php

namespace App\Http\Requests\Frontend;

use App\Models\Item;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            //
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
        // $validator->after(function ($validator) {
        //     $this->merge(['quotation_unit' => '1']);

        //     $item = Item::where('uuid',$this->item_id)->first();
        //     if($this->unit_id == "".$item->unit_id.""){
        //         //
        //     }
        //     else{
        //         if($qty_uom2 = $item->units->where('uom.unit_id',$this->unit_id)->first() == null){
        //             $validator->errors()->add('quantity', 'UOM have not Declared');
        //         }

        //     }
        // });
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
