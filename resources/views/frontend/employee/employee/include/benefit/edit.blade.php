@if ($button_parameter == 'create')
{{-- FORM CREATE --}}
@component('frontend.common.input.hidden')
        @slot('id', 'employee_uuid')
        @slot('name', 'employee_uuid')
        @slot('value', $employee->uuid)
@endcomponent

<div class="jumbotron p-3" style="background:#294294;">
    <div class="row">
        <div class="col">
            <h1 class="display-5 text-white">Salary Addition</h1>
        </div>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border">
            <legend class="w-auto"><b>Allowance</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div style="border-bottom:3px solid black">
                        <table width="100%" cellpadding="7" border="1">
                            <tr>
                                <td align="left" width="30%"><b>Benefits Name</b></td>
                                <td align="center" width="25%"><b>Amount</b></td>
                                <td align="center" width="30%"><b>Description</b></td>
                                <td align="center" width="15%"><b>Action</b></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table width="100%" cellpadding="7">
                            
                            @for ($i = 0; $i < count($employee_benefit); $i++)
                                
                                <tr>
                                <td align="left" width="30%">{{ $employee_benefit[$i]['benefit_name'] }}</td>
                                    <td align="center" width="25%">
                                        @component('frontend.common.input.number')
                                            @slot('min', $employee_benefit[$i]['min'])
                                            @slot('max', $employee_benefit[$i]['max'])
                                            @slot('name', $employee_benefit[$i]['benefit_uuid'].'_amount')
                                            @slot('id', $employee_benefit[$i]['benefit_uuid'].'_amount')
                                            @slot('id_error', $employee_benefit[$i]['benefit_uuid'])
                                        @endcomponent                    
                                    </td>
                                    <td  width="30%">
                                    <p>Min~Max = {{ $employee_benefit[$i]['min'] }} - {{ $employee_benefit[$i]['max'] }} <br> Calculation Refrence: {{ $employee_benefit[$i]['base_calculation'] }}<br> Pro-rate Base Calculation:  {{ $employee_benefit[$i]['prorate_calculation'] }}</p>
                                    </td>
                                    <td align="center" width="15%">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', $employee_benefit[$i]['benefit_uuid'])
                                            @slot('name', 'check_benefit')
                                            @slot('value', $employee_benefit[$i]['benefit_uuid'])
                                            @slot('onclik', 'checkboxFunction(this.id)')
                                            @slot('size', '')
                                            @slot('style','width:20px;')
                                        @endcomponent
                                    </td>
                                </tr>

                            @endfor

                        </table>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Other</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                    <label class="form-control-label">
                        Maximum Overtime per Period 
                    </label>

                    @component('frontend.common.input.text')
                        @slot('id', 'duration')
                        @slot('name', 'maximum_overtime')
                        @slot('id_error', 'maximum_overtime')
                    @endcomponent

                    <p class="mt-2 font-weight-bold">Seconds: <span id="duration-label"></span></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                    <label class="form-control-label">
                        After Minimum Overtime
                    </label>

                    @component('frontend.common.input.text')
                        @slot('id', 'duration_1')
                        @slot('name', 'minimum_overtime')
                        @slot('id_error', 'minimum_overtime')
                    @endcomponent

                    <p class="mt-2 font-weight-bold">Seconds: <span id="duration-label-2"></span></p>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Holiday Overtime Allowance 
                    </label>

                    @component('frontend.common.input.number')
                        @slot('id', 'holiday_overtime')
                        @slot('name', 'holiday_overtime')
                        @slot('id_error', 'holiday_overtime')
                        @slot('input_append','IDR per Day')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>
    
<div class="jumbotron p-3 mt-5" style="background:#299469;">
    <div class="row">
        <div class="col">
            <h1 class="display-5 text-white">Salary Deduction</h1>
        </div>
    </div>
</div>


