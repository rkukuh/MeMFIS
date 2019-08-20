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
                            <tr>
                                <td align="left" width="30%">Benefits Name (genereate lock)</td>
                                <td align="center" width="25%">
                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Generated')
                                    @endcomponent       
                                </td>
                                <td  width="30%">
                                    <p>Min~Max = 1.000.000 - 2.000.000 <br> Calculation Refrence: <br> Pro-rate Base Calculation:</p>
                                </td>
                                <td align="center" width="15%">
                                    @component('frontend.common.input.checkbox')
                                        @slot('id', 'benefit')
                                        @slot('name', 'benefit')
                                        @slot('size', '')
                                        @slot('style','width:20px;')
                                        @slot('disabled','disabled')
                                    @endcomponent
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="30%">Benefits Name (genereate lock)</td>
                                <td align="center" width="25%">
                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Generated')
                                    @endcomponent         
                                </td>
                                <td  width="30%">
                                    <p>Min~Max = 1.000.000 - 2.000.000 <br> Calculation Refrence: <br> Pro-rate Base Calculation:</p>
                                </td>
                                <td align="center" width="15%">
                                    @component('frontend.common.input.checkbox')
                                        @slot('id', 'benefit')
                                        @slot('name', 'benefit')
                                        @slot('size', '')
                                        @slot('style','width:20px;')
                                        @slot('disabled','disabled')
                                    @endcomponent
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="30%">Benefits Name (genereate lock)</td>
                                <td align="center" width="25%">
                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Generated')
                                    @endcomponent      
                                </td>
                                <td  width="30%">
                                    <p>Min~Max = 1.000.000 - 2.000.000 <br> Calculation Refrence: <br> Pro-rate Base Calculation:</p>
                                </td>
                                <td align="center" width="15%">
                                    @component('frontend.common.input.checkbox')
                                        @slot('id', 'benefit')
                                        @slot('name', 'benefit')
                                        @slot('size', '')
                                        @slot('style','width:20px;')
                                        @slot('disabled','disabled')
                                    @endcomponent
                                </td>
                            </tr>
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
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Maximum Overtime per Period 
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Maximum Overtime per Period')
                        @slot('id', 'max_overtime')
                        @slot('name', 'max_overtime')
                        @slot('id_error', 'max_overtime')
                        @slot('input_append','Hours')
                        @slot('disabled','disabled')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Holiday Overtime Allowance 
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Holiday Overtime Allowance')
                        @slot('id', 'holiday_overtime')
                        @slot('name', 'holiday_overtime')
                        @slot('id_error', 'holiday_overtime')
                        @slot('input_append','IDR per Day')
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
                    <table width="100%" cellpadding="4" border="1">
                        <tr>
                            <td colspan="3" align="center" style="background:#8d32a8;color:white;font-weight: bold">BPJS TITLE</td>
                            <td rowspan="5" align="center">
                                @component('frontend.common.input.checkbox')
                                    @slot('id', 'check')
                                    @slot('name', 'check')
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
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.input.number')
                                    @slot('id', 'percentage_of_basic_salary_company')
                                    @slot('name', 'percentage_of_basic_salary_company')
                                    @slot('id_error', 'percentage_of_basic_salary_company')
                                    @slot('input_append','%')
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Minimum value</td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Maximum Value</td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                        </tr>
                    </table>
                    <table width="100%" cellpadding="4" border="1" class="mt-3">
                        <tr>
                            <td colspan="3" align="center" style="background:#8d32a8;color:white;font-weight: bold">BPJS TITLE</td>
                            <td rowspan="5" align="center">
                                @component('frontend.common.input.checkbox')
                                    @slot('id', 'check')
                                    @slot('name', 'check')
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
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.input.number')
                                    @slot('id', 'percentage_of_basic_salary_company')
                                    @slot('name', 'percentage_of_basic_salary_company')
                                    @slot('id_error', 'percentage_of_basic_salary_company')
                                    @slot('input_append','%')
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Minimum value</td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Maximum Value</td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                        </tr>
                    </table>
                    <table width="100%" cellpadding="4" border="1" class="mt-3">
                        <tr>
                            <td colspan="3" align="center" style="background:#8d32a8;color:white;font-weight: bold">BPJS TITLE</td>
                            <td rowspan="5" align="center">
                                @component('frontend.common.input.checkbox')
                                    @slot('id', 'check')
                                    @slot('name', 'check')
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
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.input.number')
                                    @slot('id', 'percentage_of_basic_salary_company')
                                    @slot('name', 'percentage_of_basic_salary_company')
                                    @slot('id_error', 'percentage_of_basic_salary_company')
                                    @slot('input_append','%')
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Minimum value</td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="pt-3">Maximum Value</td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                            <td align="center" valign="top">
                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Generated')
                                @endcomponent
                            </td>
                        </tr>
                    </table>
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
                        @slot('disabled','disabled')
                    @endcomponent
                </div>
                <div class="col-sm-10 col-md-10 col-lg-10">
                    @component('frontend.common.input.radio')
                        @slot('id', 'break')
                        @slot('name', 'pause')
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

                    @component('frontend.common.input.number')
                        @slot('text', 'Late Tolerance')
                        @slot('id', 'late_tolerance')
                        @slot('name', 'late_tolerance')
                        @slot('id_error', 'late_tolerance')
                        @slot('input_append','Minutes')
                        @slot('disabled','disabled')
                    @endcomponent
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Late Pushiment
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Late Pushiment')
                        @slot('id', 'late_pushiment')
                        @slot('name', 'late_pushiment')
                        @slot('id_error', 'late_pushiment')
                        @slot('input_append','IDR')
                        @slot('disabled','disabled')
                    @endcomponent
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label class="form-control-label">
                        Absences Punishment(per Day)
                    </label>

                    @component('frontend.common.input.number')
                        @slot('text', 'Absences Punishment(per Day)')
                        @slot('id', 'absences_punishment')
                        @slot('name', 'absences_punishment')
                        @slot('id_error', 'absences_punishment')
                        @slot('input_append','IDR')
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

@include('frontend.employee.employee.include.benefit.modal-history')

    


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
    </style>
@endpush