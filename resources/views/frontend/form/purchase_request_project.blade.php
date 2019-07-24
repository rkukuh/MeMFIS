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
      height: 6.5cm;
    }
    ul li{
      display: inline-block;
    }

    table{
      border-collapse: collapse;
    }

    #head{
        top:115px;
        left: 160px;   
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
        width:100%;
        margin-top:185px;
        margin-bottom:34px;
    }

    #content2 table tr td{
      border-left:  1px solid  #d4d7db;
      border-right:  1px solid  #d4d7db;
      border-top:  1px solid  #d4d7db;
      border-bottom:  1px solid  #d4d7db;
    }

    #content3 .body{
        border:1px solid #d4d7db;
        width:100%;
        min-height:80px;
        border-radius:10px;
        padding:6px;
    }

</style>
<body>

    <header>
        <img src="./img/form/printoutpurchase-request/HeaderPurchaseRequest.png" alt=""width="100%">
        <div id="head">
            <table width="80%" style="font-size:16px;">
                <tr>
                    <td width="29%" valign="top">Purchase Request No.</td>
                    <td width="2%" valign="top">:</td>
                    <td width="69%" valign="top">PRPJ-2019/07/00001</td>
                </tr>
            </table>
        </div>
    </header>

    <footer>
        <div style="margin-bottom:30px; font-size:16px">
            <div class="container">
                <table width="100%">
                    <tr>
                        <th width="50%" align="center">
                            Created By
                        </th>
                        <th width="50%" align="center">
                            Approved By
                        </th>
                    </tr>
                </table>
                <table style="margin-top:80px;" width="100%">
                    <tr>
                        <td width="50%" align="center">
                            Name ; Timestamp
                        </td>
                        <td width="50%" align="center">
                            Name ; Timestamp
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <span style="margin-left:6px;">Created By : Name ; Timestamp &nbsp;&nbsp;&nbsp; Printed By : Name ; Timestamp</span>
        <img src="./img/form/printoutpurchase-request/FooterPurchaseRequest.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="6" style="font-size:15px;">
                <tr>
                    <td valign="top" width="20%">Project Ref. No</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="47%">PROJ-2019/07/0005</td>
                    <td width="32%" rowspan="4">
                        <div class="barcode">
                            {!!DNS2D::getBarcodeHTML('getbarcode', 'QRCODE',4.5,4.5)!!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="20%">A/C Type</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="47%">CN-235</td>
                </tr>
                <tr>
                    <td valign="top" width="20%">Date</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="47%">05/07/2019</td>
                </tr>
                <tr>
                    <td valign="top" width="20%">Date Required</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="47%">10-07-2019</td>
                </tr>
            </table>
        </div>
    </div>
        
    <div id="content2">
        <div class="container">
            <table width="100%" cellpadding="6">
                <tr style="background:#f7dd16;">
                    <th valign="top" align="center" width="6%">No</th>
                    <th valign="top" align="center" width="21%">Part Number</th>
                    <th valign="top" align="center" width="31%">Item Description</th>
                    <th valign="top" align="center" width="8%">Qty</th>
                    <th valign="top" align="center" width="8%">Unit</th>
                    <th valign="top" align="center" width="26%">Remark</th>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">1</td>
                    <td valign="top" align="center" width="21%">Pr-12312</td>
                    <td valign="top" width="31%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="26%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">2</td>
                    <td valign="top" align="center" width="21%">Pr-12312</td>
                    <td valign="top" width="31%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="26%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">3</td>
                    <td valign="top" align="center" width="21%">Pr-12312</td>
                    <td valign="top" width="31%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="26%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">4</td>
                    <td valign="top" align="center" width="21%">Pr-12312</td>
                    <td valign="top" width="31%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="26%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">5</td>
                    <td valign="top" align="center" width="21%">Pr-12312</td>
                    <td valign="top" width="31%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="26%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">6</td>
                    <td valign="top" align="center" width="21%">Pr-12312</td>
                    <td valign="top" width="31%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="26%">Remark</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <p style="font-size:14px;">Description :</p>
            <div class="body">
                <table width="100%">
                    <tr>
                        <td>Lorem, Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad excepturi obcaecati unde vel autem quas facilis! Quod distinctio dolor cupiditate, sequi doloremque commodi fuga illo facere, recusandae ipsum earum sed!</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>