<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-3">
            <legend class="w-auto"><b>BPJS</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    @foreach ($employee_bpjs as $bpjs)

                    <table width="100%" cellpadding="4" border="1">
                        <tr>
                        <td colspan="3" align="center" style="background:#8d32a8;color:white;font-weight: bold">{{ $bpjs->name }}</td>
                            <td rowspan="5" align="center">
                                @component('frontend.common.input.checkbox')
                                    @slot('id', $bpjs->uuid)
                                    @slot('name', 'check_bpjs')
                                    @slot('onclik','checkboxBPJSFunction(this.id)')
                                    @slot('value',$bpjs->uuid)
                                    @slot('style','width:20px;')
                                @endcomponent
                            </td>
                        </tr>
                        <tr style="background:#f5f5f5;font-weight: bold">
                            <td align="center" valign="top">Description</td>
                            <td align="center" valign="top">Paid by Employees</td>
                            <td align="center" valign="top">Paid by Company</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Percentage of Basic Salary</td>
                            <td align="center" valign="top">
                                 @component('frontend.common.input.number')
                                    @slot('name', $bpjs->uuid.'_employee')
                                    @slot('value', $bpjs->employee_paid)
                                    @slot('id_error', $bpjs->uuid.'_employee')
                                    @slot('input_append','%')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.input.number')
                                    @slot('value', $bpjs->company_paid)
                                    @slot('name', $bpjs->uuid.'_company')
                                    @slot('id_error', $bpjs->uuid.'_company')
                                    @slot('input_append','%')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Minimum value</td>
                            <td align="center" valign="top">
                                 @component('frontend.common.input.number')
                                    @slot('value', $bpjs->employee_min_value)
                                    @slot('name', $bpjs->uuid.'_employee_min')
                                    @slot('id_error', $bpjs->uuid.'_employee_min')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.input.number')
                                    @slot('value', $bpjs->employee_max_value)
                                    @slot('name', $bpjs->uuid.'_company_min')
                                    @slot('id_error', $bpjs->uuid.'_company_min')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Maximum Value</td>
                            <td align="center" valign="top">
                                 @component('frontend.common.input.number')
                                    @slot('value', $bpjs->company_min_value)
                                    @slot('name', $bpjs->uuid.'_employee_max')
                                    @slot('id_error', $bpjs->uuid.'_employee_max')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.input.number')
                                    @slot('value', $bpjs->company_max_value)
                                    @slot('name', $bpjs->uuid.'_company_max')
                                    @slot('id_error', $bpjs->uuid.'_company_max')
                                @endcomponent
                            </td>
                        </tr>
                    </table>
                   
                    @endforeach

                </div>
            </div>
        </fieldset>
        <fieldset class="border p-3 mt-3">
            <legend class="w-auto"><b>PPH 21</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    @component('frontend.common.input.radio')
                        @slot('id', 'break')
                        @slot('name', 'pause')
                        @slot('text', 'Paid by Employee')
                        @slot('value', 'employee')
                        @slot('required','required')
                    @endcomponent
                </div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    @component('frontend.common.input.radio')
                        @slot('id', 'break')
                        @slot('name', 'pause')
                        @slot('text', 'Paid by Company')
                        @slot('value', 'company')
                        @slot('required','required')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>


<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-3">
            <legend class="w-auto"><b>Lately & Absences</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Late Tolerance
                    </label>

                    @component('frontend.common.input.number')
                        @slot('id', 'late_tolerance')
                        @slot('name', 'late_tolerance')
                        @slot('id_error', 'late_tolerance')
                        @slot('input_append','Minutes')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Late Pushiment
                    </label>

                    @component('frontend.common.input.number')
                        @slot('id', 'late_punishment')
                        @slot('name', 'late_punishment')
                        @slot('id_error', 'late_punishment')
                        @slot('input_append','IDR')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Absences Punishment(per Day)
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Absences Punishment(per Day)')
                        @slot('id', 'absence_punishment')
                        @slot('name', 'absence_punishment')
                        @slot('id_error', 'absence_punishment')
                        @slot('input_append','IDR')
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
            @slot('data_target', '#modal_history_benefit')
            @slot('icon','la la-history')
        @endcomponent
    </div>
</div>
@elseif($button_parameter == 'approvals')
{{-- FORM APPROVAL --}}
@component('frontend.common.input.hidden')
        @slot('id', 'employee_uuid')
        @slot('name', 'employee_uuid')
        @slot('value', $employee->uuid)
@endcomponent

