<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if(in_array(81,$skills))
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
        @elseif(in_array(82,$skills))
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
        @elseif(in_array(83,$skills))
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
        @elseif(in_array(84,$skills))
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

        @elseif(in_array(85,$skills))
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
        @elseif(in_array(86,$skills))
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
        @elseif(in_array(87,$skills))
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
        @elseif(in_array(88,$skills))
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
        @elseif(in_array(89,$skills))
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
        @elseif(in_array(90,$skills))
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

    $('#add-engineer').on('click', function() {

        let employee_airframe = $('#employee_airframe').val();
        let airframe_qty = $('#airframe_qty').val();
        let employee_powerplant = $('#employee_powerplant').val();
        let powerplant_qty = $('#powerplant_qty').val();
        let employee_electrical = $('#employee_electrical').val();
        let electrical_qty = $('#electrical_qty').val();
        let employee_radio = $('#employee_radio').val();
        let radio_qty = $('#radio_qty').val();
        let employee_cabinMaintenance = $('#employee_cabinMaintenance').val();
        let cabin_qty = $('#cabin_qty').val();
        let employee_runup = $('#employee_runup').val();
        let runup_qty = $('#runup_qty').val();
        let employee_repair = $('#employee_repair').val();
        let repair_qty = $('#repair_qty').val();
        let employee_repainting = $('#employee_repainting').val();
        let repainting_qty = $('#repainting_qty').val();
        let employee_ndi_ndt = $('#employee_ndi_ndt').val();
        let ndi_ndt_qty = $('#ndi_ndt_qty').val();
        let tat = $('#tat').val();

        $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'put',
                url: '/project-hm/' + project_uuid + '/workpackage/' + workpackage_uuid + '/engineerTeam',
                data: {
                    employee_airframe: employee_airframe,
                    airframe_qty: airframe_qty,
                    employee_powerplant: employee_powerplant,
                    powerplant_qty: powerplant_qty,
                    employee_electrical: employee_electrical,
                    electrical_qty: electrical_qty,
                    employee_radio: employee_radio,
                    radio_qty: radio_qty,
                    employee_cabinMaintenance: employee_cabinMaintenance,
                    cabin_qty: cabin_qty,
                    employee_runup: employee_runup,
                    runup_qty: runup_qty,
                    employee_repair: employee_repair,
                    repair_qty: repair_qty,
                    employee_repainting: employee_repainting,
                    repainting_qty: repainting_qty,
                    employee_ndi_ndt: employee_ndi_ndt,
                    ndi_ndt_qty: ndi_ndt_qty,
                    tat: tat,
                },
                success: function(data) {
                    console.log(data);
                // } else {

                //     // toastr.success('Quotation has been created.', 'Success', {
                //     //     timeOut: 5000
                //     // });

                // }
            }
        });
    });
</script>
@endpush
