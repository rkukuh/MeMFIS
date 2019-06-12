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
      height: 40px;
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
    <img src="./img/form/printoutjobcardbasic/HeaderJobCardBasic.png" alt=""width="100%">
  </header>
  <footer style="margin-top:14px;">
    <img src="./img/form/printoutjobcardbasic/FooterJobCardRoutine.png" width="100%" alt="" >
  </footer>

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
      <div style="width:100%;min-height:20px;border: 3px solid #d4d7db;border-radius: 10px;">
        <table width="100%" cellpadding="10">
          <tr>
            <td width="25%" valign="top">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse autem animi molestiae </td>
            <td width="25%" align="center" valign="top">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </td>
            <td width="25%" align="center" valign="top">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
            <td width="25%" align="right" valign="top">Lorem ipsum dolor sit amet consectetur adipisicing elit. </td>
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
           <span>Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum earum temporibus repellendus ratione, nesciunt consectetur accusantium a aliquam ipsa architecto quam itaque, cupiditate commodi iure voluptates quaerat. Blanditiis, velit fuga. </span>
          </td>
          <td height="15%" valign="top">
            <span>Lorem Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis iste blanditiis repellendus minima iusto laborum nihil eaque cum? Veritatis eligendi est adipisci, exercitationem eaque in repellendus odio incidunt error doloribus?</span>
          </td>
        </tr>
        <tr>
          <td colspan="2" height="35" valign="top">
              Accomplishment Record : <br><br>
              <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, iusto esse similique quod ducimus cupiditate voluptate voluptatem reprehenderit molestias facere earum quidem non harum dolore expedita at illo dolores odio!</span>
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
          <td width="50%" height="35" valign="center">
              Transfer to Defect Card No : <br><br>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime dolorum esse fugiat ex illo ab quae ducimus et.
          </td>
        </tr>
      </table>
      <table width="100%" style="margin-top: 12px;">
        <tr>
          <td width="4%" valign="top">Helper </td>
          <td width="1%" valign="top">:</td>
          <td width="28%" valign="top">Yemimul</td>
          <td width="33%" valign="top" align="center">Status : <span>Single</span></td>
          <td width="34%" valign="top" align="right">Data Close : <span>10-07-1994</span></td>
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
            <td width="34%" height="53%" align="center" valign="bottom">
              <div style="width:100%;height:20px;text-align:center">Ibnu Pratama Adi Saputra</div>
              <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>Date & Time</span></div>
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
</body>
</html>