<div class="jumbotron p-3" style="background:#294294;">
    <div class="row">
        <div class="col">
            <h1 class="display-5 text-white">Salary Addition</h1>
        </div>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border">
            <legend class="w-auto"><b>Allowance</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div style="border-bottom:3px solid black">
                        <table width="100%" cellpadding="7" border="1">
                            <tr>
                                <td align="left" width="30%"><b>Benefits Name</b></td>
                                <td align="center" width="25%"><b>Amount</b></td>
                                <td align="center" width="30%"><b>Description</b></td>
                                <td align="center" width="15%"><b>Action</b></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table width="100%" cellpadding="7">
                            
                                @for ($l = 0; $l < count($approve['benefit']); $l++)

                                <tr>
                                    <td align="left" width="30%">{{ $approve['benefit_name'][$l]['name']['name'] }}</td>
                                    <td align="center" width="25%">
                                        @component('frontend.common.label.data-info')
                                            @slot('text', $approve['benefit'][$l]['amount'])
                                        @endcomponent       
                                    </td>
                                    <td  width="30%">
                                        <p>Min~Max = {{ $approve['position_min_max'][$l]->pivot->min }} - {{ $approve['position_min_max'][$l]->pivot->max }} <br> Calculation Refrence: <br> Pro-rate Base Calculation:</p>
                                    </td>
                                    <td align="center" width="15%">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'benefit')
                                            @slot('name', 'benefit')
                                            @slot('size', '')
                                            @slot('checked', 'checked')
                                            @slot('style','width:20px;')
                                            @slot('disabled','disabled')
                                        @endcomponent
                                    </td>
                                </tr>
    
                                @endfor

                        </table>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Other</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                    <label class="form-control-label">
                        Maximum Overtime per Period 
                    </label>

                    @php
                    $maximum_overtime = null;
                    if(isset($approve['provisions'][0]['maximum_overtime'])){
                        $maximum_overtime = $approve['provisions'][0]['maximum_overtime'];
                    }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('text', 'Maximum Overtime per Period')
                        @slot('id', 'max_overtime')
                        @slot('name', 'max_overtime')
                        @slot('id_error', 'max_overtime')
                        @slot('input_append','Hours')
                        @slot('value', $maximum_overtime)
                        @slot('disabled','disabled')
                    @endcomponent

                    <p class="mt-2 font-weight-bold">Seconds: <span id="duration-label"></span></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                    <label class="form-control-label">
                        After Minimum Overtime
                    </label>

                    @component('frontend.common.input.text')
                        @slot('id', 'duration_1')
                        @slot('name', 'minimum_overtime')
                        @slot('id_error', 'minimum_overtime')
                    @endcomponent

                    <p class="mt-2 font-weight-bold">Seconds: <span id="duration-label-2"></span></p>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Holiday Overtime Allowance 
                    </label>

                    @php
                    $holiday_overtime = null;
                    if(isset($approve['provisions'][0]['holiday_overtime'])){
                        $holiday_overtime = $approve['provisions'][0]['holiday_overtime'];
                    }
                @endphp
                @component('frontend.common.input.number')
                    @slot('text', 'Holiday Overtime Allowance')
                    @slot('id', 'holiday_overtime')
                    @slot('name', 'holiday_overtime')
                    @slot('id_error', 'holiday_overtime')
                    @slot('input_append','IDR per Day')
                    @slot('value', $holiday_overtime)
                    @slot('disabled','disabled')
                @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>
    
<div class="jumbotron p-3 mt-5" style="background:#299469;">
    <div class="row">
        <div class="col">
            <h1 class="display-5 text-white">Salary Deduction</h1>
        </div>
    </div>
</div>


