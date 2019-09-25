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

    #content2 table,
    #content2-repeat table{
        border:1px solid  #d4d7db;
    }

    #content2 table tr td,
    #content2-repeat table tr td{
        border:1px solid  #d4d7db;
    }

    #content3, #content4, #content5,
    #content2-repeat,
    #content3-repeat,
    #content4-repeat{
        margin-top:4px;
    }

    #content3 table tr td,
    #content3-repeate table tr td{
        height:6%;
    }

    #content4 table,
    #content4-repeat table{
        border:1px solid  #d4d7db;
    }

    #content4 table tr td,
    #content4-repeat table tr td{
        border:1px solid  #d4d7db;
    }

    #content4-repeat{
        margin-bottom: 4px;
    }

    #content5-repeat{
        margin-top:12px;
    }

    #content5 .head,
    #content5-repeat .head{
      width: 100%;
      height: 30px;
      background: #f7dd16;
      border-radius: 9px 9px 0px 0px;
      font-weight: bold;
      font-size: 12px;
    }

    #content5 .body,
    #content5-repeat .body{
      width: 100%;
      border-left:  4px solid  #d4d7db;
      border-right:  4px solid  #d4d7db;
      border-bottom:  4px solid  #d4d7db;
      font-size: 10px;
    }

    #content5 .body table tr td,
    #content5-repeat .body table tr td{
      border-left: 1px solid  #d4d7db;
    }

    .page_break { page-break-before: always; }
    /* <div class="page_break"></div> */

  </style>
</head>

