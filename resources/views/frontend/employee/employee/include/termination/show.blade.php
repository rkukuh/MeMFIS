<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Termination Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Termination Date    
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', 'Generated')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Reason   
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', 'Generated')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-control-label">
                        Remark
                    </label>

                    @component('frontend.common.label.data-info')
                        @slot('text', 'Generated')
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

                            @component('frontend.common.label.data-info')
                                @slot('text', 'Generated')
                            @endcomponent
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>

@push('footer-scripts')
@endpush