<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-3">
            <legend class="w-auto"><b>BPJS</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                        @for ($i = 0; $i < count($approve['bpjs']); $i++)

                        <table width="100%" cellpadding="4" border="1">
                            <tr>
                            <td colspan="3" align="center" style="background:#8d32a8;color:white;font-weight: bold">{{ $approve['bpjs_name'][$i]['name']['name'] }}</td>
                                <td rowspan="5" align="center">
                                    @component('frontend.common.input.checkbox')
                                        @slot('id', 'check')
                                        @slot('name', 'check')
                                        @slot('checked', 'checked')
                                        @slot('size', '')
                                        @slot('style','width:20px;')
                                        @slot('disabled','disabled')
                                    @endcomponent
                                </td>
                            </tr>
                            <tr style="background:#f5f5f5;font-weight: bold">
                                <td align="center" valign="top">Description</td>
                                <td align="center" valign="top">Paid by Employees</td>
                                <td align="center" valign="top">Paid by Company</td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" class="pt-3">Percentage of Basic Salary</td>
                                <td align="center" valign="top">
                                     @component('frontend.common.input.number')
                                        @slot('id', 'percentage_of_basic_salary_employee')
                                        @slot('name', 'percentage_of_basic_salary_employee')
                                        @slot('id_error', 'percentage_of_basic_salary_employee')
                                        @slot('input_append','%')
                                        @slot('value', $approve['bpjs'][$i]['employee_paid'])
                                        @slot('disabled','disabled')
                                    @endcomponent
                                </td>
                                <td align="center" valign="top">
                                    @component('frontend.common.input.number')
                                        @slot('id', 'percentage_of_basic_salary_company')
                                        @slot('name', 'percentage_of_basic_salary_company')
                                        @slot('id_error', 'percentage_of_basic_salary_company')
                                        @slot('input_append','%')
                                        @slot('value', $approve['bpjs'][$i]['company_paid'])
                                        @slot('disabled','disabled')
                                    @endcomponent
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" class="pt-3">Minimum value</td>
                                <td align="center" valign="top">
                                    @component('frontend.common.label.data-info')
                                        @slot('text', $approve['bpjs'][$i]['employee_min_value'])
                                    @endcomponent
                                </td>
                                <td align="center" valign="top">
                                    @component('frontend.common.label.data-info')
                                        @slot('text', $approve['bpjs'][$i]['company_min_value'])
                                    @endcomponent
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" class="pt-3">Maximum Value</td>
                                <td align="center" valign="top">
                                    @component('frontend.common.label.data-info')
                                        @slot('text', $approve['bpjs'][$i]['employee_max_value'])
                                    @endcomponent
                                </td>
                                <td align="center" valign="top">
                                    @component('frontend.common.label.data-info')
                                        @slot('text', $approve['bpjs'][$i]['company_min_value'])
                                    @endcomponent
                                </td>
                            </tr>
                        </table>
                       
                            @endfor

                </div>
            </div>
        </fieldset>
        <fieldset class="border p-3 mt-3">
            <legend class="w-auto"><b>PPH 21</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                        @php
                        $employee = null;
                        $company = null;

                        if(isset($approve['provisions'][0]['pph'])){
                        if($approve['provisions'][0]['pph'] == 'employee'){
                            $employee = 'checked';
                        }else if($approve['provisions'][0]['pph'] == 'company'){
                            $company = 'checked';
                        }
                        }
                    @endphp
                    @component('frontend.common.input.radio')
                    @slot('id', 'break')
                    @slot('name', 'pause')
                    @slot('text', 'Paid by Employee')
                    @slot('checked', $employee)
                    @slot('disabled','disabled')
                @endcomponent
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10">
                @component('frontend.common.input.radio')
                    @slot('id', 'break')
                    @slot('name', 'pause')
                    @slot('checked', $company)
                    @slot('text', 'Paid by Company')
                    @slot('disabled','disabled')
                @endcomponent
            </div>
            </div>
        </fieldset>
    </div>
</div>


<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-3">
            <legend class="w-auto"><b>Lately & Absences</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Late Tolerance
                    </label>

                    @php
                    $late_tolerance = null;
                    if(isset($approve['provisions'][0]['late_tolerance'])){
                        $late_tolerance = $approve['provisions'][0]['late_tolerance'];
                    }
                @endphp
                @component('frontend.common.input.number')
                    @slot('text', 'Late Tolerance')
                    @slot('id', 'late_tolerance')
                    @slot('name', 'late_tolerance')
                    @slot('id_error', 'late_tolerance')
                    @slot('input_append','Minutes')
                    @slot('value', $late_tolerance)
                    @slot('disabled','disabled')
                @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Late Pushiment
                    </label>

                    @php
                    $late_punishment = null;
                    if(isset($approve['provisions'][0]['late_punishment'])){
                        $late_punishment = $approve['provisions'][0]['late_punishment'];
                    }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('text', 'Late Pushiment')
                        @slot('id', 'late_pushiment')
                        @slot('name', 'late_pushiment')
                        @slot('id_error', 'late_pushiment')
                        @slot('input_append','IDR')
                        @slot('value', $late_punishment)
                        @slot('disabled','disabled')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Absences Punishment(per Day)
                    </label>

                    @php
                    $absence_punishment = null;
                    if(isset($approve['provisions'][0]['absence_punishment'])){
                        $absence_punishment = $approve['provisions'][0]['absence_punishment'];
                    }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('text', 'Absences Punishment(per Day)')
                        @slot('id', 'absences_punishment')
                        @slot('name', 'absences_punishment')
                        @slot('id_error', 'absences_punishment')
                        @slot('input_append','IDR')
                        @slot('value', $absence_punishment)
                        @slot('disabled','disabled')
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
            @slot('data_target', '#modal_history_benefit')
            @slot('icon','la la-history')
        @endcomponent
    </div>
</div>
@else
{{-- FORM EDIT --}}
@component('frontend.common.input.hidden')
        @slot('id', 'employee_uuid')
        @slot('name', 'employee_uuid')
        @slot('value', $employee->uuid)
@endcomponent

