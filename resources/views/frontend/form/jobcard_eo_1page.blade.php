<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
        }

        html,
        body {
            padding: 0;
            margin: 0;
            font-size: 12px;
        }

        ul li {
            display: inline-block;
        }

        table {
            border-collapse: collapse;
        }

        .container {
            width: 100%;
            margin: 0 36px;
        }

        #header {
            margin-top: 10px;
        }

        #content {
            margin-top: 158px;
        }

        #content .jobcard-info fieldset legend {
            font-size: 20px;
            font-weight: bold;
            color: cornflowerblue;
        }

        #content .jobcard-info .jobcard-info-detail table tr td {
            vertical-align: top;
        }

        #content .jobcard-info .jobcard-info-detail {
            margin-top: 12px;
        }

        #content .barcode {
            margin-left: 16px;
        }

        #content2 {
            margin-top: -35px;
        }

        #content3 {
            margin-top: 7px;
        }

        #content3 .table_content tr td {
            border-left: 1px solid #d4d7db;
            border-right: 1px solid #d4d7db;
            border-top: 1px solid #d4d7db;
            border-bottom: 1px solid #d4d7db;
        }

        #content3 .body {
            width: 100%;
            border-left: 2px solid #d4d7db;
            border-right: 2px solid #d4d7db;
            border-bottom: 2px solid #d4d7db;
        }

        #content3 .body tr td {
            border-left: 2px solid #d4d7db;
            border-right: 2px solid #d4d7db;
        }

        #content4 .head {
            width: 100%;
            height: 40px;
            background: #f7dd16;
            border-radius: 9px 9px 0px 0px;
            font-weight: bold;
            font-size: 14px;
        }

        #content4 .body {
            width: 100%;
            border-left: 4px solid #d4d7db;
            border-right: 4px solid #d4d7db;
            border-bottom: 4px solid #d4d7db;
        }

        #content4 .body table tr td {
            border-left: 1px solid #d4d7db;
        }
    </style>
</head>

