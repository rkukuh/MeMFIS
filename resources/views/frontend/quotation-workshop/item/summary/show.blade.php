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
                @slot('text', 'Generate')
                @slot('id', 'Generate')
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
                @slot('text', 'Generate')
                @slot('id', 'Generate')
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
                @slot('text', 'Generate')
                @slot('id', 'Generate')
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
                @slot('text', 'Generate')
                @slot('id', 'Generate')
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
                @slot('text', 'Generate')
                @slot('id', 'Generate')
            @endcomponent
        </div>
    </div>
    <fieldset class="border p-2">
        <legend class="w-auto">Scheduled Payment :</legend>
        <div class="form-group m-form__group row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group m-form__group row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="form-control-label">
                            Work Progress
                        </label>

                        @component('frontend.common.label.data-info')
                            @slot('text', '0')
                            @slot('id', 'Generate')
                        @endcomponent
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="form-control-label">
                            Amount
                        </label>

                        @component('frontend.common.label.data-info')
                            @slot('text', '0')
                            @slot('id', 'Generate')
                        @endcomponent
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="form-control-label">
                            Description
                        </label>

                        @component('frontend.common.label.data-info')
                            @slot('text', '0')
                            @slot('id', 'Generate')
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
                    @include('frontend.common.buttons.back')
                </div>
            </div>
        </div>
    </div>
</div>