<body>

    <header id="header">
        <img src="./img/form/printoutjobcardcri/HeaderJobcardCRI.png" alt="" width="100%">
    </header>
    <footer style="margin-top:14px;">
        <img src="./img/form/printoutjobcardcri/FooterJobcardCRI.png" width="100%" alt="">
    </footer>

    <div id="content">
        <ul>
            <li>
                <div class="jobcard-info">
                    <fieldset>
                        <legend>CRI No : 123456</legend>
                        <div class="jobcard-info-detail">
                            <table width="80%" cellpadding="3">
                                <tr>
                                    <td width="20%" valign="top">Issued Date</td>
                                    <td width="1%" valign="top">:</td>
                                    <td width="29%" valign="top">{{$htcrr->created_at}}</td>
                                    <td width="20%" valign="top">AC/Type</td>
                                    <td width="1%" valign="top">:</td>
                                    <td width="29%" valign="top">{{$htcrr->project->aircraft->name}}</td>
                                </tr>
                                <tr>
                                    <td width="20%" valign="top">Project No</td>
                                    <td width="1%" valign="top">:</td>
                                    <td width="29%" valign="top">{{$htcrr->project->code}}</td>
                                    <td width="20%" valign="top">A/C Reg</td>
                                    <td width="1%" valign="top">:</td>
                                    <td width="29%" valign="top">{{$htcrr->project->aircraft_register}}</td>
                                </tr>
                                <tr>
                                    <td width="20%" valign="top">Project Title</td>
                                    <td width="1%" valign="top">:</td>
                                    <td width="29%" valign="top">{{$htcrr->project->title}}</td>
                                    <td width="20%" valign="top">A/C SN</td>
                                    <td width="1%" valign="top">:</td>
                                    <td width="29%" valign="top">{{$htcrr->project->aircraft_sn}}</td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </li>
            <li>
                <div class="barcode">
                    {!!DNS2D::getBarcodeHTML($htcrr->code, 'QRCODE',4.5,4.5)!!}
                </div>
            </li>
        </ul>
    </div>

    <div id="content2">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr style="background:#d4d7db">
                    <th align="center" width="22%">Item Description</th>
                    <th align="center" width="15%">P/N</th>
                    <th align="center" width="15%">Position</th>
                    <th align="center" width="16%">S/N Off</th>
                    <th align="center" width="16%">Est. Mhrs</th>
                    <th align="center" width="16%">Actual Mhrs</th>
                </tr>
                <tr>
                    <td valign="top">{{$htcrr->item->name}}</td>
                    <td valign="top" align="center">{{$htcrr->item->code}}</td>
                    <td valign="top" align="center">{{$htcrr->position}}</td>
                    <td valign="top" align="center">{{$htcrr->childs->get(0)->serial_number}}</td>
                    <td valign="top" align="center">{{$htcrr->childs->get(0)->estimation_manhour}}</td>
                    <td valign="top" align="center">-</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr>
                    <td width="18%" valign="top">Remark</td>
                    <td width="1%" valign="top">:</td>
                    <td width="61%" valign="top">{{$htcrr->childs->get(0)->description}}</td>
                    <td width="20%" rowspan="2" valign="top" align="center">
                        <h5 style="margin-top:-2px;">Removal JC No.</h5>
                        <p style="margin-top:-13px;">{{$htcrr->childs->get(0)->code}}</p>
                        <div style="margin-left:33px;margin-bottom:-12px">
                            {!!DNS2D::getBarcodeHTML($htcrr->childs->get(0)->code, 'QRCODE',3.4,3.4)!!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" valign="top">Accomplishment Notes</td>
                    <td width="1%" valign="top">:</td>
                    <td width="61%" valign="top">Lorem</td>
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
                    <td width="33%" height="100px" align="center" valign="bottom">
                        <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
                        <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date & Time</span></div>
                    </td>
                    <td width="33%" height="100px" align="center" valign="bottom">
                        <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
                        <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date & Time</span></div>
                    </td>
                    <td width="34%" height="100px" align="center" valign="bottom">
                        <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
                        <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date & Time</span></div>
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="content2-repeat">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr style="background:#d4d7db">
                    <th align="center">Item Description</th>
                    <th align="center">P/N</th>
                    <th align="center">Position</th>
                    <th align="center">S/N Off</th>
                    <th align="center">Est. Mhrs</th>
                    <th align="center">Actual Mhrs</th>
                </tr>
                <tr>
                    <td valign="top">{{$htcrr->item->name}}</td>
                    <td valign="top" align="center">{{$htcrr->item->code}}</td>
                    <td valign="top" align="center">{{$htcrr->position}}</td>
                    <td valign="top" align="center">{{$htcrr->childs->get(1)->serial_number}}</td>
                    <td valign="top" align="center">{{$htcrr->childs->get(1)->estimation_manhour}}</td>
                    <td valign="top" align="center">-</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content3-repeat">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr>
                    <td width="18%" valign="top">Remark</td>
                    <td width="1%" valign="top">:</td>
                    <td width="61%" valign="top">{{$htcrr->childs->get(1)->description}}</td>
                    <td width="20%" rowspan="2" valign="top" align="center">
                        <h5 style="margin-top:-2px;">Removal JC No.</h5>
                        <p style="margin-top:-13px;">{{$htcrr->childs->get(1)->code}}</p>
                        <div style="margin-left:33px;margin-bottom:-12px">
                            {!!DNS2D::getBarcodeHTML($htcrr->childs->get(1)->code, 'QRCODE',3.4,3.4)!!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" valign="top">Accomplishment Notes</td>
                    <td width="1%" valign="top">:</td>
                    <td width="61%" valign="top">Lorem</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content5-repeat">
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
                        <td width="33%" height="100px" align="center" valign="bottom">
                            <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
                            <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date &
                                    Time</span></div>
                        </td>
                        <td width="33%" height="100px" align="center" valign="bottom">
                            <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
                            <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date &
                                    Time</span></div>
                        </td>
                        <td width="34%" height="100px" align="center" valign="bottom">
                            <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
                            <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date &
                                    Time</span></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="content4-repeat">
        <div class="container">
            <table width="100%" cellpadding="2">
                    <tr style="background:#d4d7db">
                        <td align="center" width="50%">Material(s)</td>
                        <td align="center" width="50%">Tool(s)</td>
                    </tr>
                    <tr>
                        <td valign="top" height="23"></td>
                        <td valign="top" height="23"></td>
                    </tr>
            </table>
        </div>
    </div>


</body>

</html>
