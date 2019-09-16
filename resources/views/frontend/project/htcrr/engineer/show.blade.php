@if(isset($htcrr_engineers))
<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if(in_array('Airframe',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Airframe
                </label>
            </div>
            @foreach($engineer_skills as $engineer)

                @if($engineer->skill == 'Airframe')
                <div class="col-sm-6 col-md-6 col-lg-6">
                    @component('frontend.common.label.data-info')
                        @slot('text', $engineer->engineer_code)
                    @endcomponent
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.label.data-info')
                        @slot('text', $engineer->quantity)
                    @endcomponent
                </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('Powerplant / Engine',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Powerplant
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Powerplant / Engine')
                <div class="col-sm-6 col-md-6 col-lg-6">
                    @component('frontend.common.label.data-info')
                        @slot('text', $engineer->engineer_code)
                    @endcomponent
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.label.data-info')
                        @slot('text', $engineer->quantity)
                    @endcomponent
                </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('Electrical',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Electrical
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Electrical')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        @component('frontend.common.label.data-info')
                            @slot('text', $engineer->engineer_code)
                        @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.label.data-info')
                            @slot('text', $engineer->quantity)
                        @endcomponent
                    </div>
                @endif
            @endforeach
            </div>
        </div>
        @endif
        @if(in_array('Radio',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Radio
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Radio')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        @component('frontend.common.label.data-info')
                            @slot('text', $engineer->engineer_code)
                        @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.label.data-info')
                            @slot('text', $engineer->quantity)
                        @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('Instrument',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Instrument
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Instrument')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        @component('frontend.common.label.data-info')
                            @slot('text', $engineer->engineer_code)
                        @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.label.data-info')
                            @slot('text', $engineer->quantity)
                        @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('Cabin Maintenance',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Cabin Maintenance
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Cabin Maintenance')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->engineer_code)
                            @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->quantity)
                            @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('Run-Up',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Run Up
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Run-Up')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->engineer_code)
                            @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->quantity)
                            @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('Repair',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Repair
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Repair')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->engineer_code)
                            @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->quantity)
                            @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('Repainting',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Repainting
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'Repainting')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->engineer_code)
                            @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->quantity)
                            @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        @if(in_array('NDI / NDT',$skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    NDI / NDT
                </label>
            </div>
            @foreach($engineer_skills as $engineer)
                @if($engineer->skill == 'NDI / NDT')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->engineer_code)
                            @endcomponent
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                            @component('frontend.common.label.data-info')
                                @slot('text', $engineer->quantity)
                            @endcomponent
                    </div>
                @endif
            @endforeach
        @endif
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    TAT
                </label>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.label.data-info')
                        @slot('text', 'TAT')
                    @endcomponent
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">

                @include('frontend.common.buttons.back')

            </div>
        </div>
    </div>
</div>
@endif

@push('footer-scripts')
<script src="{{ asset('js/frontend/functions/select2/airframe.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/powerplant.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/radio.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/electrical.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/cabin.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/instrument.js')}}"></script>
{{-- <script src="{{ asset('js/frontend/functions/fill-combobox/employee.js')}}"></script> --}}
<script>

    if($('#employee_airframe ').length > 1){
        $('#employee_airframe ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#airframe_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_powerplant ').length > 1){
        $('#employee_powerplant ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#powerplant_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_electrical ').length > 1){
        $('#employee_electrical ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#electrical_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_radio ').length > 1){
        $('#employee_radio ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#radio_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_instrument ').length > 1){
        $('#employee_instrument ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#instrument_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_cabinMaintenance ').length > 1){
        $('#employee_cabinMaintenance ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#cabin_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_runup ').length > 1){
        $('#employee_runup ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#runup_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_repair ').length > 1){
        $('#employee_repair ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#repair_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_repainting ').length > 1){
        $('#employee_repainting ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#repainting_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    if($('#employee_ndi_ndt ').length > 1){
        $('#employee_ndi_ndt ')[1].closest("div.col-sm-6.col-md-6.col-lg-6").remove();
        $('#ndi_ndt_qty ')[1].closest("div.col-sm-3.col-md-3.col-lg-3").remove();
    }

    $('#calculate').on('click',function(){
        let engineer_qty = tat = 0;
        $('.engineer_qty').each(function(){
            engineer_qty = engineer_qty + parseFloat($(this).val());
        });
        let divider = engineer_qty * 6.5;
        if($('#default').prop("checked")){
            let mhrs = parseFloat(mhrs_pfrm_factor);
            tat = mhrs / divider;
        }else{
            let mhrs = total_mhrs * 1.6;
            tat =  mhrs / divider;
        }

        $('#tat').val(new Intl.NumberFormat('en-IN', { maximumFractionDigits: 2 }).format(tat));
    });

    </script>
<script src="{{ asset('js/frontend/functions/select2/employee.js')}}"></script>
@endpush
