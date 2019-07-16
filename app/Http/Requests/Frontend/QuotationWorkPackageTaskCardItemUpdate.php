<?php

namespace App\Http\Requests\Frontend;

use App\Models\TaskCard;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuotationWorkPackageTaskCardItemUpdate extends FormRequest
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
            // dd($this->unit_id);
        // $validator->errors()->add('field', 'Something is wrong with this field!');
        $tc = TaskCard::find($this->tc_uuid);
        $unit =  $this->unit_id;
        $qty = $this->quantity;
        $tc_i = $tc->items->last();

        $tc_i = $tc->items->last();
        if($tc_i->pivot->unit_id == $unit){
            if($qty > $tc_i->pivot->quantity){
            $validator->errors()->add('field', 'Something is wrong with this field!');
            }
            // else{
            //     dd('lolos');
            // }
        }else if($unit == $tc->items->last()->unit_id){
            $qty_uom = $tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity; // quantity conversi
            $qty_pri = 1/$qty_uom;
            $result = $qty_pri*$qty;
            if($result > $tc_i->pivot->quantity){
            $validator->errors()->add('field', 'Something is wrong with this field!');
            }
            // else{
            //     dd('lolos');
            // }
        }else{
            $qty_uom2 = $tc->items->last()->units->where('uom.unit_id',$unit)->first()->uom->quantity; // quantity conversi
            $result2 = $qty_uom2*$qty;
            $qty_uom = $tc->items->last()->units->where('uom.unit_id',$tc->items->last()->pivot->unit_id)->first()->uom->quantity; // quantity conversi
            $qty_pri = 1/$qty_uom;
            $result = $qty_pri*$result2;
            if($result > $tc_i->pivot->quantity){
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
            // else{
            //     dd('lolos');
            // }
        }
        });
        // $validator->after(function ($validator) {
        //     $this->merge([
        //         'account_code' => optional(Journal::where('uuid', $this->account_code)->first())->id
        //     ]);
        // });
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
