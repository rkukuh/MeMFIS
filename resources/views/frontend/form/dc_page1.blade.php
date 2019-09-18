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
    html,body{
      padding: 0;
      margin: 0;
      font-size: 12px;
    }

    ul li{
      display: inline-block;
    }

    table{
      border-collapse: collapse;
    }

    .container{
      width: 100%;
      margin: 0 36px;
    }

    #header{
      margin-top:10px;
    }

    #content{
      margin-top:168px;
    }

    #content .jobcard-info fieldset legend{
      font-size: 20px;
      font-weight: bold;
      color: cornflowerblue;
    }

    #content .jobcard-info .jobcard-info-detail table tr td{
      vertical-align: top;
    }

    #content .jobcard-info .jobcard-info-detail{
      margin-top: 12px;
    }

    #content .barcode{
      margin-left:16px;
      margin-top: -92px;
    }

    #content2{
        margin-top:-28px;
    }

    #content2 table{
        border:1px solid  #d4d7db;
    }

    #content2 table tr td{
        border:1px solid  #d4d7db;
    }

    #content3{
        margin-top:4px;
    }

    #content3 table tr td{
        height:6%;
    }

    #content5{
        margin-top:4px;
    }

    .page_break { page-break-before: always; }
    /* <div class="page_break"></div> */

  </style>