<div class="jumbotron p-3" style="background:#294294;">
    <div class="row">
        <div class="col">
            <h1 class="display-5 text-white">Salary Addition</h1>
        </div>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border">
            <legend class="w-auto"><b>Allowance</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div style="border-bottom:3px solid black">
                        <table width="100%" cellpadding="7" border="1">
                            <tr>
                                <td align="left" width="30%"><b>Benefits Name</b></td>
                                <td align="center" width="25%"><b>Amount</b></td>
                                <td align="center" width="30%"><b>Description</b></td>
                                <td align="center" width="15%"><b>Action</b></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table width="100%" cellpadding="7">
                            @php
                                $search = array();
                                for($r=0; $r < count($current['benefit_name']); $r++){
                                    array_push($search,$current['benefit_name'][$r]['name']['uuid']);
                                }
                            @endphp
                            @for ($i = 0; $i < count($employee_benefit); $i++)
                            @if (in_array($employee_benefit[$i]['benefit_uuid'], $search))
                            @php
                                $key = array_search($employee_benefit[$i]['benefit_uuid'], $search)    
                            @endphp
                            <tr>
                                    <td align="left" width="30%">{{ $employee_benefit[$i]['benefit_name'] }}</td>
                                        <td align="center" width="25%">
                                            @component('frontend.common.input.number')
                                                @slot('min', $employee_benefit[$i]['min'])
                                                @slot('max', $employee_benefit[$i]['max'])
                                                @slot('name', $employee_benefit[$i]['benefit_uuid'].'_amount')
                                                @slot('value', $current['benefit'][$key]['amount'])
                                                @slot('id', $employee_benefit[$i]['benefit_uuid'].'_amount')
                                                @slot('id_error', $employee_benefit[$i]['benefit_uuid'])
                                            @endcomponent                    
                                        </td>
                                        <td  width="30%">
                                        <p>Min~Max = {{ $employee_benefit[$i]['min'] }} - {{ $employee_benefit[$i]['max'] }} <br> Calculation Refrence: {{ $employee_benefit[$i]['base_calculation'] }}<br> Pro-rate Base Calculation:  {{ $employee_benefit[$i]['prorate_calculation'] }}</p>
                                        </td>
                                        <td align="center" width="15%">
                                            @component('frontend.common.input.checkbox')
                                                @slot('id', $employee_benefit[$i]['benefit_uuid'])
                                                @slot('name', 'check_benefit')
                                                @slot('value', $employee_benefit[$i]['benefit_uuid'])
                                                @slot('onclik', 'checkboxFunction(this.id)')
                                                @slot('size', '')
                                                @slot('checked','checked')
                                                @slot('style','width:20px;')
                                            @endcomponent
                                        </td>
                                    </tr>
                            @else
                                <tr>
                                <td align="left" width="30%">{{ $employee_benefit[$i]['benefit_name'] }}</td>
                                    <td align="center" width="25%">
                                        @component('frontend.common.input.number')
                                            @slot('min', $employee_benefit[$i]['min'])
                                            @slot('max', $employee_benefit[$i]['max'])
                                            @slot('name', $employee_benefit[$i]['benefit_uuid'].'_amount')
                                            @slot('id', $employee_benefit[$i]['benefit_uuid'].'_amount')
                                            @slot('id_error', $employee_benefit[$i]['benefit_uuid'])
                                        @endcomponent                    
                                    </td>
                                    <td  width="30%">
                                    <p>Min~Max = {{ $employee_benefit[$i]['min'] }} - {{ $employee_benefit[$i]['max'] }} <br> Calculation Refrence: {{ $employee_benefit[$i]['base_calculation'] }}<br> Pro-rate Base Calculation:  {{ $employee_benefit[$i]['prorate_calculation'] }}</p>
                                    </td>
                                    <td align="center" width="15%">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', $employee_benefit[$i]['benefit_uuid'])
                                            @slot('name', 'check_benefit')
                                            @slot('value', $employee_benefit[$i]['benefit_uuid'])
                                            @slot('onclik', 'checkboxFunction(this.id)')
                                            @slot('size', '')
                                            @slot('style','width:20px;')
                                        @endcomponent
                                    </td>
                                </tr>
                                @endif
                            @endfor

                        </table>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Other</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                    <label class="form-control-label">
                        Maximum Overtime per Period 
                    </label>
                    @php
                    $maximum_overtime = null;
                    if(isset($current['provisions'][0]['maximum_overtime'])){
                        $maximum_overtime = $current['provisions'][0]['maximum_overtime'];
                    }
                    @endphp
                    @component('frontend.common.input.text')
                        @slot('id', 'duration')
                        @slot('name', 'maximum_overtime')
                        @slot('value', $maximum_overtime)
                        @slot('id_error', 'maximum_overtime')
                    @endcomponent

                    <p class="mt-2 font-weight-bold">Seconds: <span id="duration-label"></span></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                    <label class="form-control-label">
                        After Minimum Overtime
                    </label>
                    @php
                    $minimum_overtime = null;
                    if(isset($current['provisions'][0]['minimum_overtime'])){
                        $minimum_overtime = $current['provisions'][0]['minimum_overtime'];
                    }
                    @endphp
                    @component('frontend.common.input.text')
                        @slot('id', 'duration_1')
                        @slot('name', 'minimum_overtime')
                        @slot('value', $minimum_overtime)
                        @slot('id_error', 'minimum_overtime')
                    @endcomponent

                    <p class="mt-2 font-weight-bold">Seconds: <span id="duration-label-2"></span></p>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Holiday Overtime Allowance 
                    </label>
                    @php
                    $holiday_overtime = null;
                    if(isset($current['provisions'][0]['holiday_overtime'])){
                        $holiday_overtime = $current['provisions'][0]['holiday_overtime'];
                    }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('id', 'holiday_overtime')
                        @slot('name', 'holiday_overtime')
                        @slot('id_error', 'holiday_overtime')
                        @slot('value', $holiday_overtime)
                        @slot('input_append','IDR per Day')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>
    
