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

    #content2 .container table td{
      vertical-align: top;
      text-align: left;
    }

    #content2 .container table{
      margin-left: 12px;
    
    }
    #content3{
      margin-top:5px;
      margin-bottom:5px;
    }

    #content3 table tr td{
      height: 25px;
    }
  </style>
</head>
<body>
  


  <header id="header">
    <img src="./img/form/printoutpreliminaryinspection/HeaderPreliminaryInspection.png" alt=""width="100%">
  </header>
  <footer style="margin-top:14px;">
    <div class="container">
      <span style="margin-left:6px">Prepared By : {{ $prepared_by }} &nbsp;&nbsp;&nbsp;&nbsp; Printed By : {{ Auth::user()->name }} </span>
    </div>
    <img src="./img/form/printoutpreliminaryinspection/FooterPreliminaryInspection.png" width="100%" alt="" >
  </footer>
  
  <div id="content">
    <ul>
      <li>
        <div class="jobcard-info">
          <fieldset>
                <legend>Job Card No : {{ $jobcard->number }}</legend>
                <div class="jobcard-info-detail">
                  <table width="80%" cellpadding="3">
                      <tr>
                        <td width="20%">Issued Date & Time</td>
                        <td width="1%">:</td>
                        <td width="29%">{{ $jobcard->created_at }}</td>
                        <td width="20%">AC/Type</td>
                        <td width="1%">:</td>
                        <td width="29%">{{ $jobcard->quotation->quotationable->aircraft->name }}</td>
                      </tr>
                      <tr>
                        <td width="20%">Project No</td>
                        <td width="1%">:</td>
                        <td width="29%">{{ $jobcard->quotation->quotationable->code }}</td>
                        <td width="20%">Est. Mhrs</td>
                        <td width="1%">:</td>
                        <td width="29%">{{ $taskcard->estimation_manhour }}</td>
                      </tr>
                      <tr>
                        <td width="20%"></td>
                        <td width="1%"></td>
                        <td width="29%"></td>
                        <td width="20%">Act. Mhrs</td>
                        <td width="1%">:</td>
                        <td width="29%">{{ $jobcard->actual_manhour }}</td>
                      </tr>
                  </table>
                </div>
            </fieldset>
        </div>
      </li>
      <li>
        <div class="barcode">
            {!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',4.5,4.5)!!}
        </div>
      </li>
    </ul>
  </div>

  <div id="content3">
    <div class="container">
      <table width="100%" border="1" cellpadding="5">
          <tr>
              <td width="5%">No.</td>
              <td width="15%" align="center">Sub Zone Code</td>
              <td width="12%" align="center">Insp. Code</td>
              <td width="45%" align="center">Nature of defect</td>
              <td width="20%" align="center">Issued Repair Card No. :</td>
          </tr>
          <!-- jumlah row discrepancy yang ditampilkan hanya hingga 15 per halaman -->
          @foreach($defectcard as $key => $data)
          <tr>
              <td width="5%" align="center" valign="top"></td>
              <td width="15%" align="left" valign="top"> </td>
              <td width="12%" align="center" valign="top"></td>
              <td width="45%" align="left" valign="top">{{ $data["complaint"] }}</td>
              <td width="20%" align="left" valign="top">{{ $data["code"] }}</td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>

  @if($last)
  <div class="container">
    <div style="height:147px;width:130px;position:relative;bottom:60px;margin-left:72%;">
      <div align="center">
          Inspection performed by:
      </div>
      <div align="center" style="margin-top:70px">
         {{ $accomplished_by }}<br>{{ $accomplished_at }}
      </div>
    </div>
  </div>
  @endif
</body>
</html>