<body>
    <header id="header">
        <img src="./img/form/printoutjobcardeo-new/HeaderJobCardEO.png" alt="" width="100%">
    </header>
    <footer style="margin-top:14px;">
        <div class="container">
            <table width="100%">
                <tr>
                    <td valign="top" width="36%">Print By : <span>{{ Auth::user()->name }}:{{ $now }}</span></td>
                    <td valign="top" width="25%">Status : <span>@if($jobCard->status) {{ $jobCard->status }} @else - @endif</span></td>
                    <td valign="top" width="39%">Date Close : <span>{{ $dateClosed }}</span></td>
                </tr>
            </table>
        </div>
        <img src="./img/form/printoutjobcardeo-new/FooterJobCardEO.png" width="100%" alt="">
    </footer>

    <div id="content">
        <ul>
            <li>
                <div class="jobcard-info">
                    <fieldset>
                        <legend>JC No : {{ $jobCard->number }}</legend>
                        <div class="jobcard-info-detail">
                            <table width="80%" cellpadding="3">
                                <tr>
                                    <td width="20%">Issued Date</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobCard->created_at)
                                        {{ date('d-M-Y', strtotime($jobCard->created_at)) }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td width="20%">AC/Type</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobCard->quotation->quotationable->aircraft->name)
                                        {{$jobCard->quotation->quotationable->aircraft->name}}
                                        @else
                                        -
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td width="20%">EO Task No</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobCard->jobcardable->eo_header->number)
                                        {{$jobCard->jobcardable->eo_header->number}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td width="20%">A/C Reg</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobCard->quotation->quotationable->aircraft_register)
                                        {{$jobCard->quotation->quotationable->aircraft_register}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Project No</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobCard->quotation->quotationable->code)
                                        {{$jobCard->quotation->quotationable->code}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td width="20%">A/C S/N</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobCard->quotation->quotationable->aircraft_sn)
                                        {{$jobCard->quotation->quotationable->aircraft_sn}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </li>
            <li>
                <div class="barcode">
                    <h4 style="margin-left:12px;color:cornflowerblue;">EO Task No.</h4>
                    {!!DNS2D::getBarcodeHTML($jobCard->jobcardable->eo_header->number, 'QRCODE',4.5,4.5)!!}
                </div>
            </li>
        </ul>
    </div>

    <div id="content2">
        <div class="container">
            <table width="90%" cellpadding="4">
                <tr>
                    <td width="20%" valign="top">Title</td>
                    <td width="1%" valign="top">:</td>
                    <td width="79%" valign="top">Equipment/Furnishings - Flight/Passenger Compartment -
                        Observer/Attendant Seat - Change Attachment Of Shoulder Restraint System</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <div style="position:relative;">
                <table width="85%" cellpadding="4" class="table_content">
                    <tr style="background:#d4d7db;">
                        <td valign="top" align="center" width="25%"><b>Skill</b></td>
                        <td valign="top" align="center" width="35%"><b>Taskcard Type</b></td>
                        <td valign="top" align="center" width="20%"><b>Est. Mhrs</b></td>
                        <td valign="top" align="center" width="20%"><b>Actual Mhrs</b></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center">Cabin Maintenance</td>
                        <td valign="top" align="center">@if(isset($jobCard->jobcardable->type)) {{ $jobCard->jobcardable->type->name}} @else - @endif</td>
                        <td valign="top" align="center">0.25</td>
                        <td valign="top" align="center">{{ $jobCard->actual_manhour }}</td>
                    </tr>
                </table>
                <table width="85%" cellpadding="4" class="table_content">
                    <tr style="background:#d4d7db;">
                        <td valign="top" align="center" width="50%"><b>Instruction(s)</b></td>
                        <td valign="top" align="center" width="50%"><b>References</b></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" height="5%">{{ $taskcard->description }}</td>
                        <td valign="top" align="center" height="5%">{{ $taskcard->eo_header->reference }}</td>
                    </tr>
                </table>
                <table width="100%" cellpadding="4">
                    <tr style="background:#d4d7db;">
                        <td valign="top" align="center" width="20%"><b>Category</b></td>
                        <td valign="top" align="center" width="20%"><b>Schedule Priority</b></td>
                        <td valign="top" align="center" width="20%"><b>Reccurence</b></td>
                        <td valign="top" align="center" width="20%"><b>Manual Affected</b></td>
                        <td valign="top" align="center" width="20%"><b>Weight & Balance</b></td>
                    </tr>
                </table>
                <div class="body" style="min-height:120px">
                    <table width="100%" cellpadding="2">
                        <tr>
                            <td valign="top" rowspan="2" width="20%" style="border-left: none;">
                                {{ $jobCard->jobcardable->eo_header->category->name }}
                            </td>
                            <td valign="top" width="20%">
                                {{ $eo_additionals->scheduled_priority_text }} {{ $eo_additionals->scheduled_priority_type }}
                            </td>
                            <td valign="top" width="20%">
                                {{ $eo_additionals->recurrence_text }} {{ $eo_additionals->recurrence_type }}
                            </td>
                            <td valign="top" width="20%">
                                {{ $eo_additionals->manual_affected }}
                            </td>
                            <td valign="top" width="20%" style="border-right: none;">Weight Change</td>
                        </tr>
                        <tr>
                            <td valign="top" rowspan="2" width="20%">
                               
                            </td>
                            <td valign="top" width="20%">
                                
                            </td>
                            <td valign="top" width="20%">
                                
                            </td>
                            <td valign="top" width="20%" style="border-right: none;">@if($eo_additionals->weight_change){{ $eo_additionals->weight_change }}@else - @endif</td>
                        </tr>
                        <tr>
                            <td valign="top" rowspan="2" width="20%">
                            </td>
                            <td valign="top" width="20%" >
                            </td>
                            <td valign="top" width="20%">
                            </td>
                            <td valign="top" width="20%" style="border-right: none;">Center Of Gravity Change</td>
                        </tr>
                        <tr>
                            <td valign="top" width="20%">
                            </td>
                            <td valign="top" width="20%" style="border-bottom: 1px solid  #d4d7db;">
                            </td>
                            <td valign="top" width="20%">
                            </td>
                            <td valign="top" width="20%" style="border-right: none;">@if($eo_additionals->center_of_gravity){{ $eo_additionals->center_of_gravity }}@else - @endif</td>
                        </tr>
                    </table>
                </div>
                <table width="100%" cellpadding="4" class="table_content">
                    <tr style="background:#d4d7db;">
                        <td valign="top" align="center" width="50%"><b>Material Required</b></td>
                        <td valign="top" align="center" width="50%"><b>Tool Required / Special Tooling</b></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center">
                            @if(sizeof($jobCard->jobcardable->materials) > 0)
                                @foreach($jobCard->jobcardable->materials as $material)
                                {{$material->code}} | {{$material->name}} | {{$material->pivot->quantity}} | {{App\Models\Unit::find($material->pivot->unit_id)->name}}
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td valign="top" align="center">
                            @if(sizeof($jobCard->jobcardable->tools) > 0)
                                @foreach($jobCard->jobcardable->tools as $tool)
                                {{$tool->code}} | {{$tool->name}} | {{$tool->pivot->quantity}} | {{App\Models\Unit::find($tool->pivot->unit_id)->name}}
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                </table>
                <table width="100%" cellpadding="4" class="table_content">
                    <tr style="background:#d4d7db;">
                        <td valign="top" align="center" width="50%" colspan="3"><b>Engineering Approval</b></td>
                    </tr>
                    <tr>
                        <td valign="top" rowspan="6" width="6%">Prepared By</td>
                        <td valign="top" rowspan="6" width="6%">Checked By</td>
                        <td valign="top" rowspan="6" width="6%">Approve By</td>
                    </tr>
                </table>
                <table width="100%" cellpadding="4" class="table_content">
                    <tr style="background:#d4d7db;">
                        <td valign="top" align="center" width="50%" colspan="6"><b>Accomplishment Approval</b></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" width="3%" style="border-bottom:none;"><b>TSN</b></td>
                        <td valign="top" align="center" width="3%" style="border-bottom:none;"><b>CSN</b></td>
                        <td valign="top" align="center" width="72%" colspan="3" style="border-bottom:none;"><b>ENTERED
                                IN</b></td>
                        <td valign="top" align="center" width="22%" style="border-bottom:none;"><b>STATION</b></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" width="3%">@if($eo_additionals->TSN) {{ $eo_additionals->TSN }} @else - @endif</td>
                        <td valign="top" align="center" width="3%">@if($eo_additionals->CSN) {{ $eo_additionals->CSN }} @else - @endif</td>
                        <td valign="top" align="center" width="24%" style="border-top:none;border-right:none;">
                            <div class="checkbox">
                                <img @if(in_array('ac-logbook', $jobCard->logbooks()->pluck('code')->toArray() ) ) src="./img/check.png" @else src="./img/check-box-empty.png" @endif alt="" width="10"> <span style="margin-left:5px;">A/C Log Book</span>
                            </div>
                        </td>
                        <td valign="top" align="center" width="24%" style="border-top:none;border-left:none;border-right:none;">
                            <div class="checkbox">
                                <img @if(in_array('ac-logbook', $jobCard->logbooks()->pluck('code')->toArray() ) ) src="./img/check.png" @else src="./img/check-box-empty.png" @endif alt="" width="10"> <span style="margin-left:5px;">ENG. Log Book</span>
                            </div>
                        </td>
                        <td valign="top" align="center" width="24%" style="border-top:none;border-left:none;">
                            <div class="checkbox">
                                <img @if(in_array('ac-logbook', $jobCard->logbooks()->pluck('code')->toArray() ) ) src="./img/check.png" @else src="./img/check-box-empty.png" @endif alt="" width="10"> <span style="margin-left:5px;">APU Log Book</span>
                            </div>
                        </td>
                        <td valign="top" align="center" width="22%" style="border-top:none;color:red;">@if($jobCard->station) {{ $jobCard->station }} @else - @endif</td>
                    </tr>
                </table>
                <table width="100%" cellpadding="4" class="table_content">
                    <tr>
                        <td valign="top" width="50%">Discrepancy Found :
                            <span>
                                <div style="margin-left:100px;margin-top:-20px;">
                                    <ul>
                                        <li>
                                            <img @if(sizeof($jobCard->defectcards) <> 0)
                                                src="./img/check.png"
                                                @else
                                                src="./img/check-box-empty.png"
                                                @endif
                                                alt="" width="10">
                                                <span style="margin-left:6px;font-weight: bold;font-size:13px">YES</span>
                                        </li>
                                        <li style="margin-left:12px;">
                                            <img @if(sizeof($jobCard->defectcards) == 0)
                                            src="./img/check.png"
                                            @else
                                            src="./img/check-box-empty.png"
                                            @endif
                                            alt="" width="11">
                                            <span style="margin-left:6px;font-weight: bold;font-size:13px">NO</span>
                                        </li>
                                    </ul>
                                </div>
                            </span>
                        </td>
                        <td valign="top" width="50%">Transfer To Defect Card No : <span>@if(sizeof($jobCard->defectcards()->has('approvals','>',1)->pluck('code')) > 0){{ join(',',$jobCard->defectcards()->has('approvals','>',1)->pluck('code')->toArray()) }} @else - @endif</span></td>
                    </tr>
                </table>
                <div style="position:absolute; left:659px; top:-20px;">
                    <h4 style="margin-left:6px;color:cornflowerblue;">Jobcard No.</h4>
                    {!!DNS2D::getBarcodeHTML($jobCard->number, 'QRCODE',3.4,3.4)!!}
                </div>
            </div>
        </div>
    </div>

    <div id="content4" style="margin-top:4px;">
        <div class="container">
            <div class="head">
                <table width="100%" cellpadding="10">
                    <tr>
                        <td width="33%" align="center">Accomplished By</td>
                        <td width="33%" align="center">Inspected By</td>
                        <td width="34%" align="center">RII By</td>
                    </tr>
                </table>
            </div>
            <div class="body">
                <table width="100%">
                    <tr>
                        <td width="33%" height="50" align="center" valign="bottom">
                            <div style="width:100%;height:20px;text-align:center;padding-left:5px;">{{ $accomplished_by }} : {{ $accomplished_at }}</div>
                        </td>
                        <td width="33%" height="50" align="center" valign="bottom">
                            <div style="width:100%;height:20px;text-align:center;padding-left:5px;">{{ $inspected_by }} : {{ $inspected_at }}</div>
                        </td>
                        <td width="34%" height="100" align="center" valign="bottom"
                            @if($rii_status==0) style="background:grey" @endif>
                            @if($rii_status==1)
                            <div style="width:100%;height:20px;text-align:center">{{$rii_by}}</div>
                            <div style="width:100%;height:20px;text-align:left;padding-left:5px;">
                                Date : <span>{{$rii_at}}</span></div>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>