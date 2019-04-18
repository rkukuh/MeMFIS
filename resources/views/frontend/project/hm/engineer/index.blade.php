<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Airframe
                </label>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                @component('frontend.common.input.select2')
                    @slot('id', 'airframe')
                    @slot('text', 'Airframe')
                    @slot('name', 'Airframe')
                    @slot('id_error', 'airframe')
                    @slot('multiple','multiple')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Powerplant
                </label>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                @component('frontend.common.input.select2')
                    @slot('id', 'powerplant')
                    @slot('text', 'Powerplant')
                    @slot('name', 'Powerplant')
                    @slot('id_error', 'powerplant')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Radio
                </label>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                @component('frontend.common.input.select2')
                    @slot('id', 'radio')
                    @slot('text', 'Radio')
                    @slot('name', 'Radio')
                    @slot('id_error', 'radio')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Electrical
                </label>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                @component('frontend.common.input.select2')
                    @slot('id', 'electrical')
                    @slot('text', 'Electrical')
                    @slot('name', 'Electrical')
                    @slot('id_error', 'electrical')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Instrument
                </label>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                @component('frontend.common.input.select2')
                    @slot('id', 'instrument')
                    @slot('text', 'Instrument')
                    @slot('name', 'Instrument')
                    @slot('id_error', 'instrument')
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Cabin Maintenance
                </label>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                @component('frontend.common.input.select2')
                    @slot('id', 'cabin')
                    @slot('text', 'Cabin')
                    @slot('name', 'Cabin')
                    @slot('id_error', 'cabin')
                @endcomponent
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">
                @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'add-project')
                    @slot('class', 'add-project')
                @endcomponent

                @include('frontend.common.buttons.reset')

                @component('frontend.common.buttons.back')
                    @slot('href', route('frontend.workpackage.index'))
                @endcomponent
            </div>
        </div>
    </div>
</div>


@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/airframe.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/powerplant.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/radio.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/electrical.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/cabin.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/instrument.js')}}"></script>
@endpush
