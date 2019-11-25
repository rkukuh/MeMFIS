<div class="tab-pane" id="m_tabs_summary" role="tabpanel">
    <div class="summary_datatable" id="scrolling_both"></div>
    <br>
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
                {{-- @slot('text', $quotation->subtotal) --}}
                {{-- @slot('value', $quotation->subtotal) --}}
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-5 col-md-5 col-lg-5">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Total Discount
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'total_discount')
                @slot('class', 'total_discount')
                @slot('text', '0')
                @slot('value', '0')
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-5 col-md-5 col-lg-5">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Total Other Cost
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'total_discount')
                @slot('class', 'total_discount')
                @slot('text', '0')
                @slot('value', '0')
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>
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
                Grand Total in <span id="currency_symbol">$</span>
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'grand_total')
                @slot('class', 'grand_total')
                @slot('text', '0')
                @slot('value', '0')
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-5 col-md-5 col-lg-5">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:10px">
                Grand Total in Rupiah
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'grand_total_rupiah')
                @slot('class', 'grand_total_rupiah')
                @slot('text', '0')
                @slot('value', '')
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
    <fieldset class="border p-2">
        <legend class="w-auto">Scheduled Payment :</legend>
        <div class="form-group m-form__group row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group m-form__group row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            Work Progress
                        </label>

                        @component('frontend.common.input.number')
                            @slot('id', 'work_progress_scheduled')
                            @slot('name', 'work_progress_scheduled')
                            @slot('max', 100)
                            @slot('input_append','%')
                            @slot('id_error', 'work_progress_scheduled')
                        @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="form-control-label">
                            Amount
                        </label>

                        @component('frontend.common.input.number')
                            @slot('id', 'amount_scheduled')
                            @slot('name', 'amount_scheduled')
                            @slot('id_error', 'amount_scheduled')
                        @endcomponent
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="form-control-label">
                            Description
                        </label>

                        @component('frontend.common.input.text')
                            @slot('text', 'description_scheduled')
                            @slot('name', 'description_scheduled')
                            @slot('id_error', 'description_scheduled')
                            @slot('id', 'description_scheduled')
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @component('frontend.common.buttons.create_repeater')
                            @slot('id', 'add_scheduled_row')
                            @slot('name', 'add_scheduled_row')
                            @slot('class', 'add_scheduled_row')
                            @slot('title', 'Add scheduled payment row')
                            @slot('style', 'margin-top:32.5px')
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @component('frontend.common.buttons.delete_repeater')
                            @slot('id', 'delete_row')
                            @slot('name', 'delete_row')
                            @slot('class', 'delete_row')
                            @slot('title', 'Delete scheduled payment row')
                            @slot('style', 'margin-top:32.5px')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
        <table id="scheduled_payments_datatables" class="table table-striped table-bordered" width="100%">
        <tfoot><th></th><th></th><th colspan="2"></th></tfoot>
        </table>
    </fieldset>
    <div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12 footer">
            <div class="flex">
                <div class="action-buttons">
                    @component('frontend.common.buttons.submit')
                        @slot('type','button')
                        @slot('id', 'update-evaluation-cost')
                        @slot('class', 'add-evaluation-cost')
                        @slot('text','Update')
                        @slot('icon','fa-history')
                    @endcomponent

                    @include('frontend.common.buttons.reset')

                    @include('frontend.common.buttons.back')
                </div>
            </div>
        </div>
    </div>
</div>
