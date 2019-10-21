<?php

namespace App\Http\Requests\Frontend;

use App\Models\PurchaseOrder;
use App\Models\GoodsReceived;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GoodsReceivedItemStore extends FormRequest
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
            $item = $this->route('item');
            $PurchaseOrder_id = $this->route('goodsReceived')->purchase_order_id;
            $PurchaseOrder = PurchaseOrder::find($PurchaseOrder_id);
            $quantity_item_pr = $PurchaseOrder->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;

            $GoodsReceiveds = GoodsReceived::where('purchase_order_id',$PurchaseOrder_id)->wherehas('approvals')->get();

            $quantity_item_po = 0;

            foreach($GoodsReceiveds as $GoodsReceived){
                $quantity_item_po = $quantity_item_po + $GoodsReceived->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
            }

            if($this->unit_id <> $item->unit_id){
                $quantity = $this->quantity;
                $qty_uom = $item->units->where('uom.unit_id',$this->unit_id)->first()->uom->quantity;
                $quantity_unit = $qty_uom*$quantity;
            }
            else{
                $quantity_unit = $this->quantity;
            }

            $quantity_validate = $quantity_item_po+$quantity_unit;

            if($quantity_validate > $quantity_item_pr){
                $validator->errors()->add('quantity', 'Quantity exceed limit');
            }
        });
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
