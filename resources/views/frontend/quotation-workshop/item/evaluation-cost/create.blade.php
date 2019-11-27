<div class="tab-pane active show" id="m_tabs_evaluation_cost" role="tabpanel">
    <div class="form-group m-form__group row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Manhours Estimation
            </label>

            @component('frontend.common.input.text')
                @slot('text', 'Manhours Estimation')
                @slot('id', 'manhours_estimation')
                @slot('name', 'manhours_estimation')
                @slot('id_error', 'manhours_estimation')
            @endcomponent
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                TAT Calculation
            </label>

            @component('frontend.common.input.number')
                @slot('text', 'TAT Calculation')
                @slot('id', 'tat')
                @slot('name', 'tat')
                @slot('id_error', 'tat')
                @slot('input_append','Days')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="form-control-label">
                Manhours Rate
            </label>

            @component('frontend.common.input.number')
                @slot('text', 'Manhours Rate')
                @slot('id', 'manhours_rate')
                @slot('name', 'manhours_rate')
                @slot('id_error', 'manhours_rate')
            @endcomponent
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Discount Type
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Discount Type')
                        @slot('id', 'discount-type')
                        @slot('name', 'discount-type')
                        @slot('id_error', 'discount-type')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Amount
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Amount')
                        @slot('id', 'amount')
                        @slot('name', 'amount')
                        @slot('id_error', 'amount')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group m-form__group row">
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label class="form-control-label">
                        Other Cost
                    </label>
                </div>
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label class="form-control-label">
                        Other Cost Amount
                    </label>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2">
                </div>
            </div>
            <div class="repeaterOtherCost">
                <div class="repeaterRow">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            @component('frontend.common.input.text')
                                @slot('text', 'Other Cost')
                                @slot('id', 'other_cost')
                                @slot('name', 'other_cost')
                                @slot('id_error', 'other_cost')
                            @endcomponent
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            @component('frontend.common.input.number')
                                @slot('text', 'Other Cost Amount')
                                @slot('id', 'other_cost_amount')
                                @slot('name', 'other_cost_amount')
                                @slot('id_error', 'other_cost_amount')
                            @endcomponent
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            @component('frontend.common.buttons.delete_repeater')
                                @slot('class', 'DeleteRow')
                            @endcomponent
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            @component('frontend.common.buttons.create_repeater')
                                @slot('class', 'AddRow')
                            @endcomponent
                        </div>
                    </div>
                </div>
                <div class="repeaterRow CopyOtherCost hidden">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            @component('frontend.common.input.text')
                                @slot('text', 'Other Cost')
                                @slot('id', 'other_cost')
                                @slot('name', 'other_cost')
                                @slot('id_error', 'other_cost')
                            @endcomponent
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            @component('frontend.common.input.number')
                                @slot('text', 'Other Cost Amount')
                                @slot('id', 'other_cost_amount')
                                @slot('name', 'other_cost_amount')
                                @slot('id_error', 'other_cost_amount')
                            @endcomponent
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            @component('frontend.common.buttons.delete_repeater')
                                @slot('class', 'DeleteRow')
                            @endcomponent
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            @component('frontend.common.buttons.create_repeater')
                                @slot('class', 'AddRow')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="flex">
                <div class="btn btn-default calculate" id="calculate">
                    <span>
                        <i class="fa fa-calculator"></i>
                        Calculate
                    </span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group m-form__group row">
        <div class="col-sm-7 col-md-7 col-lg-7">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Total Manhour Cost
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'sub_total')
                @slot('class', 'sub_total')
                @slot('text', '0')
                @slot('value', '')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-7 col-md-7 col-lg-7">
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
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-7 col-md-7 col-lg-7">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Total Other Cost
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.label.data-info')
                @slot('id', 'total_other_cost')
                @slot('class', 'total_discount')
                @slot('text', '0')
                @slot('value', '0')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12 footer">
            <div class="flex">
                <div class="action-buttons">
                    @component('frontend.common.buttons.submit')
                        @slot('type','button')
                        @slot('id', 'approve-evaluation-cost')
                        @slot('class', 'approve-evaluation-cost')
                        @slot('text','Approve Evaluation Cost')
                        @slot('color','primary')
                        @slot('icon','fa-check')
                    @endcomponent
    
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