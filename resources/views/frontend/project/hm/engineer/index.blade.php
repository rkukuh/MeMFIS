<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if(in_array('Airframe',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Airframe
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_airframe')
                    @slot('text', 'Airframe')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Airframe')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'airframe_qty')
                    @slot('text', 'Airframe Quantity')
                    @slot('name', 'airframe_qty')
                    @slot('id_error', 'airframe_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('Powerplant / Engine',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Powerplant
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_powerplant')
                    @slot('text', 'Powerplant')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Powerplant')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'powerplant_qty')
                    @slot('text', 'Powerplant Quantity')
                    @slot('name', 'powerplant_qty')
                    @slot('id_error', 'powerplant_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('Electrical',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Electrical
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_electrical')
                    @slot('text', 'Electrical')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Electrical')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'electrical_qty')
                    @slot('text', 'Electrical Quantity')
                    @slot('name', 'electrical_qty')
                    @slot('id_error', 'electrical_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('Radio',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Radio
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_radio')
                    @slot('text', 'Radio')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Radio')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'radio_qty')
                    @slot('text', 'Radio Quantity')
                    @slot('name', 'radio_qty')
                    @slot('id_error', 'radio_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>

        @endif 
        @if(in_array('Instrument',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Instrument
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_instrument')
                    @slot('text', 'Instrument')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Instrument')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'instrument_qty')
                    @slot('text', 'Instrument Quantity')
                    @slot('name', 'instrument_qty')
                    @slot('id_error', 'instrument_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('Cabin Maintenance',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Cabin Maintenance
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_cabinMaintenance')
                    @slot('text', 'Cabin Maintenance')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Cabin Maintenance')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'cabin_qty')
                    @slot('text', 'Cabin Quantity')
                    @slot('name', 'cabin_qty')
                    @slot('id_error', 'cabin_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('Run-Up',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Run Up
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_runup')
                    @slot('text', 'Run Up')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Run-Up')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'runup_qty')
                    @slot('text', 'Run Up Quantity')
                    @slot('name', 'runup_qty')
                    @slot('id_error', 'runup_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('Repair',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Repair
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_repair')
                    @slot('text', 'Repair')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Repair')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'repair_qty')
                    @slot('text', 'Repair Quantity')
                    @slot('name', 'repair_qty')
                    @slot('id_error', 'repair_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('Repainting',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Repainting
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_repainting')
                    @slot('text', 'Repainting')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Repainting')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'repainting_qty')
                    @slot('text', 'Repainting Quantity')
                    @slot('name', 'repainting_qty')
                    @slot('id_error', 'repainting_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif 
        @if(in_array('NDI/NDT',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    NDI/NDT
                </label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                @component('frontend.common.input.select2')
                    @slot('id', 'employee_ndi_ndt')
                    @slot('text', 'NDI/NDT')
                    @slot('name', 'employee')
                    @slot('id_error', 'employee')
                @endcomponent
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'NDI/NDT')
                @endcomponent
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'ndi_ndt_qty')
                    @slot('text', 'NDI/NDT Quantity')
                    @slot('name', 'ndi_ndt_qty')
                    @slot('id_error', 'ndi_ndt_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
        </div>
        @endif
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
                    @slot('id', 'add-engineer')
                    @slot('class', 'add-engineer')
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
<script src="{{ asset('js/frontend/functions/select2/employee.js')}}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/employee.js')}}"></script>
<script>
    let project_uuid = '{{ $project->uuid }}';
    let workpackage_uuid = '{{ $workPackage->uuid }}';
    let skills = '{{ $skills }}';
    console.log(skills);
</script>
@endpush