<div class="jumbotron p-3 mt-5" style="background:#299469;">
    <div class="row">
        <div class="col">
            <h1 class="display-5 text-white">Salary Deduction</h1>
        </div>
    </div>
</div>


<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-3">
            <legend class="w-auto"><b>BPJS</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    @php
                    $search = array();
                    for($r=0; $r < count($current['bpjs_name']); $r++){
                        array_push($search,$current['bpjs_name'][$r]['name']['uuid']);
                    }
                    @endphp
                    @foreach ($employee_bpjs as $bpjs)
                    @if (in_array($bpjs->uuid, $search))
                        @php
                            $key = array_search($bpjs->uuid, $search);   
                        @endphp
                        <table width="100%" cellpadding="4" border="1">
                                <tr>
                                <td colspan="3" align="center" style="background:#8d32a8;color:white;font-weight: bold">{{ $bpjs->name }}</td>
                                    <td rowspan="5" align="center">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', $current['bpjs_name'][$key]['name']['uuid'])
                                            @slot('name', 'check_bpjs')
                                            @slot('onclik','checkboxBPJSFunction(this.id)')
                                            @slot('checked', 'checked');
                                            @slot('value',$current['bpjs_name'][$key]['name']['uuid'])
                                            @slot('style','width:20px;')
                                        @endcomponent
                                    </td>
                                </tr>
                                <tr style="background:#f5f5f5;font-weight: bold">
                                    <td align="center" valign="top">Description</td>
                                    <td align="center" valign="top">Paid by Employees</td>
                                    <td align="center" valign="top">Paid by Company</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" class="pt-3">Percentage of Basic Salary</td>
                                    <td align="center" valign="top">
                                         @component('frontend.common.input.number')
                                            @slot('name', $current['bpjs_name'][$key]['name']['uuid'].'_employee')
                                            @slot('value', $current['bpjs'][$key]['employee_paid'])
                                            @slot('id_error', $current['bpjs_name'][$key]['name']['uuid'].'_employee')
                                            @slot('input_append','%')
                                        @endcomponent
                                    </td>
                                    <td align="center" valign="top">
                                        @component('frontend.common.input.number')
                                            @slot('value', $current['bpjs'][$key]['company_paid'])
                                            @slot('name', $current['bpjs_name'][$key]['name']['uuid'].'_company')
                                            @slot('id_error', $current['bpjs_name'][$key]['name']['uuid'].'_company')
                                            @slot('input_append','%')
                                        @endcomponent
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" class="pt-3">Minimum value</td>
                                    <td align="center" valign="top">
                                         @component('frontend.common.input.number')
                                            @slot('value', $current['bpjs'][$key]['employee_min_value'])
                                            @slot('name', $current['bpjs_name'][$key]['name']['uuid'].'_employee_min')
                                            @slot('id_error', $current['bpjs_name'][$key]['name']['uuid'].'_employee_min')
                                        @endcomponent
                                    </td>
                                    <td align="center" valign="top">
                                        @component('frontend.common.input.number')
                                            @slot('value', $current['bpjs'][$key]['company_min_value'])
                                            @slot('name', $current['bpjs_name'][$key]['name']['uuid'].'_company_min')
                                            @slot('id_error', $current['bpjs_name'][$key]['name']['uuid'].'_company_min')
                                        @endcomponent
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" class="pt-3">Maximum Value</td>
                                    <td align="center" valign="top">
                                         @component('frontend.common.input.number')
                                            @slot('value', $current['bpjs'][$key]['employee_max_value'])
                                            @slot('name', $current['bpjs_name'][$key]['name']['uuid'].'_employee_max')
                                            @slot('id_error', $current['bpjs_name'][$key]['name']['uuid'].'_employee_max')
                                        @endcomponent
                                    </td>
                                    <td align="center" valign="top">
                                        @component('frontend.common.input.number')
                                            @slot('value', $current['bpjs'][$key]['company_max_value'])
                                            @slot('name',  $current['bpjs_name'][$key]['name']['uuid'].'_company_max')
                                            @slot('id_error',  $current['bpjs_name'][$key]['name']['uuid'].'_company_max')
                                        @endcomponent
                                    </td>
                                </tr>
                            </table>
                    @else
                    <table width="100%" cellpadding="4" border="1">
                            <tr>
                            <td colspan="3" align="center" style="background:#8d32a8;color:white;font-weight: bold">{{ $bpjs->name }}</td>
                                <td rowspan="5" align="center">
                                    @component('frontend.common.input.checkbox')
                                        @slot('id', $bpjs->uuid)
                                        @slot('name', 'check_bpjs')
                                        @slot('onclik','checkboxBPJSFunction(this.id)')
                                        @slot('value',$bpjs->uuid)
                                        @slot('style','width:20px;')
                                    @endcomponent
                                </td>
                            </tr>
                            <tr style="background:#f5f5f5;font-weight: bold">
                                <td align="center" valign="top">Description</td>
                                <td align="center" valign="top">Paid by Employees</td>
                                <td align="center" valign="top">Paid by Company</td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" class="pt-3">Percentage of Basic Salary</td>
                                <td align="center" valign="top">
                                     @component('frontend.common.input.number')
                                        @slot('name', $bpjs->uuid.'_employee')
                                        @slot('value', $bpjs->employee_paid)
                                        @slot('id_error', $bpjs->uuid.'_employee')
                                        @slot('input_append','%')
                                    @endcomponent
                                </td>
                                <td align="center" valign="top">
                                    @component('frontend.common.input.number')
                                        @slot('value', $bpjs->company_paid)
                                        @slot('name', $bpjs->uuid.'_company')
                                        @slot('id_error', $bpjs->uuid.'_company')
                                        @slot('input_append','%')
                                    @endcomponent
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" class="pt-3">Minimum value</td>
                                <td align="center" valign="top">
                                     @component('frontend.common.input.number')
                                        @slot('value', $bpjs->employee_min_value)
                                        @slot('name', $bpjs->uuid.'_employee_min')
                                        @slot('id_error', $bpjs->uuid.'_employee_min')
                                    @endcomponent
                                </td>
                                <td align="center" valign="top">
                                    @component('frontend.common.input.number')
                                        @slot('value', $bpjs->employee_max_value)
                                        @slot('name', $bpjs->uuid.'_company_min')
                                        @slot('id_error', $bpjs->uuid.'_company_min')
                                    @endcomponent
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" class="pt-3">Maximum Value</td>
                                <td align="center" valign="top">
                                     @component('frontend.common.input.number')
                                        @slot('value', $bpjs->company_min_value)
                                        @slot('name', $bpjs->uuid.'_employee_max')
                                        @slot('id_error', $bpjs->uuid.'_employee_max')
                                    @endcomponent
                                </td>
                                <td align="center" valign="top">
                                    @component('frontend.common.input.number')
                                        @slot('value', $bpjs->company_max_value)
                                        @slot('name', $bpjs->uuid.'_company_max')
                                        @slot('id_error', $bpjs->uuid.'_company_max')
                                    @endcomponent
                                </td>
                            </tr>
                        </table>
                    @endif             
                    @endforeach

                </div>
            </div>
        </fieldset>
        <fieldset class="border p-3 mt-3">
            <legend class="w-auto"><b>PPH 21</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                        @php
                        $employee = null;
                        $company = null;

                        if(isset($current['provisions'][0]['pph'])){
                        if($current['provisions'][0]['pph'] == 'employee'){
                            $employee = 'checked';
                        }else if($current['provisions'][0]['pph'] == 'company'){
                            $company = 'checked';
                        }
                        }
                    @endphp
                    @component('frontend.common.input.radio')
                        @slot('id', 'break')
                        @slot('name', 'pause')
                        @slot('text', 'Paid by Employee')
                        @slot('value', 'employee')
                        @slot('required','required')
                        @slot('checked', $employee)
                    @endcomponent
                </div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    @component('frontend.common.input.radio')
                        @slot('id', 'break')
                        @slot('name', 'pause')
                        @slot('text', 'Paid by Company')
                        @slot('value', 'company')
                        @slot('checked', $company)
                        @slot('required','required')
                    @endcomponent
                </div>
            </div>
        </fieldset>
    </div>
