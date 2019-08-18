<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto">Termination Details</legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Termination Date  @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.email')
                        @slot('text', 'Termination Date')
                        @slot('id', 'termination_date')
                        @slot('name', 'termination_date')
                        @slot('id_error', 'termination_date')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Reason @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.text')
                        @slot('text', 'Reason')
                        @slot('id', 'reason')
                        @slot('name', 'reason')
                        @slot('id_error', 'reason')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-control-label">
                        Remark
                    </label>

                    @component('frontend.common.input.textarea')
                        @slot('text', 'Remark')
                        @slot('id', 'remark')
                        @slot('name', 'remark')
                        @slot('id_error', 'remark')
                        @slot('rows','3')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Attach Document
                            </label>

                            @component('frontend.common.input.upload')
                                @slot('label', 'document')
                                @slot('name', 'document')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
    
<div class="form-group m-form__group row mt-5">
    <div class="col-sm-12 col-md-12 col-lg-12 footer text-center">
        @component('frontend.common.buttons.submit')
            @slot('type','button')
            @slot('id', 'terminate')
            @slot('class', 'teminate')
            @slot('color', 'danger')
            @slot('text','TERMINATE THIS EMPLOYEE')
            @slot('icon','')
        @endcomponent
    </div>
</div>
    

@push('footer-scripts')
@endpush