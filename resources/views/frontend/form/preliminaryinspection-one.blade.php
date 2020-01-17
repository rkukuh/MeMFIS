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
    #content3, #content4{
      margin-top:5px;
    }

    #content3 .table1{
      padding-left: 7px;
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
  </style>
</head>
<body>


  <header id="header">
    <img src="./img/form/printoutpreliminaryinspection/HeaderPreliminaryInspection.png" alt=""width="100%">
  </header>
  <footer style="margin-top:14px;">
    <div class="container">
      <span style="margin-left:6px">Prepared By : {{ $prepared_by }} &nbsp;&nbsp;&nbsp;&nbsp; Printed By : {{ Auth::user()->name }}</span>
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
                        <td width="29%">{{ $jobcard->estimation_manhour }}</td>
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

  <div id="content2">
    <div class="container">
        <table width="88%" cellpadding="6">
            <tr>
                <td width="1%">1.</td>
                <td width="99%">Upon arival of the aircraft for scheduled maintenance/inspection, perform zonal inspection to the area-described bellow.</td>
            </tr>
            <tr>
                <td width="1%">2.</td>
                <td width="99%">Record any defect found in relates to zone/area inspected on the attached from sheet.Use zone code and inspection code as applicable, and clearly ure of defect to identify descrepancy. Use additional attachment as necessary.</td>
            </tr>
            <tr>
                <td width="1%">3.</td>
                <td width="99%">Perform necessary hidden damage inspection to any defect found to identify whether extended defect was detected.</td>
            </tr>
            <tr>
                <td width="1%">4.</td>
                <td width="99%">Issue Repair Card for any defect found and records card's number issued.</td>
            </tr>
            <tr>
                <td width="1%">5.</td>
                <td width="99%">For aircraft visiting MMF should stay for a period of 5 (five) days or more, perform inventory check in accordance with Inventory Checklist attached. Customer's representative countersign is required to this list.</td>
            </tr>
        </table>
    </div>
  </div>

  <div id="content3">
    <div class="container">
      <table width="100%" border="1" cellpadding="5">
          <tr style="background:#f7dd16">
            <td align="center" colspan="2"><b>ZONE/AREA TO BE INSPECTED</b></td>
            <td align="center" colspan="2"><b>POINTS OF INSPECTION</b></td>
          </tr>
          <tr>
              <td width="5%">Zone Code</td>
              <td width="45%" align="center">Description</td>
              <td width="5%">Insp. Code</td>
              <td width="45%" align="center">Description</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-01</td>
              <td width="45%" align="left" valign="top">Nose and nose wheel well</td>
              <td width="5%" align="center" valign="top">CLN</td>
              <td width="45%" align="left" valign="top">Cleanliness</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-02</td>
              <td width="45%" align="left" valign="top">R/H fuselage</td>
              <td width="5%" align="center" valign="top">PPO</td>
              <td width="45%" align="left" valign="top">Paint peel off/flake</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-03</td>
              <td width="45%" align="left" valign="top">R/H MLG wheel well</td>
              <td width="5%" align="center" valign="top">SCR</td>
              <td width="45%" align="left" valign="top">Stratches</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-04</td>
              <td width="45%" align="left" valign="top">R/H wing</td>
              <td width="5%" align="center" valign="top">DNT</td>
              <td width="45%" align="left" valign="top">Dents</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-05</td>
              <td width="45%" align="left" valign="top">R/H Engine</td>
              <td width="5%" align="center" valign="top">WRI</td>
              <td width="45%" align="left" valign="top">Wrinkles</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-06</td>
              <td width="45%" align="left" valign="top">Emoenage</td>
              <td width="5%" align="center" valign="top">CRA</td>
              <td width="45%" align="left" valign="top">Cracks</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-07</td>
              <td width="45%" align="left" valign="top">L/H Engine</td>
              <td width="5%" align="center" valign="top">COR</td>
              <td width="45%" align="left" valign="top">Corrosion</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-08</td>
              <td width="45%" align="left" valign="top">L/H Wing</td>
              <td width="5%" align="center" valign="top">LKG</td>
              <td width="45%" align="left" valign="top">Leakage (oil, fuel, etc)</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-09</td>
              <td width="45%" align="left" valign="top">L/H MLG wheel well</td>
              <td width="5%" align="center" valign="top">INS</td>
              <td width="45%" align="left" valign="top">Installation security and safety</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-10</td>
              <td width="45%" align="left" valign="top">L/H Fuselage</td>
              <td width="5%" align="center" valign="top">ODF</td>
              <td width="45%" align="left" valign="top">Other defect</td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-11</td>
              <td width="45%" align="left" valign="top">Cockpit</td>
              <td width="5%" align="center" valign="top"></td>
              <td width="45%" align="left" valign="top"></td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-12</td>
              <td width="45%" align="left" valign="top">Cabin</td>
              <td width="5%" align="center" valign="top"></td>
              <td width="45%" align="left" valign="top"></td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-13</td>
              <td width="45%" align="left" valign="top">Lavatory</td>
              <td width="5%" align="center" valign="top"></td>
              <td width="45%" align="left" valign="top"></td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-14</td>
              <td width="45%" align="left" valign="top">Galley</td>
              <td width="5%" align="center" valign="top"></td>
              <td width="45%" align="left" valign="top"></td>
          </tr>
          <tr>
              <td width="5%" align="center" valign="top">Z-15</td>
              <td width="45%" align="left" valign="top">Cargo</td>
              <td width="5%" align="center" valign="top"></td>
              <td width="45%" align="left" valign="top"></td>
          </tr>
      </table>
    </div>
  </div>

  <div id="content4">
      <div class="container">
          <table width="100%" border="1">
              <tr>
                  <td width="50%" height="60" valign="top" style="position:relative;">
                      Discrepencies found : <br>
                      (use attached sheet to write up the discrepency)
                      <div style="position:absolute;top:-6px;left:90px;">
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
                      <span style="position:absolute;top:60px;left:0">Number of discrepencies {{ sizeof($jobcard->defectcards) }} item(s)</span>
                  </td>
                  <td width="50%" height="60" valign="top" style="position:relative;">Inspection performed by : {{ $jobcard->progresses->first()->progressedBy->full_name }} </td>
              </tr>
          </table>
      </div>
  </div>
</body>
</html>
