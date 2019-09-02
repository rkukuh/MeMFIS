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
                    @slot('id', 'approve')
                    @slot('class', 'approve')
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
<script src="{{ asset('js/frontend/employee/employee/edit_benefit.js') }}"></script>
<script src="{{ asset('js/frontend/employee/employee/create_benefit.js') }}"></script>
@endpush