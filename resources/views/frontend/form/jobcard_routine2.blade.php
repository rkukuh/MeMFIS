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
      height: 40px;
      background: #f7dd16;
      border-radius: 9px 9px 0px 0px;
      font-weight: bold;
      font-size: 14px;
    }
    
    #content5 .body{
      width: 100%;
      height: 138px;
      border-left:  4px solid  #d4d7db;
      border-right:  4px solid  #d4d7db;
      border-bottom:  4px solid  #d4d7db;
    }

    #content5 .body table tr td{
      position: relative;
      border-left: 1px solid  #d4d7db;
    }

    #content5 .body .body-date{
      position: absolute; 
      top:108px; 
      left:15px;
    }

    #content5 .body .body-name{
      position: absolute;
      top: 88px; 
      width: 100%;
      text-align: center;
    }
  </style>
</head>
<body>
  
  <div id="header">
    <img src="./img/HeaderJobCardRoutine.png" alt=""width="100%">
  </div>

  <div id="content">
    <ul>
      <li>
        <div class="jobcard-info">
            <fieldset>
                <legend>JC No : 123456</legend>
                <div class="jobcard-info-detail">
                  <table width="80%" cellpadding="3">
                      <tr>
                        <td width="20%">Issued Date</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                        <td width="20%">Inspection Type</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                      </tr>
                      <tr>
                        <td width="20%">Taskcard No</td>
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
                        <td width="20%">A/C Reg</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                      </tr>
                      <tr>
                        <td width="20%">Company Task</td>
                        <td width="1%">:</td>
                        <td width="29%">Generate</td>
                        <td width="20%">A/C S/N</td>
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
          <td width="81%">Lorem</td>
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
          <td width="81%">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam reprehenderit laudantium ducimus nisi aliquam impedit, harum rerum, sint sed ad ex voluptas obcaecati officiis eaque debitis quam cumque magnam provident.</td>
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
          <td width="81%">Lorem</td>
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
      <div style="width:100%;height:6%;border: 3px solid #d4d7db;border-radius: 10px;">
        <table width="100%" cellpadding="10">
          <tr>
            <td width="25%"></td>
            <td width="25%" align="center"></td>
            <td width="25%" align="center"></td>
            <td width="25%" align="right"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div id="content4"> 
    <div class="container">
      <table width="100%" cellpadding="8" class="table-mt">
        <tr style="background: #d4d7db;">
          <th width="50%" align="center">Material</th>
          <th width="50%" align="center">Tools</th>
        </tr>
        <tr style="position: relative;">
          <td height="22%">
            <div style="position: absolute;">
              {{-- isi --}}
            </div>
          </td>
          <td height="22%">
            <div style="position: absolute;">
              {{-- isi --}}
            </div>
          </td>
        </tr>
        <tr style="position: relative;">
          <td colspan="2" height="35">
            <div style="position: absolute;">
              Accomplishment Record :
            </div>
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
                    <img src="./img/check-box-empty.png" alt="" width="10"> <span style="margin-left:6px;font-weight: bold;font-size:13px">YES</span>
                  </li>
                  <li style="margin-left:12px;">
                    <img src="./img/check.png" alt="" width="11"> <span style="margin-left:6px;font-weight: bold;font-size:13px">NO</span>
                  </li>
                </ul>
              </div>
            </center>
          </td>
          <td width="50%" height="35">
            <div style="position: absolute;">
              Transfer to Defect Card No :
            </div>
          </td>
        </tr>
      </table>
      <table width="100%" style="margin-top: 12px;">
        <tr>
          <td>Helper : <span>Yemimul</span></td>
          <td align="center">Status : <span>Single</span></td>
          <td align="right">Data Close : <span>10-07-1994</span></td>
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
            <td width="33%" height="65%">
              <div class="body-name">Ibnu Pratama</div>

              <div class="body-date">
                  Date : <span>(Date & Time)</span>
              </div>
            </td>
            <td width="33%" height="65%">
              <div class="body-name">Ibnu Pratama</div>

              <div class="body-date">
                  Date : <span>(Date & Time)</span>
              </div>
            </td>
            <td width="34%" height="65%">
              <div class="body-name">Ibnu Pratama</div>

              <div class="body-date">
                  Date : <span>(Date & Time)</span>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <table width="100%" style="margin-top: 12px;">
        <tr>
          <td width="8%">Issued By</td>
          <td width="1%">:</td>
          <td width="91%">Name PPC</td>
        </tr>
      </table>
    </div>
  </div>
  <div style="margin-top:14px;">
    <img src="./img/FooterJobCardRoutine.jpg" width="100%" alt="" srcset="">
  </div>
</body>
</html>