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
            height: 1.5cm;
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
            margin-top: 168px;
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
            margin-top: -112px;
        }

        #content2 {
            margin-top: -30px;
        }

        #content3 {
            margin-top: 7px;
        }

        #content3 .table1 {
            padding-left: 7px;
        }

        #content4,
        #content5 {
            margin-top: 20px;
        }

        #content4 .table-mt {
            border: 2px solid #d4d7db;
        }

        #content4 .table-mt tr td {
            border-left: 1px solid #d4d7db;
            border-right: 1px solid #d4d7db;
            border-top: 1px solid #d4d7db;
            border-bottom: 1px solid #d4d7db;
        }

        #content5 .head {
            width: 100%;
            height: 40px;
            background: #f7dd16;
            border-radius: 9px 9px 0px 0px;
            font-weight: bold;
            font-size: 14px;
        }

        #content5 .body {
            width: 100%;
            border-left: 4px solid #d4d7db;
            border-right: 4px solid #d4d7db;
            border-bottom: 4px solid #d4d7db;
        }

        #content5 .body table tr td {
            border-left: 1px solid #d4d7db;
        }

        #content6 {
            margin-top: 150px;
        }

        #content6 .table-mt tr td {
            border-left: 1px solid #d4d7db;
            border-right: 1px solid #d4d7db;
            border-top: 1px solid #d4d7db;
            border-bottom: 1px solid #d4d7db;
        }

        #content7 {
            margin-top: 15px;
        }

        #content7 .table-mt tr td {
            border-left: 1px solid #d4d7db;
            border-right: 1px solid #d4d7db;
            border-top: 1px solid #d4d7db;
            border-bottom: 1px solid #d4d7db;
        }

        .page_break {
            page-break-before: always;
        }

        /* <div class="page_break"></div> */
    </style>
</head>

