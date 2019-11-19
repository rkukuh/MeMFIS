<?php

namespace App\Http\Requests\Frontend;

use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PurchaseOrderItemUpdate extends FormRequest
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
            'quantity' => 'required',
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
            $PurchaseRequest_id = $this->route('purchaseOrder')->purchase_request_id;
            $PurchaseRequest = PurchaseRequest::find($PurchaseRequest_id);


            $PurchaseRequests = $PurchaseRequest->items()->where('uuid',$item->uuid)->get();
            // $quantity_item_pr = $PurchaseRequest->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
            $quantity_item_pr = 0;

            foreach($PurchaseRequests as $PurchaseRequest){
                    $quantity_item_pr = $quantity_item_pr + $PurchaseRequest->pivot->quantity_unit;
            }

            $PurchaseOrders = PurchaseOrder::where('purchase_request_id',$PurchaseRequest_id)->wherehas('approvals')->get();

            $quantity_item_po = 0;

            foreach($PurchaseOrders as $PurchaseOrder){
                $items_po = $PurchaseOrder->items()->where('uuid',$item->uuid)->get();
                foreach($items_po as $item_po){
                    $quantity_item_po = $quantity_item_po + $item_po->pivot->quantity_unit;
                }
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
