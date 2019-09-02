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
                    @slot('value', json_decode($quotation->data_htcrr)->description)
                    @endif
                    @slot('id_error', 'description')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row ">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Total Manhours @include('frontend.common.label.required')
                </label>
                @component('frontend.common.label.data-info')
                    @slot('id', 'total_mhrs')
                    @slot('name', 'total_mhrs')
                    @slot('text', json_decode($quotation->project->data_htcrr)->total_manhours_with_performance_factor)
                    @slot('value', json_decode($quotation->project->data_htcrr)->total_manhours_with_performance_factor)
                @endcomponent

            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                    Manhours Rate @include('frontend.common.label.required')
                </label>
                @component('frontend.common.input.number')
                    @slot('text', 'rate')
                    @slot('name', 'rate')
                    @slot('id', 'rate')
                    @if(!empty($quotation->data_htcrr))
                    @slot('value', json_decode($quotation->data_htcrr)->manhour_rate)
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
