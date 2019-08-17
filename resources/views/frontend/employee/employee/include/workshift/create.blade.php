<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto">Workshift</legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-control-label">
                        Job Position @include('frontend.common.label.required')
                    </label>

                    @component('frontend.common.input.select2')
                        @slot('text', 'Job Position')
                        @slot('class', 'job_position')
                        @slot('id', 'job_position')
                        @slot('name', 'job_position')
                        @slot('id_error', 'job_position')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/job-position.js') }}"></script>
@endpush