</div>


<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-3">
            <legend class="w-auto"><b>Lately & Absences</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Late Tolerance
                    </label>
                    @php
                    $late_tolerance = null;
                        if(isset($current['provisions'][0]['late_tolerance'])){
                            $late_tolerance = $current['provisions'][0]['late_tolerance'];
                        }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('id', 'late_tolerance')
                        @slot('name', 'late_tolerance')
                        @slot('id_error', 'late_tolerance')
                        @slot('value', $late_tolerance)
                        @slot('input_append','Minutes')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Late Pushiment
                    </label>
                    @php
                    $late_punishment = null;
                        if(isset($current['provisions'][0]['late_punishment'])){
                            $late_punishment = $current['provisions'][0]['late_punishment'];
                        }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('id', 'late_punishment')
                        @slot('name', 'late_punishment')
                        @slot('id_error', 'late_punishment')
                        @slot('value', $late_punishment)
                        @slot('input_append','IDR')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Absences Punishment(per Day)
                    </label>
                    @php
                        $absence_punishment = null;
                        if(isset($current['provisions'][0]['absence_punishment'])){
                            $absence_punishment = $current['provisions'][0]['absence_punishment'];
                        }
                    @endphp
                    @component('frontend.common.input.number')
                        @slot('text', 'Absences Punishment(per Day)')
                        @slot('id', 'absence_punishment')
                        @slot('name', 'absence_punishment')
                        @slot('value', $absence_punishment)
                        @slot('id_error', 'absence_punishment')
                        @slot('input_append','IDR')
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
            @slot('data_target', '#modal_history_benefit')
            @slot('icon','la la-history')
        @endcomponent
    </div>
