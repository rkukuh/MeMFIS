<div class="form-group m-form__group row px-4 pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if(in_array('Airframe',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Airframe
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Airframe')
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <select name="employee" style="width:100%" id="employee_airframe" class="form-control">
                        <option value="">Select an Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->code }}" @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.input.number')
                        @slot('id', 'airframe_qty')
                        @slot('text', 'Airframe Quantity')
                        @slot('name', 'airframe_qty')
                        @slot('class', 'engineer_qty')
                        @slot('id_error', 'airframe_qty')
                        @slot('input_append', 'person')
                        @if(!empty($engineer))
                        @slot('value', $engineer->quantity)
                        @endif
                        @slot('min',0)
                    @endcomponent
                </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                <select name="employee" style="width:100%" id="employee_airframe" class="form-control">
                    <option value="">Select an Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'airframe_qty')
                    @slot('text', 'Airframe Quantity')
                    @slot('name', 'airframe_qty')
                    @slot('id_error', 'airframe_qty')
                    @slot('class', 'engineer_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                    @slot('value', $engineers_quantity["airframe"])
                @endcomponent
            </div>
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Airframe')
                @endcomponent
        </div>
        @endif
        @if(in_array('Powerplant / Engine',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Powerplant
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Powerplant / Engine')
                <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_powerplant" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.input.number')
                        @slot('id', 'powerplant_qty')
                        @slot('text', 'Powerplant Quantity')
                        @slot('name', 'powerplant_qty')
                        @slot('class', 'engineer_qty')
                        @slot('id_error', 'powerplant_qty')
                        @slot('input_append', 'person')
                        @if(!empty($engineer))
                        @slot('value', $engineer->quantity)
                        @endif
                        @slot('min',0)
                    @endcomponent
                </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                <select name="employee" style="width:100%" id="employee_powerplant" class="form-control">
                    <option value="">Select an Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'powerplant_qty')
                    @slot('text', 'Powerplant Quantity')
                    @slot('name', 'powerplant_qty')
                    @slot('class', 'engineer_qty')
                    @slot('id_error', 'powerplant_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                    @slot('value', $engineers_quantity["powerplant"])
                @endcomponent
            </div>
            @component('frontend.common.input.hidden')
                @slot('id', 'engineer_skills')
                @slot('name', 'engineer_skills')
                @slot('value', 'Powerplant')
            @endcomponent
        </div>
        @endif
        @if(in_array('Electrical',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Electrical
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Electrical')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_electrical" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'electrical_qty')
                            @slot('text', 'Electrical Quantity')
                            @slot('name', 'electrical_qty')
                            @slot('class', 'engineer_qty')
                            @slot('id_error', 'electrical_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                <select name="employee" style="width:100%" id="employee_electrical" class="form-control">
                    <option value="">Select an Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'electrical_qty')
                    @slot('text', 'Electrical Quantity')
                    @slot('class', 'engineer_qty')
                    @slot('name', 'electrical_qty')
                    @slot('id_error', 'electrical_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                    @slot('value', $engineers_quantity["electrical"])
                @endcomponent
            </div>
            @component('frontend.common.input.hidden')
                @slot('id', 'engineer_skills')
                @slot('name', 'engineer_skills')
                @slot('value', 'Electrical')
            @endcomponent
        </div>
        @endif
        @if(in_array('Radio',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Radio
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Radio')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_radio" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'radio_qty')
                            @slot('text', 'Radio Quantity')
                            @slot('name', 'radio_qty')
                            @slot('class', 'engineer_qty')
                            @slot('id_error', 'radio_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <select name="employee" style="width:100%" id="employee_radio" class="form-control">
                        <option value="">Select an Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.input.number')
                        @slot('id', 'radio_qty')
                        @slot('text', 'Radio Quantity')
                        @slot('name', 'radio_qty')
                        @slot('class', 'engineer_qty')
                        @slot('id_error', 'radio_qty')
                        @slot('input_append', 'person')
                        @if(!empty($engineer))
                        @slot('value', $engineer->quantity)
                        @else
                        @slot('value', $engineers_quantity["radio"])
                        @endif
                        @slot('min',0)
                    @endcomponent
                </div>
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Radio')
                @endcomponent
        </div>
        @endif
        @if(in_array('Instrument',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Instrument
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Instrument')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_instrument" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'instrument_qty')
                            @slot('text', 'Instrument Quantity')
                            @slot('name', 'instrument_qty')
                            @slot('class', 'engineer_qty')
                            @slot('id_error', 'instrument_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <select name="employee" style="width:100%" id="employee_instrument" class="form-control">
                        <option value="">Select an Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.input.number')
                        @slot('id', 'instrument_qty')
                        @slot('text', 'Instrument Quantity')
                        @slot('name', 'instrument_qty')
                        @slot('class', 'engineer_qty')
                        @slot('id_error', 'instrument_qty')
                        @slot('input_append', 'person')
                        @slot('min',0)
                        @slot('value', $engineers_quantity["instrument"])
                    @endcomponent
                </div>
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'Instrument')
                @endcomponent
        </div>
        @endif
        @if(in_array('Cabin Maintenance',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Cabin Maintenance
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Cabin Maintenance')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_cabinMaintenance" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'cabin_qty')
                            @slot('text', 'Cabin Quantity')
                            @slot('name', 'cabin_qty')
                            @slot('class', 'engineer_qty')
                            @slot('id_error', 'cabin_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                <select name="employee" style="width:100%" id="employee_cabinMaintenance" class="form-control">
                    <option value="">Select an Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'cabin_qty')
                    @slot('text', 'Cabin Quantity')
                    @slot('name', 'cabin_qty')
                    @slot('class', 'engineer_qty')
                    @slot('id_error', 'cabin_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                    @slot('value', $engineers_quantity["cabin"])
                @endcomponent
            </div>
            @component('frontend.common.input.hidden')
                @slot('id', 'engineer_skills')
                @slot('name', 'engineer_skills')
                @slot('value', 'Cabin Maintenance')
            @endcomponent
        </div>
        @endif
        @if(in_array('Run-Up',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Run Up
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Run-Up')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_runup" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'runup_qty')
                            @slot('text', 'Run Up Quantity')
                            @slot('name', 'runup_qty')
                            @slot('class', 'engineer_qty')
                            @slot('id_error', 'runup_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                <select name="employee" style="width:100%" id="employee_runup" class="form-control">
                    <option value="">Select an Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'runup_qty')
                    @slot('text', 'Run Up Quantity')
                    @slot('class', 'engineer_qty')
                    @slot('name', 'runup_qty')
                    @slot('id_error', 'runup_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                @endcomponent
            </div>
            @component('frontend.common.input.hidden')
                @slot('id', 'engineer_skills')
                @slot('name', 'engineer_skills')
                @slot('value', 'Run-Up')
            @endcomponent
        </div>
        @endif
        @if(in_array('Repair',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Repair
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Repair')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_repair" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'repair_qty')
                            @slot('text', 'Repair Quantity')
                            @slot('class', 'engineer_qty')
                            @slot('name', 'repair_qty')
                            @slot('id_error', 'repair_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                    <select name="employee" style="width:100%" id="employee_repair" class="form-control">
                <option value="">Select an Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                @endforeach
            </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'repair_qty')
                    @slot('text', 'Repair Quantity')
                    @slot('name', 'repair_qty')
                    @slot('class', 'engineer_qty')
                    @slot('id_error', 'repair_qty')
                    @slot('input_append', 'person')
                    @if(!empty($engineer))
                    @slot('value', $engineer->quantity)
                    @else
                    @slot('value', $engineers_quantity["repair"])
                    @endif
                    @slot('min',0)
                @endcomponent
            </div>
            @component('frontend.common.input.hidden')
                @slot('id', 'engineer_skills')
                @slot('name', 'engineer_skills')
                @slot('value', 'Repair')
            @endcomponent
        </div>
        @endif
        @if(in_array('Repainting',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    Repainting
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'Repainting')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_repainting" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'repainting_qty')
                            @slot('text', 'Repainting Quantity')
                            @slot('name', 'repainting_qty')
                            @slot('class', 'engineer_qty')
                            @slot('id_error', 'repainting_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                <select name="employee" style="width:100%" id="employee_repainting" class="form-control">
                <option value="">Select an Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                @endforeach
            </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'repainting_qty')
                    @slot('text', 'Repainting Quantity')
                    @slot('name', 'repainting_qty')
                    @slot('class', 'engineer_qty')
                    @slot('id_error', 'repainting_qty')
                    @slot('input_append', 'person')
                    @slot('min',0)
                    @slot('value', $engineers_quantity["repainting"])
                @endcomponent
            </div>
            @component('frontend.common.input.hidden')
                @slot('id', 'engineer_skills')
                @slot('name', 'engineer_skills')
                @slot('value', 'Repainting')
            @endcomponent
        </div>
        @endif
        @if(in_array('NDI / NDT',$engineer_skills))
        <div class="form-group m-form__group row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <label class="form-control-label">
                    NDI / NDT
                </label>
            </div>
            @foreach($project_workpackage->engineers as $engineer)
                @if($engineer->skill->name == 'NDI / NDT')
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <select name="employee" style="width:100%" id="employee_ndi_ndt" class="form-control">
                            <option value="">Select an Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->code }}"  @if($engineer->engineer->code == $employee->code) selected @endif>{{ $employee->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        @component('frontend.common.input.number')
                            @slot('id', 'ndi_ndt_qty')
                            @slot('text', 'NDI / NDT Quantity')
                            @slot('name', 'ndi_ndt_qty')
                            @slot('class', 'engineer_qty')
                            @slot('id_error', 'ndi_ndt_qty')
                            @slot('input_append', 'person')
                            @if(!empty($engineer))
                            @slot('value', $engineer->quantity)
                            @endif
                            @slot('min',0)
                        @endcomponent
                    </div>
                @endif
            @endforeach
            <div class="col-sm-6 col-md-6 col-lg-6">
                <select name="employee" style="width:100%" id="employee_ndi_ndt" class="form-control">
                    <option value="">Select an Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->code }}">{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                @component('frontend.common.input.number')
                    @slot('id', 'ndi_ndt_qty')
                    @slot('text', 'NDI / NDT Quantity')
                    @slot('name', 'ndi_ndt_qty')
                    @slot('class', 'engineer_qty')
                    @slot('id_error', 'ndi_ndt_qty')
                    @slot('input_append', 'person')
                    @if(!empty($engineer))
                    @slot('value', $engineer->quantity)
                    @else
                    @slot('value', $engineers_quantity["ndi-ndt"])
                    @endif
                    @slot('min',0)
                @endcomponent
            </div>
                @component('frontend.common.input.hidden')
                    @slot('id', 'engineer_skills')
                    @slot('name', 'engineer_skills')
                    @slot('value', 'NDI / NDT')
                @endcomponent
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
                    @if($project_workpackage->tat)
                    @slot('value', $project_workpackage->tat)
                    @endif
                @endcomponent
            </div>
            <div class="btn btn-default calculate" id="calculate">
                <span>
                    <i class="fa fa-calculator"></i>
                    Calculate
                </span>
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

                @include('frontend.common.buttons.back')


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
{{-- <script src="{{ asset('js/frontend/functions/fill-combobox/employee.js')}}"></script> --}}
<script>
    let project_uuid = '{{ $project->uuid }}';
    let mhrs_pfrm_factor = '{{ $mhrs_pfrm_factor }}';

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
