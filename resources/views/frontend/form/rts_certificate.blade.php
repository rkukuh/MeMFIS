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
  }
  table{
    border-collapse: collapse;
    margin-top: 35px;
  }
  td{
    padding: 5px;
  }
  .table2 tr td{
    padding-bottom: 19px;
  }
  ul li{
    display: inline-block;
  }
  .checkbox{
    height: 15px;
    width: 100%;
  }
  #content{
    /* position: relative; */
    font-size: 16px;
  }
  #content .image img{
    height: 1058px;
    width: 100%;
    position: absolute;
    top:0;
    bottom: 0;
  }
  #content .kotak{
    font-size: 16px;
    /* height: 1000px; */
    width: 70%;
    position: absolute;
    top: 14%;
    margin-left:15%;
    text-align: center;
  }
  </style>
</head>
<body>

  <div id="content">
    <div class="image">
        <img src="./img/form/printoutrts/rts.jpg" alt="">
    </div>
    <div class="kotak">
      <h2>CERTIFICATE OF RELEASE TO SERVICE</h2>
      <table width="100%">
        <tr width="100%">
          <td width="40%" valign="top">Project  Reference</td>
          <td width="1%" valign="top">:</td>
          <td width="59%" valign="top"><span>{{$rts->project->code}}</span></td>
        </tr>
        <tr width="100%">
          <td width="40%" valign="top">Aircraft Type</td>
          <td width="1%" valign="top">:</td>
          <td width="59%" valign="top"><span>{{$rts->project->aircraft->name}}</span></td>
        </tr>
        <tr width="100%">
          <td width="40%" valign="top">Aircraft Serial Number</td>
          <td width="1%" valign="top">:</td>
          <td width="59%" valign="top"><span>{{$rts->project->aircraft->name}}</span></td>
        </tr>
        <tr width="100%">
          <td width="40%" valign="top">Nasionality / Registration Mark</td>
          <td width="1%" valign="top">:</td>
          <td width="59%" valign="top"><span>generate</span></td>
        </tr>
        <tr width="100%">
          <td width="40%" valign="top">Aircarft Total Time</td>
          <td width="1%" valign="top">:</td>
          <td width="59%" valign="top"><span>{{$rts->aircraft_total_time}} TAT</span></td>
        </tr>
        <tr width="100%">
          <td width="40%" valign="top">Aircarft Total Cycle</td>
          <td width="1%" valign="top">:</td>
          <td width="59%" valign="top"><span>{{$rts->aircraft_total_time}} TAC</span></td>
        </tr>
        <tr width="100%">
          <td width="40%" valign="top">Work Performed</td>
          <td width="1%" valign="top">:</td>
          <td width="59%" valign="top"><span>{{ $work_perfor[0] }}</span></td>
        </tr>
        <tr width="100%">
          <td width="30%"></td>
          <td width="1%"></td>
          <td width="59%">
            <div style="margin-top:-15px;">
              <ul style="margin-left:-40px;">
                <li>{{ $work_perfor[1] }}</li>
              </ul>
              <ul style="margin-top:-12px;margin-left:-40px;">
                <li>-</li>
                <li>Generate dari workpackage title</li>
              </ul>
              <ul style="margin-top:-12px;margin-left:-40px;">
                <li>-</li>
                <li>Generate dari taskcard type (basic inspection)</li>
              </ul>
              <ul style="margin-top:-12px;margin-left:-40px;">
                <li>-</li>
                <li>CPCP Inspection</li>
              </ul>
              <ul style="margin-top:-12px;margin-left:-40px;">
                <li>-</li>
                <li>Defect Report</li>
              </ul>
            </div>
          </td>
        </tr>
      </table>
      <table width="100%" cellspacing="9" style="margin-top:-6px" class="table2">
        <tr width="100%">
          <td width="40%" valign="top">Work Data/CAMP  Reference</td>
          <td width="1%" valign="top">:</td>
        <td width="59%" valign="top"><span>{{$rts->work_data}}</span></td>
        </tr>
        <tr width="100%">
          <td width="40%" valign="top">Exceptions</td>
          <td width="1%" valign="top">:</td>
        <td width="59%" valign="top"><span>{{$rts->exception}}</span></td>
        </tr>
      </table>
      <p style="text-align:left;padding:5px;">The work recorded above has been carried out, subject to exception/s itemized above, in accordance with requirements of Civil Aviation Safety Regulaton. For time being in force and in that respect the aircraft/equipment is approved for release to service.</p>
      <table width="100%">
        <tr width="100%">
          <td width="18%" valign="top">Name</td>
          <td width="1%" valign="top">:</td>
        <td width="82%" valign="top">{{$created_by}}</td>
        </tr>
        <tr width="100%">
          <td width="18%" valign="top">Date / Time</td>
          <td width="1%" valign="top">:</td>
          <td width="82%" valign="top">{{$rts->created_at}}</td>
        </tr>
      </table>
      <p style="text-align:left;font-size: 14px;padding-left:5px;">For and behalf of PT. Merpati Maintanance Facility</p>
      <table width="100%" style="margin-top:-4px;">
        <tr width="100%">
          <td width="18%" valign="top">Approval</td>
          <td width="1%" valign="top">:</td>
          <td width="82%" valign="top">
            <div class="checkbox">
                @if(sizeOf($rts->approvals->toArray())==0)
                    <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:5px;">Indonesia DGCA No :</span><span>145D-093</span>
                @else
                    <img src="./img/check.png" alt="" width="10"> <span style="margin-left:5px;">Indonesia DGCA No :</span><span>145D-093</span>
                @endif
            </div>
          </td>
        </tr>
      </table>
      <p style="text-align: right; font-size:17px; margin-right:20px;">Signature And Stamp:</p>
    </div>
  </div>
</body>
</html>
