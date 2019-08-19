<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Workshift</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-control-label">
                        Job Position @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Job Position')
                        @slot('id', 'job_position_workshift')
                        @slot('name', 'job_position_workshift')
                        @slot('id_error', 'job_position_workshift')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>


<div class="form-group m-form__group row mt-5">
    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
        @component('frontend.common.buttons.create-new')
            @slot('text', 'View History/Past Data')
            @slot('data_target', '#modal_history_workshift')
            @slot('icon','la la-history')
        @endcomponent
    </div>
</div>
    
@include('frontend.employee.employee.include.workshift.modal-history')

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">
                @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'add-workshift')
                    @slot('class', 'add-workshift')
                @endcomponent

                @include('frontend.common.buttons.reset')

                @include('frontend.common.buttons.back')

            </div>
        </div>
    </div>
</div>

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/job-position-workshift.js') }}"></script>
@endpush