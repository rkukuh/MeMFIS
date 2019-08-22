<?php

namespace App\Http\Requests\Frontend;

use App\Models\DefectCard;
use Illuminate\Validation\Rule;
use App\Models\QuotationDefectCardItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuotationDefectCardItemUpdate extends FormRequest
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
        $validator->after(function ($validator) {
        $item = QuotationDefectCardItem::where('uuid',$this->uuid)->first();
        $tc = DefectCard::find($item->defectcard_id);
        $unit =  $this->unit_id;
        $qty = $this->quantity;
        $tc_i = $tc->items->where('pivot.item_id',$item->item_id)->first();
        if($tc_i->pivot->unit_id == $unit){
            if($qty > $tc_i->pivot->quantity){
            $validator->errors()->add('quantity', 'Quantity exceed limit');
            }
        }else if($unit == $tc_i->unit_id){
            $qty_uom = $tc_i->units->where('uom.unit_id',$tc_i->pivot->unit_id)->first()->uom->quantity; // quantity conversi
            $qty_pri = 1/$qty_uom;
            $result = $qty_pri*$qty;
            if($result > $tc_i->pivot->quantity){
            $validator->errors()->add('quantity', 'Quantity exceed limit');
            }
        }else{
            if($qty_uom2 = $tc_i->units->where('uom.unit_id',$unit)->first() == null){
                $validator->errors()->add('quantity', 'UOM have not Declared');
            }
            else{
                $qty_uom2 = $tc_i->units->where('uom.unit_id',$unit)->first()->uom->quantity; // quantity conversi
                $result2 = $qty_uom2*$qty;
                $qty_uom = $tc_i->units->where('uom.unit_id',$tc_i->pivot->unit_id)->first()->uom->quantity; // quantity conversi
                $qty_pri = 1/$qty_uom;
                $result = $qty_pri*$result2;
                    if($result > $tc_i->pivot->quantity){
                        $validator->errors()->add('quantity', 'Quantity exceed limit');
                    }
                }
            }
        });
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
