<div class="tab-pane active" id="m_tabs_evaluation_cost" role="tabpanel">
        <div class="form-group m-form__group row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Manhours Estimation
                </label>
                
                @component('frontend.common.label.data-info')
                    @slot('text', 'Generate')
                    @slot('id', 'Generate')
                @endcomponent
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    TAT Calculation
                </label>

                @component('frontend.common.label.data-info')
                    @slot('text', 'Generate')
                    @slot('id', 'Generate')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Manhours Rate
                </label>
                
                @component('frontend.common.label.data-info')
                    @slot('text', 'Generate')
                    @slot('id', 'Generate')
                @endcomponent
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Discount Type
                        </label>
                
                        @component('frontend.common.label.data-info')
                            @slot('text', 'Generate')
                            @slot('id', 'Generate')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Amount
                        </label>
                
                        @component('frontend.common.label.data-info')
                            @slot('text', 'Generate')
                            @slot('id', 'Generate')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Other Cost
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Other Cost Amount
                        </label>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        @component('frontend.common.label.data-info')
                            @slot('text', 'Generate')
                            @slot('id', 'Generate')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        @component('frontend.common.label.data-info')
                            @slot('text', 'Generate')
                            @slot('id', 'Generate')
                        @endcomponent
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
                        @include('frontend.common.buttons.back')
                    </div>
                </div>
            </div>
        </div>
    </div>