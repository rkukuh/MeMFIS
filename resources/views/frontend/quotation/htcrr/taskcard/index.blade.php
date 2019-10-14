<div class="px-4">
    <div class="m-portlet__body">
        <div class="form-group m-form__group row ">

            <input type="hidden" id="uuid" name="uuid" value="{{$quotation}}">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <label class="form-control-label">
                    Job Request Description @include('frontend.common.label.required')
                </label>
                @component('frontend.common.input.textarea')
                    @slot('text', 'Description')
                    @slot('name', 'description')
                    @slot('id', 'description')
                    @slot('rows', '5')
                    @if(!empty($quotation->data_htcrr))
                    @slot('value', $quotation_htcrr->description)
                    @endif
                    @slot('id_error', 'description')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row ">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Total Manhours @include('frontend.common.label.required')
                </label>
                @component('frontend.common.label.data-info')
                    @slot('id', 'total_mhrs')
                    @slot('name', 'total_mhrs')
                    @slot('text', $project_htcrr->total_manhours_with_performance_factor)
                    @slot('value', $project_htcrr->total_manhours_with_performance_factor)
                @endcomponent
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Manhours Price List @include('frontend.common.label.required')
                </label>
                @component('frontend.common.label.data-info')
                    @slot('id', 'manhour_price_list')
                    @slot('name', 'manhour_price_list')
                    @if(isset($manhour_rate->rate))
                    @slot('value', $manhour_rate->rate)
                    @slot('text', $manhour_rate->rate)
                    @else
                    @slot('value',0)
                    @slot('text', '-')
                    @endif
                @endcomponent

            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <label class="form-control-label">
                    Manhours Rate @include('frontend.common.label.required')
                </label>
                @component('frontend.common.input.number')
                    @slot('text', 'rate')
                    @slot('name', 'rate')
                    @slot('id', 'rate')
                    @if(!empty($quotation->data_htcrr))
                    @slot('value', $quotation_htcrr->manhour_rate_amount)
                    @endif
                    @slot('id_error', 'rate')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-12 col-md-12 col-lg-12 footer">
                <div class="flex">
                    <div class="action-buttons">
                        @component('frontend.common.buttons.submit')
                            @slot('type','button')
                            @slot('id', 'add-job-request')
                            @slot('class', 'add-job-request')
                        @endcomponent

                        @include('frontend.common.buttons.reset')

                        @include('frontend.common.buttons.back')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.quotation.htcrr.taskcard.nonroutine.index')