<body>

    <header id="header">
        <img src="./img/form/printoutjobcardsi/HeaderJobCardSI.png" alt="" width="100%">
    </header>
    <footer style="margin-top:14px;">
        <div class="container">
            <span style="margin-left:6px">Prepared By : {{$prepared_by}};{{ $prepared_at }}
                &nbsp;&nbsp;&nbsp;&nbsp; Printed By :{{$username}} ; {{ date('Y-m-d H:i:s') }}</span>
        </div>
        <img src="./img/form/printoutjobcardsi/FooterJobCardSI.png" width="100%" alt="">
    </footer>

    <div id="content">
        <ul>
            <li>
                <div class="jobcard-info">
                    <fieldset>
                        <legend>JC No : {{$jobcard->number}}</legend>
                        <div class="jobcard-info-detail">
                            <table width="80%" cellpadding="3">
                                <tr>
                                    <td width="20%">SI Task No</td>
                                    <td width="1%">:</td>
                                    <td width="29%">{{$jobcard->jobcardable->number}}</td>
                                    <td width="20%">AC/Type</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobcard->quotation->quotationable->aircraft->name)
                                        {{$jobcard->quotation->quotationable->aircraft->name}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Project No</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobcard->quotation->quotationable->code)
                                        {{$jobcard->quotation->quotationable->code}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td width="20%">A/C Reg</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobcard->quotation->quotationable->aircraft_register)
                                        {{$jobcard->quotation->quotationable->aircraft_register}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Issued Date</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobcard->created_at)
                                        {{ date('d-M-Y', strtotime($jobcard->created_at)) }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td width="20%">A/C S/N</td>
                                    <td width="1%">:</td>
                                    <td width="29%">
                                        @if($jobcard->quotation->quotationable->aircraft_sn)
                                        {{$jobcard->quotation->quotationable->aircraft_sn}}
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
                    {!!DNS2D::getBarcodeHTML($jobcard->number, 'QRCODE',4.5,4.5)!!}
                </div>
            </li>
        </ul>
    </div>

    <div id="content2">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr style="position: relative;">
                    <td width="18%">
                        <div style="position: absolute;">
                            Title
                        </div>
                    </td>
                    <td width="1%">
                        <div style="position: absolute;">
                            :
                        </div>
                    </td>
                    <td width="81%">
                        @if($jobcard->jobcardable->title)
                        {{$jobcard->jobcardable->title}}
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr style="position: relative;">
                    <td width="18%">
                        <div style="position: absolute;">
                            Description
                        </div>
                    </td>
                    <td width="1%">
                        <div style="position: absolute;">
                            :
                        </div>
                    </td>
                    <td width="81%">
                        @if($jobcard->jobcardable->description)
                        {{$jobcard->jobcardable->description}}
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr style="position: relative;">
                    <td width="18%">
                        <div style="position: absolute;">
                            Reference
                        </div>
                    </td>
                    <td width="1%">
                        <div style="position: absolute;">
                            :
                        </div>
                    </td>
                    <td width="81%">
                        @if($jobcard->jobcardable->reference)
                        {{$jobcard->jobcardable->reference}}
                        @else
                        -
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <table width="100%" class="table1">
                <tr>
                    <td width="17%">Skill</td>
                    <td width="47%" align="center">Work Area</td>
                    <td width="15%" align="center">Mhrs Estimation</td>
                    <td width="20%" align="right">Actual Mhrs</td>
                </tr>
            </table>
            <div style="width:100%;min-height:20px;border: 3px solid #d4d7db;border-radius: 10px;">
                <table width="100%" cellpadding="10">
                    <tr>
                        <td width="18%" valign="top">
                            @if(sizeof($jobcard->jobcardable->skills) == 3)
                            ERI
                            @elseif(sizeof($jobcard->jobcardable->skills) == 1)
                            {{$jobcard->jobcardable->skills[0]->name}}
                            @else
                            -
                            @endif
                        </td>
                        <td width="47%" align="center" valign="top">
                            @if($jobcard->jobcardable->work_area != null)
                            {{$jobcard->jobcardable->workarea->name}}
                            @else
                            -
                            @endif
                        </td>
                        <td width="15%" align="center" valign="top">
                            @if($jobcard->jobcardable->estimation_manhour)
                            {{$jobcard->jobcardable->estimation_manhour}}
                            @else
                            -
                            @endif
                        </td>
                        <td width="20%" align="right" valign="top">
                            {{$actual_manhours}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="content4">
        <div class="container">
            <table width="100%" cellpadding="8" class="table-mt">
                <tr>
                    <td colspan="2" height="55" valign="top">
                        Accomplishment Record : <br><br>
                        <span>
                            {{ $jobcard->progresses->last()->reason_text }}
                        </span>
                    </td>
                </tr>
                <tr style="position: relative;">
                    <td width="50%" height="35">
                        <div style="position: absolute;">
                            Discrepancy Found :
                        </div>
                        @if($lastStatus=="OPEN")
                        <center>
                            <div style="margin-left:100px;margin-top:12px;">
                                <ul>
                                    <li>
                                        <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:6px;font-weight: bold;font-size:13px">YES</span>
                                    </li>
                                    <li style="margin-left:12px;">
                                        <img src="./img/check-box-empty.png" alt="" width="11"> <span style="margin-left:6px;font-weight: bold;font-size:13px">NO</span>
                                    </li>
                                </ul>
                            </div>
                        </center>
                        @else
                        <center>
                            <div style="margin-left:100px;margin-top:12px;">
                                <ul>
                                    <li>
                                        <img @if(sizeof($jobcard->defectcards) <> 0)
                                            src="./img/check.png"
                                            @else
                                            src="./img/check-box-empty.png"
                                            @endif
                                            alt="" width="10">
                                            <span style="margin-left:6px;font-weight: bold;font-size:13px">YES</span>
                                    </li>
                                    <li style="margin-left:12px;">
                                        <img @if(sizeof($jobcard->defectcards) == 0)
                                        src="./img/check.png"
                                        @else
                                        src="./img/check-box-empty.png"
                                        @endif
                                        alt="" width="11">
                                        <span style="margin-left:6px;font-weight: bold;font-size:13px">NO</span>
                                    </li>
                                </ul>
                            </div>
                        </center>
                        @endif
                    </td>
                    <td width="50%" height="35" valign="center">
                        Transfer to Defect Card No : <br><br>
                        <span>
                            @if(sizeof($jobcard->defectcards()->has('approvals','>',1)->pluck('code')) > 0){{ join(',',$jobcard->defectcards()->has('approvals','>',1)->pluck('code')->toArray()) }} @endif
                        </span>
                    </td>
                </tr>
            </table>
            <table width="100%" style="margin-top: 12px;">
                <tr>
                    <td width="3%" valign="top">Helper </td>
                    <td width="1%" valign="top">:</td>
                    <td width="96%" valign="top">{{ $helpers }} </td>
                </tr>
            </table>
        </div>

        <div id="content5">
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
                            <td width="33%" height="100" align="center" valign="bottom">
                                <div style="width:100%;height:20px;text-align:center">{{$accomplished_by}}</div>
                                <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>{{$accomplished_at}}</span></div>
                            </td>
                            <td width="33%" height="100" align="center" valign="bottom">
                                <div style="width:100%;height:20px;text-align:center">{{$inspected_by}}</div>
                                <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>{{$inspected_at}}</span></div>
                            </td>
                            <td width="34%" height="100" align="center" valign="bottom" @if($rii_status==0) @endif>
                                @if($rii_status==1)
                                <div style="width:100%;height:20px;text-align:center">{{$rii_by}}</div>
                                <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>{{$rii_at}}</span></div>
                                @else
                                <div>
                                    <img src="./img/RII.png" alt="" width="220px" height="125px">
                                </div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="page_break">
            <div id="content6">
                <div class="container">
                    <table width="100%" cellpadding="8" border="1" class="table-mt">
                        <tr style="background: #d4d7db;">
                            <th colspan="5" align="center">Material(s)</th>
                        </tr>
                        <thead>
                            <tr style="background: #d4d7db;">
                                <th width="2%" align="center">No</th>
                                <th width="18%" align="center">Part Number</th>
                                <th width="50%" align="center">Item Description</th>
                                <th width="15%" align="center">Qty</th>
                                <th width="15%" align="center">Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($jobcard->jobcardable->materials->toArray()))
                            <tr>
                                <td colspan="5" align="center">empty</td>
                            </tr>
                            @endif
                            @php $i = 1; @endphp
                            @foreach($jobcard->jobcardable->materials as $material)
                            <tr>
                                <td align="center" valign="top" width="2%">{{$i++}}</td>
                                <td align="center" valign="top" width="18%">{{$material->code}}</td>
                                <td align="left" valign="top" width="50%">{{$material->name}}</td>
                                <td align="center" valign="top" width="15%">{{$material->pivot->quantity}}</td>
                                <td align="center" valign="top" width="15%">
                                    {{App\Models\Unit::find($material->pivot->unit_id)->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="content7">
                <div class="container">
                    <table width="100%" cellpadding="8" border="1" class="table-mt">
                        <tr style="background: #d4d7db;">
                            <th colspan="5" align="center">Tool(s)</th>
                        </tr>
                        <thead>
                            <tr style="background: #d4d7db;">
                                <th width="2%" align="center">No</th>
                                <th width="18%" align="center">Part Number</th>
                                <th width="50%" align="center">Item Description</th>
                                <th width="15%" align="center">Qty</th>
                                <th width="15%" align="center">Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($jobcard->jobcardable->tools->toArray()))
                            <tr>
                                <td colspan="5" align="center">empty</td>
                            </tr>
                            @endif
                            @php $i = 1; @endphp
                            @foreach($jobcard->jobcardable->tools as $tool)
                            <tr>
                                <td align="center" valign="top" width="2%">{{$i++}}</td>
                                <td align="center" valign="top" width="18%">{{$tool->code}}</td>
                                <td align="left" valign="top" width="50%">{{$tool->name}}</td>
                                <td align="center" valign="top" width="15%">{{$tool->pivot->quantity}}</td>
                                <td align="center" valign="top" width="15%">
                                    {{App\Models\Unit::find($tool->pivot->unit_id)->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>