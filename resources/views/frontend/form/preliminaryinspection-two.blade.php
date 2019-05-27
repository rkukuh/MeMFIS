<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
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
      margin-top:27px;
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
    #content3, #content4{
      margin-top:5px;
    }

    #content3 .table1{
      padding-left: 7px;
    }
  </style>
</head>
<body>
  
  <div id="header">
    <img src="./img/form/printoutpreliminaryinspection/HeaderPreliminaryInspection.jpg" alt=""width="100%">
  </div>

  <div id="content">
    <ul>
      <li>
        <div class="jobcard-info">
            <fieldset>
                <legend>Job Card No : 123456789</legend>
                <div class="jobcard-info-detail">
                  <table width="80%" cellpadding="3">
                      <tr>
                        <td width="20%">Issued Date & Time</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                        <td width="20%">AC/Type</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                      </tr>
                      <tr>
                        <td width="20%">Project No</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                        <td width="20%">Est. Mhrs</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                      </tr>
                      <tr>
                        <td width="20%">Inspection Type</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                        <td width="20%">Act. Mhrs</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
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
          <tr style="background:#f7dd16">
            <th width="2%" align="center">No</th>
            <th width="6%" align="center">Sub Zone Code</th>
            <th width="6%" align="center">Ins. Code</th>
            <th width="65%" align="center">Nature of Defect</th>
            <th width="16%" align="center">Issued Repair Card No.</th>
          </tr>
      </table>
    </div>
  </div>

  <div style="position:absolute;bottom:0;">
    <img src="./img/form/printoutpreliminaryinspection/FooterPreliminaryInspection.jpg" width="100%" alt="" srcset="">
  </div>

</body>
</html>