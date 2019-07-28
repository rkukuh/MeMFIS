<div class="tab-pane active show" id="m_tabs_workpackage" role="tabpanel">
    <div class="workpackage_datatable" id="scrolling_both"></div>
</div>
<div class="tab-pane" id="m_tabs_summary" role="tabpanel">

    <div class="summary_datatable" id="scrolling_both"></div>
    <br>
    <hr>
    <div class="form-group m-form__group row">
        <div class="col-sm-5 col-md-5 col-lg-5">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Sub Total
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'sub_total')
                @slot('class', 'sub_total')
                @slot('text', $quotation->subtotal)
                @slot('value', $quotation->subtotal)
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>

    <div class="repeaterChargeTypes">
        @if(isset($charges))
                @foreach($charges as $charge)
                <div class="repeaterRow">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <select name="charge_type" class="form-control charge_type">
                                <option value="Shipping Fee" selected>Shipping Fee</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            @component('frontend.common.input.number')
                                @slot('id', 'charge')
                                @slot('name', 'charge')
                                @slot('class', 'charge')
                                @slot('value' , $charge->amount)
                                @slot('min', 0)
                            @endcomponent
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            @component('frontend.common.buttons.create_repeater')
                                @slot('class', 'AddRow')
                            @endcomponent
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1" style="margin-left:-38px">
                            @component('frontend.common.buttons.delete_repeater')
                                @slot('class', 'DeleteRow')
                            @endcomponent
                        </div>
                    </div>
                </div>
                @endforeach
        @else
            <div class="repeaterRow">
                <div class="form-group m-form__group row">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <select name="charge_type" class="form-control charge_type" style="width:100%">
                            <option value="Shipping Fee">Shipping Fee</option>
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'charge')
                            @slot('name', 'charge')
                            @slot('class', 'charge')
                            @slot('value' , 0)
                            @slot('min', 0)
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @component('frontend.common.buttons.create_repeater')
                            @slot('class', 'AddRow')
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1" style="margin-left:-38px">
                        @component('frontend.common.buttons.delete_repeater')
                            @slot('class', 'DeleteRow')
                        @endcomponent
                    </div>
                </div>
            </div>
        @endif
        <div class="repeaterRow copyChargeTypes hidden">
                <div class="form-group m-form__group row">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <select name="charge_type" class="form-control" style="width:100%">
                            <option value="Shipping Fee">Shipping Fee=</option>
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'charge')
                            @slot('name', 'charge')
                            @slot('class', 'charge')
                            @slot('value' , 0)
                            @slot('min', 0)
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @component('frontend.common.buttons.create_repeater')
                            @slot('class', 'AddRow')
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1" style="margin-left:-38px">
                        @component('frontend.common.buttons.delete_repeater')
                            @slot('class', 'DeleteRow')
                        @endcomponent
                    </div>
                </div>
            </div>
    </div>
    @if($quotation->currency->symbol !== "Rp")
    <div class="form-group m-form__group row">
        <div class="col-sm-5 col-md-5 col-lg-5">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Total in <div id="currency_symbol">{{ $quotation->currency->symbol }}</div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'grand_total')
                @slot('class', 'grand_total')
                @slot('text', $quotation->grandtotal)
                @slot('value', $quotation->grandtotal)
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>
    @endif
    <div class="form-group m-form__group row">
        <div class="col-sm-5 col-md-5 col-lg-5">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                PPN
            </div>
        </div>
        <div class="col-sm-5 col-md-5 col-lg-5">
            @component('frontend.common.input.checkbox')
                @slot('id', 'is_ppn')
                @slot('name', 'is_ppn')
                @slot('value', 1.1)
                @slot('text', 'Include 10% PPN')
                @slot('style_div','margin-top:15px')
                @slot('help_text','If Checked, 10% tax rate would be charged')
                @slot('icon', 'fa-info-circle m--font-info')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-5 col-md-5 col-lg-5">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Total in Rupiah
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'grand_total_rupiah')
                @slot('class', 'grand_total_rupiah')
                @slot('text', $quotation->grandtotal)
                @slot('value', $quotation->grandtotal)
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
            <div class="btn btn-default calculate" id="calculate">
                <span>
                    <i class="fa fa-calculator"></i>
                    Calculate
                </span>
            </div>
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>
