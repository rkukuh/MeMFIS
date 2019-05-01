<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Airframe
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'airframe')
                    @slot('text', 'Airframe')
                    @slot('name', 'airframe')
                    @slot('id_error', 'airframe')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'airframe_qty')
                    @slot('text', 'Airframe Quantity')
                    @slot('name', 'airframe_qty')
                    @slot('id_error', 'airframe_qty')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Powerplant
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'powerplant')
                    @slot('text', 'Powerplant')
                    @slot('name', 'powerplant')
                    @slot('id_error', 'powerplant')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'powerplant_qty')
                    @slot('text', 'Powerplant Quantity')
                    @slot('name', 'powerplant_qty')
                    @slot('id_error', 'powerplant_qty')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Radio
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'radio')
                    @slot('text', 'Radio')
                    @slot('name', 'radio')
                    @slot('id_error', 'radio')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'radio_qty')
                    @slot('text', 'Radio Quantity')
                    @slot('name', 'radio_qty')
                    @slot('id_error', 'radio_qty')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Electrical
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'electrical')
                    @slot('text', 'Electrical')
                    @slot('name', 'electrical')
                    @slot('id_error', 'electrical')
                    @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'electrical_qty')
                    @slot('text', 'Electrical Quantity')
                    @slot('name', 'electrical_qty')
                    @slot('id_error', 'electrical_qty')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Instrument
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'instrument')
                    @slot('text', 'Instrument')
                    @slot('name', 'Instrument')
                    @slot('id_error', 'instrument')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'instrument_qty')
                    @slot('text', 'Instrument Quantity')
                    @slot('name', 'instrument_qty')
                    @slot('id_error', 'instrument_qty')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Cabin Maintenance
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'cabin')
                    @slot('text', 'Cabin')
                    @slot('name', 'Cabin')
                    @slot('id_error', 'cabin')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'cabin_qty')
                    @slot('text', 'Cabin Quantity')
                    @slot('name', 'cabin_qty')
                    @slot('id_error', 'cabin_qty')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    TAT
                </label>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('text', 'tat')
                    @slot('id', 'tat')
                    @slot('input_append', 'Workdays')
                    @slot('name', 'tat')
                    @slot('id_error', 'tat')
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
