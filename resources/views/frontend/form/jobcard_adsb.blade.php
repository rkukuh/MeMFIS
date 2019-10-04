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
      margin-top: -112px;
    }

    #content2{
      margin-top:-36px;
    }

    #content3, #content4{
      margin-top:5px;
    }

    #content3 .table1{
      padding-left: 7px;
    }

    #content5{
      margin-top:9px;
    }

    #content4 .table-mt{
      border: 2px solid #d4d7db;
    }

    #content4 .table-mt tr td{
      border-left:  1px solid  #d4d7db;
      border-right:  1px solid  #d4d7db;
      border-top:  1px solid  #d4d7db;
      border-bottom:  1px solid  #d4d7db;
    }

    #content5 .head{
      width: 100%;
      background: #f7dd16;
      border-radius: 9px 9px 0px 0px;
      font-weight: bold;
      font-size: 14px;
    }

    #content5 .body{
      width: 100%;
      border-left:  4px solid  #d4d7db;
      border-right:  4px solid  #d4d7db;
      border-bottom:  4px solid  #d4d7db;
    }

    #content5 .body table tr td{
      border-left: 1px solid  #d4d7db;
    }

    .page_break { page-break-before: always; }
    /* <div class="page_break"></div> */

  </style>
</head>
<body>

  <header id="header">
    <img src="./img/form/printoutjobcardad-sb/HeaderJobCardAD-SB.png" alt=""width="100%">
  </header>
  <footer style="margin-top:14px;">
    <img src="./img/form/printoutjobcardad-sb/FooterJobCardAD-SB.png" width="100%" alt="" >
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
                        <td width="20%">Project No</td>
                        <td width="1%">:</td>
                        <td width="29%">
                          @if($jobCard->quotation->quotationable->code)
                          {{$jobCard->quotation->quotationable->code}}
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
                        <td width="20%"></td>
                        <td width="1%"></td>
                        <td width="29%"></td>
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
            {!!DNS2D::getBarcodeHTML($jobCard->number, 'QRCODE',4.5,4.5)!!}
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
            @if($jobCard->jobcardable->eo_header->title)
            {{$jobCard->jobcardable->eo_header->title}}
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
            @if($jobCard->jobcardable->description)
            {{$jobCard->jobcardable->description}}
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
            @if($jobCard->jobcardable->eo_header->reference)
            {{$jobCard->jobcardable->reference}}
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
          <td width="25%">Skill</td>
          <td width="25%" align="center">Work Area</td>
          <td width="25%" align="center">Est. Mhrs</td>
          <td width="25%" align="right">Actual Mhrs</td>
        </tr>
      </table>
      <div style="width:100%;min-height:20px;border: 3px solid #d4d7db;border-radius: 10px;">
        <table width="100%" cellpadding="10">
          <tr>
            <td width="25%" valign="top">
              @if(sizeof($jobCard->jobcardable->skills) == 3)
                  ERI
              @elseif(sizeof($jobCard->jobcardable->skills) == 1)
                  {{ $jobCard->jobcardable->skills->last()->name }}
              @else
                  -
              @endif
            </td>
            <td width="25%" align="center" valign="top">
              @if($jobCard->jobcardable->work_area != null)
              {{$jobCard->jobcardable->workarea->name}}
            @else
              -
            @endif
            </td>
            <td width="25%" align="center" valign="top">
              @if($jobCard->jobcardable->estimation_manhour)
                {{$jobCard->jobcardable->estimation_manhour}}
              @else
                -
              @endif
            </td>
            <td width="25%" align="right" valign="top">
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
        <tr style="background: #d4d7db;">
          <th width="50%" align="center">Material(s)</th>
          <th width="50%" align="center">Tool(s)</th>
        </tr>
        <tr>
          <td height="15%" valign="top">
           <span>
              @foreach($jobCard->jobcardable->materials as $material)
                  {{$material->name}} - {{$material->pivot->quantity}} {{$material->pivot->unit_id}} <br>
              @endforeach
           </span>
          </td>
          <td height="15%" valign="top">
            <span>
              @foreach($jobCard->jobcardable->tools as $tools)
                  {{$tools->name}} - {{$tools->pivot->quantity}} {{$tools->pivot->unit_id}} <br>
              @endforeach
            </span>
          </td>
        </tr>
        <tr>
          <td colspan="2" height="35" valign="top">
              Accomplishment Record : <br><br>
              <span>
                  {{ $jobCard->progresses->last()->reason_text }}
              </span>
          </td>
        </tr>
        <tr style="position: relative;">
          <td width="50%" height="35">
            <div style="position: absolute;">
              Discrepancy Found :
            </div>
            <center>
              <div style="margin-left:100px;margin-top:12px;">
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
            </center>
          </td>
          <td width="50%" height="35" valign="center">
              Transfer to Defect Card No : <br><br>
              <span>
              @if(sizeof($jobCard->defectcards()->has('approvals','>',1)->pluck('code')) > 0){{ join(',',$jobCard->defectcards()->has('approvals','>',1)->pluck('code')->toArray()) }} @endif
              </span>
          </td>
        </tr>
      </table>
      <table width="100%" style="margin-top: 12px;">
        <tr>
          <td width="4%" valign="top">Helper </td>
          <td width="1%" valign="top">:</td>
          <td width="28%" valign="top">
            {{ $helpers }}
          </td>
          <td width="33%" valign="top" align="center">Status :
          {{ $jobCard->status }}
          </td>
          <td width="34%" valign="top" align="right">Date Close :
              {{ $dateClosed }}
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="content5">
    <div class="container">
      <div class="head">
        <table width="100%" cellpadding="10">
          <tr>
            <td width="33%" align="center">Accomplished By</td>
            <td width="33%" align="center">Inspected By</td>
            <td width="34%" align="center">Rii By</td>
          </tr>
        </table>
      </div>
      <div class="body">
        <table width="100%">
          <tr>
            <td width="33%" height="53%" align="center" valign="bottom">
              <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
              <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date & Time</span></div>
            </td>
            <td width="33%" height="53%" align="center" valign="bottom">
              <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
              <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date & Time</span></div>
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
      <table width="100%" style="margin-top: 12px;">
        <tr>
          <td width="10%">Prepared By</td>
          <td width="1%">:</td>
          <td width="90%">{{ $prepared_by }};{{ $prepared_at }} </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>