</head>
<body>

    <header id="header">
        <img src="./img/form/printoutdefect-card/HeaderDefectCard1.png" alt=""width="100%">
    </header>
    <footer style="margin-top:14px;">
        <img src="./img/form/printoutdefect-card/FooterDefectCard.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <ul>
            <li>
                <div class="jobcard-info">
                    <fieldset>
                        <legend>DC No : DC-022877</legend>
                        <div class="jobcard-info-detail">
                        <table width="80%" cellpadding="3">
                            <tr>
                                <td width="20%">Issued Date</td>
                                <td width="1%">:</td>
                                <td width="29%">{{$defectcard->created_at}}</td>
                                <td width="20%">Project No</td>
                                <td width="1%">:</td>
                                <td width="29%">{{$defectcard->jobcard->quotation->quotationable->code}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Ref. JC No</td>
                                <td width="1%">:</td>
                                <td width="29%">{{$defectcard->jobcard->number}}</td>
                                <td width="20%">A/C Type</td>
                                <td width="1%">:</td>
                                <td width="29%">{{$defectcard->jobcard->quotation->quotationable->aircraft->name}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Taskcard No.</td>
                                <td width="1%">:</td>
                                <td width="29%">
                                        @if($defectcard->jobcard->jobcardable_type == "App\Models\TaskCard")
                                            {{$defectcard->jobcard->jobcardable->number}}
                                        @elseif($defectcard->jobcard->jobcardable_type == "App\Models\EOInstruction")
                                            {{$defectcard->jobcard->jobcardable->eo_header->number}}
                                        @endif   
                                </td>
                                <td width="20%">A/C Reg</td>
                                <td width="1%">:</td>
                                <td width="29%">{{$defectcard->jobcard->quotation->quotationable->aircraft_register}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Company Task</td>
                                <td width="1%">:</td>
                                <td width="29%">Generate</td>
                                <td width="20%">A/C S/N</td>
                                <td width="1%">:</td>
                                <td width="29%">{{$defectcard->jobcard->quotation->quotationable->aircraft_sn}}</td>
                            </tr>
                        </table>
                        </div>
                    </fieldset>
                </div>
            </li>
            <li>
                <div class="barcode">
                    {!!DNS2D::getBarcodeHTML($defectcard->code, 'QRCODE',4.5,4.5)!!}
                </div>
            </li>
        </ul>
    </div>

    <div id="content2">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr style="background:#d4d7db">
                    <th align="center">Skill</th>
                    <th align="center">ATA</th>
                    <th align="center">Area/Zone</th>
                    <th align="center">Seq. No</th>
                    <th align="center">Eng. Qty</th>
                    <th align="center">Mech. Qty</th>
                    <th align="center">Est. Mhrs</th>
                </tr>
                <tr>
                    <td valign="top" align="center">{{$defectcard->skill}}</td>
                    <td valign="top" align="center">{{$defectcard->ata}}</td>
                    <td valign="top" align="center">-</td>
                    <td valign="top" align="center">{{$defectcard->sequence}}</td>
                    <td valign="top" align="center">{{$defectcard->engineer_quantity}}</td>
                    <td valign="top" align="center">{{$defectcard->helper_quantity}}</td>
                    <td valign="top" align="center">{{$defectcard->estimation_manhour}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <table width="100%">
                <tr>
                    <td width="18%" valign="top">Complaint</td>
                    <td width="1%" valign="top">:</td>
                    <td width="81%" valign="top">{{$defectcard->complaint}}</td>
                </tr>
                <tr>
                    <td width="18%" valign="top">Remark</td>
                    <td width="1%" valign="top">:</td>
                    <td width="81%" valign="top">Lorem</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content4">
        <div class="container">
            <table width="100%">
                <tr>
                    <td width="18%">Propose Correctior</td>
                    <td width="82%">:</td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="25%">
                        @if(in_array('remove',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">1. REMOVE</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">1. REMOVE</span>
                        @endif
                    </td>
                    <td width="25%">
                        @if(in_array('repair',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">4. REPAIR</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">4. REPAIR</span>
                        @endif
                    </td>
                    <td width="25%">
                        @if(in_array('test',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">7. TEST</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">7. TEST</span>
                        @endif
                    </td>
                    <td width="25%" rowspan="3" valign="top" align="center">
                        <p>RII Req.</p>
                        <ul style="margin-left:-10px;">
                            @if($defectcard->is_rii == 1)
                            <li >
                                
                                <img src="./img/check.png" alt="" width="9"> <span style="margin-left:6px;font-weight: bold;">YES</span>
                            </li>
                            <li style="margin-left:12px;">
                                
                                <img src="./img/check-box-empty.png" alt="" width="8"> <span style="margin-left:6px;font-weight: bold;">NO</span>
                            </li>
                            @else
                            <li>
                                
                                <img src="./img/check-box-empty.png" alt="" width="9"> <span style="margin-left:6px;font-weight: bold;">YES</span>
                            </li>
                            <li style="margin-left:12px;">
                                
                                <img src="./img/check.png" alt="" width="9"> <span style="margin-left:6px;font-weight: bold;">NO</span>
                            </li>    
                            @endif
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        @if(in_array('install',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">2. INSTALL</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">2. INSTALL</span>
                        @endif
                    </td>
                    <td width="25%">
                        @if(in_array('replace',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">5. REPLACE</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">5. REPLACE</span>
                        @endif
                    </td>
                    <td width="25%">
                        @if(in_array('shop-visit',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">8. SHOP VISIT</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">8. SHOP VISIT</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        @if(in_array('rectification',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">3. RECTIFICATION</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">3. RECTIFICATION</span>
                        @endif
                    </td>
                    <td width="25%">
                        @if(in_array('ndt',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">6. NDT</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">6. NDT</span>
                        @endif
                    </td>
                    <td width="25%">
                        @if(in_array('other',$propose_corrections))
                            <img src="./img/check.png" width="8"> <span style="margin-left:6px;">9. Other ( {{$text}} )</span>
                        @else
                            <img src="./img/check-box-empty.png" width="8"> <span style="margin-left:6px;">9. Other</span>
                        @endif
                    </td>
                </tr>
            </table>
            <table style="border:1px solid  #d4d7db; margin-top:4px;" width="100%">
                <tr>
                    <td style="border:1px solid  #d4d7db;" width="50%" height="35" valign="top">
                       <span>Name/Sign : </span>  <span style="margin-left:20px;">Stamp :</span>
                    </td>
                    <td style="border:1px solid  #d4d7db;" width="50%" height="35">asd</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content5">
        <div class="container">
            <table width="100%" border="1">
                <tr style="background: #f7dd16;">
                    <td width="6%" align="center" rowspan="2">No</td>
                    <td width="40%" align="center" rowspan="2">Reference</td>
                    <td width="16%" align="center" rowspan="2">Date</td>
                    <td width="8%" align="center" rowspan="2">Actual Mhrs.</td>
                    <td width="15%" align="center">ENG</td>
                    <td width="15%" align="center">ENG</td>
                </tr>
                <tr style="background: #f7dd16;">
                    <td width="15%" align="center">(Name)</td>
                    <td width="15%" align="center">(Stamp + Sign)</td>
                </tr>
                <tr>
                    <td width="6%" align="center" valign="top">-</td>
                    <td width="40%" valign="top">-</td>
                    <td width="16%" align="center" valign="top">-</td>
                    <td width="8%" align="center" valign="top">-</td>
                    <td width="15%" align="center" valign="top">-</td>
                    <td width="15%" align="center" valign="top">-</td>
                </tr>
                <tr>
                    <td colspan="3">-</td>
                    <td>-</td>
                    <td colspan="2">-</td>
                </tr>
            </table>
        </div>
    </div>



</body>
</html>