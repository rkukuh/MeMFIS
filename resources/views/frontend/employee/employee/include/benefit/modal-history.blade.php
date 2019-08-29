<div class="modal fade" id="modal_history_benefit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @include('frontend.common.label.show')
                    <h5 class="modal-title" id="TitleModalEducation">Basic Historical Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-portlet__body pb-0">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>

                                                <h3 class="m-portlet__head-text">
                                                    Current
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet m-portlet--mobile pb-3">
                                        <div class="m-portlet__body">
                                            <div class="my-4">
                                                <div class="d-flex justify-content-end">
                                                    <h3 class="m-portlet__head-text">
                                                        Approve by .... at .... (timestamp)
                                                    </h3>
                                                </div>
                                                <fieldset class="border p-2">
                                                    <legend class="w-auto"><b>Allowance</b></legend>
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="45%"><b>Benefit/Allowance Name</b></td>
                                                            <td align="center" width="55%"><b>Amount</b></td>
                                                        </tr>

                                                        @for ($l = 0; $l < count($current['benefit']); $l++)

                                                        <tr>
                                                        <td valign="top"><b>{{ $current['benefit_name'][$l]['name'] }}</b></td>
                                                        <td valign="top" align="center">{{ $current['benefit'][$l]['amount'] }}</td>
                                                        </tr>

                                                        @endfor

                                                    </table>
                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>Others</b></legend>
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="45%"><b>Maximum Overtime per Period</b></td>
                                                            <td align="center" width="55%"><b>Holiday Overtime Allowance</b></td>
                                                        </tr>
                                                        <tr>
                                                            @if (isset($current['provisions'][0]))
                                                            <td valign="top" align="center">{{ $current['provisions'][0]['maximum_overtime'] }}</td>
                                                            <td valign="top" align="center">{{ $current['provisions'][0]['holiday_overtime'] }}</td>            
                                                            @endif
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>BPJS</b></legend>

                                                    @for ($i = 0; $i < count($current['bpjs']); $i++)
                                                        
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="20%"></td>
                                                            <td align="center" width="40%"><b>Paid By Employees</b></td>
                                                            <td align="center" width="40%"><b>Paid By Company</b></td>
                                                        </tr>
                                                        <tr>
                                                        <td valign="top"><b>{{ $current['bpjs_name'][$i]['name'] }}</b></td>
                                                            <td valign="top" align="center">{{ $current['bpjs'][$i]['employee_paid'] }}</td>
                                                            <td valign="top" align="center">{{ $current['bpjs'][$i]['company_paid'] }}</td>
                                                        </tr>
                                                    </table>

                                                    @endfor

                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>PPH 21</b></legend>
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="45%"><b>Paid by Employees</b></td>
                                                            <td align="center" width="55%"><b>Paid by Employees</b></td>
                                                        </tr>
                                                        <tr>
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
                                                            <td valign="top" align="center">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'benefit')
                                                                    @slot('name', 'benefit')
                                                                    @slot('size', '')
                                                                    @slot('checked', $employee)
                                                                    @slot('style','width:20px;')
                                                                    @slot('disabled','disabled')
                                                                @endcomponent
                                                            </td>
                                                            <td valign="top" align="center">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'benefit')
                                                                    @slot('name', 'benefit')
                                                                    @slot('checked', $company)
                                                                    @slot('size', '')
                                                                    @slot('style','width:20px;')
                                                                    @slot('disabled','disabled')
                                                                @endcomponent
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>Lately & Absence</b></legend>
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="33%"><b>Late Tolerance</b></td>
                                                            <td align="center" width="33%"><b>Late Punishment</b></td>
                                                            <td align="center" width="34%"><b>Absences Punishment (per Day)</b></td>
                                                        </tr>
                                                        <tr>
                                                        @if (isset($current['provisions'][0]))
                                                        <td valign="top" align="center">{{ $current['provisions'][0]['late_tolerance'] }}</td>
                                                        <td valign="top" align="center">{{ $current['provisions'][0]['late_punishment'] }}</td>
                                                        <td valign="top" align="center">{{ $current['provisions'][0]['absence_punishment'] }}</td>
                                                        @endif
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body pt-0">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>

                                                <h3 class="m-portlet__head-text">
                                                    History
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    @for ($i = 0; $i < count($employee_benefit_history); $i++)

                                    <div class="m-portlet m-portlet--mobile pb-3">
                                        <div class="m-portlet__body">
                                            <div class="my-4">
                                                <div class="d-flex justify-content-end">
                                                    <h3 class="m-portlet__head-text">
                                                            @php
                                                            $created_time = $employee_benefit_history[$i]['created_at'];
                                                            $formatCreatedTime = strtotime($created_time);
    
                                                            $updated_time = $employee_benefit_history[$i]['updated_at'];
                                                            $formatUpdatedTime = strtotime($updated_time);
    
                                                            echo date("d F Y", $formatCreatedTime).' to '.date("d F Y", $formatUpdatedTime).', Approved By';
                                                        @endphp
                                                    </h3>
                                                </div>
                                                <fieldset class="border p-2">
                                                    <legend class="w-auto"><b>Allowance</b></legend>

                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="45%"><b>Benefit/Allowance Name</b></td>
                                                            <td align="center" width="55%"><b>Amount</b></td>
                                                        </tr>
                                                        @for ($x = 0; $x < count($employee_benefit_history[$i]['benefit']); $x++)
                                                        <tr>
                                                            <td valign="top"><b>{{ $employee_benefit_history[$i]['benefit_name'][$x]['name'] }}</b></td>
                                                            <td valign="top" align="center">{{ $employee_benefit_history[$i]['benefit'][$x]->amount }}</td>
                                                        </tr>
                                                        @endfor
                                                    </table>

                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>Others</b></legend>
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="45%"><b>Maximum Overtime per Period</b></td>
                                                            <td align="center" width="55%"><b>Holiday Overtime Allowance</b></td>
                                                        </tr>
                                                        <tr>
                                                        @if (isset($employee_benefit_history[$i]))
                                                        <td valign="top" align="center">{{ $employee_benefit_history[$i]['maximum_overtime'] }}</td>
                                                        <td valign="top" align="center">{{ $employee_benefit_history[$i]['holiday_overtime'] }}</td>
                                                        @endif
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>BPJS</b></legend>

                                                    @for ($x = 0; $x < count($employee_benefit_history[$i]['bpjs']); $x++)
                                                        
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="20%"></td>
                                                            <td align="center" width="40%"><b>Paid By Employees</b></td>
                                                            <td align="center" width="40%"><b>Paid By Company</b></td>
                                                        </tr>
                                                        <tr>
                                                            @if (isset($employee_benefit_history[$i]['bpjs_name'][$x]))
                                                            <td valign="top"><b>{{ $employee_benefit_history[$i]['bpjs_name'][$x]['name'] }}</b></td>
                                                            <td valign="top" align="center">{{ $employee_benefit_history[$i]['bpjs'][$x]->employee_paid }}</td>
                                                            <td valign="top" align="center">{{ $employee_benefit_history[$i]['bpjs'][$x]->company_paid }}</td>
                                                            @endif
                                                        </tr>
                                                    </table>

                                                    @endfor

                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>PPH 21</b></legend>
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                                @php
                                                                $employee = null;
                                                                $company = null;

                                                                if(isset( $employee_benefit_history[$i]['pph'])){
                                                                if($employee_benefit_history[$i]['pph'] == 'employee'){
                                                                    $employee = 'checked';
                                                                }else if($employee_benefit_history[$i]['pph'] == 'company'){
                                                                    $company = 'checked';
                                                                }
                                                            }
                                                                @endphp
                                                            <td align="center" width="45%"><b>Paid by Employees</b></td>
                                                            <td align="center" width="55%"><b>Paid by Employees</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" align="center">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'benefit')
                                                                    @slot('name', 'benefit')
                                                                    @slot('size', '')
                                                                    @slot('checked', $employee)
                                                                    @slot('style','width:20px;')
                                                                    @slot('disabled','disabled')
                                                                @endcomponent
                                                            </td>
                                                            <td valign="top" align="center">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'benefit')
                                                                    @slot('name', 'benefit')
                                                                    @slot('size', '')
                                                                    @slot('checked', $company)
                                                                    @slot('style','width:20px;')
                                                                    @slot('disabled','disabled')
                                                                @endcomponent
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                                <fieldset class="border p-2 mt-2">
                                                    <legend class="w-auto"><b>Lately & Absence</b></legend>
                                                    <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                        <tr>
                                                            <td align="center" width="33%"><b>Late Tolerance</b></td>
                                                            <td align="center" width="33%"><b>Late Punishment</b></td>
                                                            <td align="center" width="34%"><b>Absences Punishment (per Day)</b></td>
                                                        </tr>
                                                        <tr>
                                                            @if (isset($employee_benefit_history[$i]))
                                                            <td valign="top" align="center">{{ $employee_benefit_history[$i]['late_tolerance'] }}</td>
                                                            <td valign="top" align="center">{{ $employee_benefit_history[$i]['late_punishment'] }}</td>
                                                            <td valign="top" align="center">{{ $employee_benefit_history[$i]['absence_punishment'] }}</td>
                                                            @endif
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    @endfor

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                <div class="flex">
                                    <div class="action-buttons">
                                        @include('frontend.common.buttons.close')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    