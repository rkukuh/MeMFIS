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
<script src="{{ asset('js/frontend/functions/fill-combobox/Employee.js')}}"></script>
<script>
    $('#add-engineer').on('click', function() {

    alert('save');
        // $.ajax({
        //     headers: {
        //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        //     },
        //     type: 'post',
        //     url: '/quotation',
        //     processData: false,
        //     contentType: false,
        //     data: data,
        //     success: function(data) {
        //         if (data.errors) {
        //             if (data.errors.currency_id) {
        //                 $("#currency-error").html(data.errors.currency_id[0]);
        //             }
        //             if (data.errors.customer_id) {
        //                 $("#customer_id-error").html(data.errors.customer_id[0]);
        //             }
        //             if (data.errors.description) {
        //                 $("#description-error").html(data.errors.description[0]);
        //             }
        //             if (data.errors.exchange_rate) {
        //                 $("#exchange-error").html(data.errors.exchange_rate[0]);
        //             }
        //             if (data.errors.project_id) {
        //                 $("#work-order-error").html(data.errors.project_id[0]);
        //             }
        //             if (data.errors.requested_at) {
        //                 $("#requested_at-error").html(data.errors.requested_at[0]);
        //             }
        //             if (data.errors.scheduled_payment_amount) {
        //                 $("#scheduled_payment_amount-error").html(data.errors.scheduled_payment_amount[0]);
        //             }
        //             if (data.errors.scheduled_payment_type) {
        //                 $("#scheduled_payment_type-error").html(data.errors.scheduled_payment_type[0]);
        //             }
        //             if (data.errors.valid_until) {
        //                 $("#valid_until-error").html(data.errors.valid_until[0]);
        //             }

        //             document.getElementById("name").value = name;
        //         } else {

        //             toastr.success('Quotation has been created.', 'Success', {
        //                 timeOut: 5000
        //             });

        //             window.location.href = '/quotation/' + data.uuid + '/edit';


        //         }
        //     }
        // });
    });
</script>
@endpush