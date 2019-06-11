<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    html,body{
      padding: 0;
      margin: 0;
      font-size: 12px;
    }

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
    ul li{
      display: inline-block;
    }

    table{
      border-collapse: collapse;
    }

    #head{
        top:0px;
        left: 520px;
        position: absolute;
        color:white;
    }

    .container{
      width: 100%;
      margin: 0 36px;
    }

    .barcode{
      margin-left:70px;
      margin-top: -12px;
    }

    #content{
      margin-top:150px;
    }

    #content2{
      margin-top:20px;
      margin-bottom:20px;
    }
    
</style>
<body>

    <header>
        <img src="./img/form/printoutquotation/HeaderQuotation.jpg" alt=""width="100%">
        <div id="head">
            <div style="margin-right:20px;text-align:left;">
                <h1 style="font-size:34px;">belum ada</h1>
                <div style="font-size:14px;letter-spacing:1px;margin-top:-15px">
                    <table width="100%">
                        <tr>
                            <td width="20%" valign="top">QN No.</td>
                            <td width="1%" valign="top">:</td>
                            <td width="79%" valign="top">001/QN/PJ-MMF/05/19</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </header>

    <footer style="margin-top:14px;">
        <span style="margin-left:6px">Created By : Name;Timestamp &nbsp;&nbsp;&nbsp; Printed By : Name;Timestamp</span>
        <img src="./img/form/printoutquotation/FooterQuotation.jpg" width="100%" alt="" >
    </footer>
        
    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="3">
                <tr>
                    <td width="20%">Date</td>
                    <td width="1%">:</td>
                    <td width="29%">Generate</td>
                    <td width="20%">A/C Type</td>
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
                    <td width="20%">Work Order No</td>
                    <td width="1%">:</td>
                    <td width="29%">Generate</td>
                    <td width="20%">A/C S/N</td>
                    <td width="1%">:</td>
                    <td width="29%">Generate</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content2">
        <div class="container">
            <table width="100%" cellpadding="4">
            <tr>
                <td width="20%" valign="top">
                    Title
                </td>
                <td width="1%" valign="top">
                    :
                </td>
                <td width="79%" valign="top">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium, officia quaerat explicabo ratione a incidunt quibusdam reiciendis unde, facere iure inventore optio culpa corrupti perferendis doloribus ab ex deleniti. Aliquid?</td>
            </tr>
            </table>
        </div>
    </div>

    <div class="content3">
        <div class="container">
            <table width="100%" cellpadding="4" border="1">
                <tr style="background: #f4b942">
                    <td width="5%" align="center">No</td>
                    <td width="14%" align="center">Defect Card No.</td>
                    <td width="14%" align="center">Complaint</td>
                    <td width="11%" align="center">Date Finished</td>
                    <td width="11%" align="center">Mech</td>
                    <td width="11%" align="center">Engineer Stamp</td>
                    <td width="12%" align="center">Remark</td>
                    <td width="11%" align="center">Act. Mhrs</td>
                    <td width="11%" align="center">ctrl Sign</td>
                </tr>
                <tr>
                    <td width="5%" align="center">-</td>
                    <td width="14%" align="center">-</td>
                    <td width="14%" align="center">-</td>
                    <td width="11%" align="center">-</td>
                    <td width="11%" align="center">-</td>
                    <td width="11%" align="center">-</td>
                    <td width="12%" align="center">-</td>
                    <td width="11%" align="center">-</td>
                    <td width="11%" align="center">-</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>