</div>
@endif
@include('frontend.employee.employee.include.benefit.modal-history')

<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12 footer">
        <div class="flex">
            <div class="action-buttons">

                @if ($button_parameter == 'create')
                    @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'create-benefit')
                    @slot('class', 'create-benefit')
                    @endcomponent 

                    @include('frontend.common.buttons.reset')
                @elseif ($button_parameter == 'approvals')
                    @component('frontend.common.buttons.submit')     
                    @slot('type','button')
                    @slot('text','Approve')
                    @slot('icon','fa-check')
                    @slot('id', 'approve_benefit')
                    @slot('class', 'approve_benefit')
                    @endcomponent
                @else
                    @component('frontend.common.buttons.submit')
                    @slot('type','button')
                    @slot('id', 'edit-benefit')
                    @slot('class', 'edit-benefit')
                    @endcomponent

                    @include('frontend.common.buttons.reset')
                @endif

                @include('frontend.common.buttons.back')

            </div>
        </div>
    </div>
</div>
    


@push('header-scripts')
    <style>
        .m-radio>span, .m-checkbox>span{
            width:28px !important;
            height: 28px !important;
        }

        .m-radio, .m-checkbox{
            padding-left:38px;
            padding-top:6px;
        }
        .bdp-block{
            padding-top: 0;
            padding-bottom: 0;
            margin-left:20px;
            text-align: center;
        } 
        
        .bdp-block input{
            width:90px;
            text-align:center;
        }
    </style>
@endpush


@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/bootstrap-duration-picker.js') }}"></script>
    <script>
            $(function () {
              $('#duration').durationPicker({
                onChanged: function (newVal) {
                  $('#duration-label').text(newVal);
                }
              });
              $('#duration_1').durationPicker({
                onChanged: function (newVal) {
                  $('#duration-label-2').text(newVal);
                }
              });
              $('#reset-picker').click(function () {
                $('#duration6').data('durationPicker').setValue(0);
              });
              $('#destroy-picker').click(function () {
                $('#duration7').data('durationPicker').destroy();
                $(this).remove();
              })
            });
    </script>
@endpush

@push('footer-scripts')
<script src="{{ asset('js/frontend/employee/employee/approval_benefit.js') }}"></script>
<script src="{{ asset('js/frontend/employee/employee/create_benefit.js') }}"></script>
<script src="{{ asset('js/frontend/employee/employee/edit_benefit.js') }}"></script>
@endpush