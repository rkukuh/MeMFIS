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
        $purchaseOrder = $this->route('purchaseOrder');
        $PurchaseRequest_id = $this->route('purchaseOrder')->purchase_request_id;
        $PurchaseRequest = PurchaseRequest::find($PurchaseRequest_id);
        $quantity_item_pr = $PurchaseRequest->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
        $quantity_item_po_now = $purchaseOrder->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;

        $PurchaseOrders = PurchaseOrder::where('purchase_request_id',$PurchaseRequest_id)->get();

        $quantity_item_po = 0;

        foreach($PurchaseOrders as $PurchaseOrder){
            $quantity_item_po = $quantity_item_po + $PurchaseOrder->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
        }

        if($this->unit_id <> $item->unit_id){
            $quantity = $this->quantity;
            $qty_uom = $item->units->where('uom.unit_id',$this->unit_id)->first()->uom->quantity;
            $quantity_unit = $qty_uom*$quantity;
        }
        else{
            $quantity_unit = $this->quantity;
        }

        $quantity_validate = $quantity_item_po-$quantity_item_po_now+$quantity_unit;

        if($quantity_validate > $quantity_item_pr){
            $validator->errors()->add('quantity', 'Quantity exceed limit');
        }
        // dd($itemPr);
        // $PurchaseOrder = PurchaseOrder::find()
        // $unit =  $this->unit_id;
        // $qty = $this->quantity;

        // $q_w_p_t_i = QuotationWorkPackageTaskCardItem::where('uuid',$this->uuid)->first();
        //     $taskcard = TaskCard::find($q_w_p_t_i->taskcard_id);
        //     if(in_array($taskcard->type->code, ["basic","sip","cpcp","si","preliminary"])){
        //         $tc_i = $taskcard->items->where('pivot.item_id',$q_w_p_t_i->item_id)->first();
        //         if($tc_i->pivot->unit_id == $unit){
        //             if($qty > $tc_i->pivot->quantity){
        //             $validator->errors()->add('quantity', 'Quantity exceed limit');
        //             }
        //         }else if($unit == $tc_i->unit_id){
        //             $qty_uom = $tc_i->units->where('uom.unit_id',$tc_i->pivot->unit_id)->first()->uom->quantity; // quantity conversi
        //             $qty_pri = 1/$qty_uom;
        //             $result = $qty_pri*$qty;
        //             if($result > $tc_i->pivot->quantity){
        //             $validator->errors()->add('quantity', 'Quantity exceed limit');
        //             }
        //         }else{
        //             if($qty_uom2 = $tc_i->units->where('uom.unit_id',$unit)->first() == null){
        //                 $validator->errors()->add('quantity', 'UOM have not Declared');
        //             }else{
        //                 $qty_uom2 = $tc_i->units->where('uom.unit_id',$unit)->first()->uom->quantity; // quantity conversi
        //                 $result2 = $qty_uom2*$qty;
        //                 $qty_uom_kebutuhan = $tc_i->units->where('uom.unit_id',$unit_kebutuhan->id)->first()->uom->quantity; // quantity conversi //$unit_kebutuhan->id diganti kebutuhan quantity
        //                 $quantity_convert = $result2/$qty_uom_kebutuhan;
        //                 if($quantity_convert > $quantity_kebutuhan){
        //                     $validator->errors()->add('quantity', 'Quantity exceed limit');
        //                 }
        //             }
        //         }
        //     }else if(in_array($taskcard->type->code, ["ad","sb","cmr","awl","eo","ea","htcrr"])){
        //         $eo_instruction = EOInstruction::find($q_w_p_t_i->eo_instruction_id);
        //         $instruction = $eo_instruction->items->where('pivot.item_id',$q_w_p_t_i->item_id)->first();
        //         if($instruction->pivot->unit_id == $unit){
        //             if($qty > $instruction->pivot->quantity){
        //             $validator->errors()->add('quantity', 'Quantity exceed limit');
        //             }
        //         }else if($unit == $instruction->unit_id){
        //             $qty_uom = $instruction->units->where('uom.unit_id',$instruction->pivot->unit_id)->first()->uom->quantity; // quantity conversi
        //             $qty_pri = 1/$qty_uom;
        //             $result = $qty_pri*$qty;
        //             if($result > $instruction->pivot->quantity){
        //             $validator->errors()->add('quantity', 'Quantity exceed limit');
        //             }
        //         }else{
        //             if($qty_uom2 = $instruction->units->where('uom.unit_id',$unit)->first() == null){
        //                 $validator->errors()->add('quantity', 'UOM have not Declared');
        //             }else{
        //                 $qty_uom2 = $instruction->units->where('uom.unit_id',$unit)->first()->uom->quantity; // quantity conversi
        //                 $result2 = $qty_uom2*$qty;
        //                 $qty_uom_kebutuhan = $instruction->units->where('uom.unit_id',$unit_kebutuhan->id)->first()->uom->quantity; // quantity conversi //$unit_kebutuhan->id diganti kebutuhan quantity
        //                 $quantity_convert = $result2/$qty_uom_kebutuhan;
        //                 if($quantity_convert > $quantity_kebutuhan){
        //                     $validator->errors()->add('quantity', 'Quantity exceed limit');
        //                 }
        //             }
        //         }
        //     }
        });
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
