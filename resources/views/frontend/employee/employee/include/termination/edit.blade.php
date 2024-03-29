<form id="termination_form">

        @component('frontend.common.input.hidden')
        @slot('id', 'employee_uuid')
        @slot('name', 'employee_uuid')
        @slot('value', $employee->uuid)
        @endcomponent

        <div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Termination Details</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Termination Date  @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.datepicker')
                        @slot('text', 'Termination Date')
                        @slot('id', 'date_termination')
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
                                @slot('id', 'termination_document')
                                @slot('help_text', 'File must be image or not be stored!')
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
            @slot('class', 'terminate')
            @slot('color', 'danger')
            @slot('text','TERMINATE THIS EMPLOYEE')
            @slot('icon','')
        @endcomponent
    </div>
</div>
</form>

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/datepicker/date-termination.js')}}"></script>
    <script src="{{ asset('js/frontend/employee/employee/termination.js') }}"></script>
@endpush