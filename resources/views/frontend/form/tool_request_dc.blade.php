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
      font-size: 10px;
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
      height: .7cm;
    }
    ul li{
      display: inline-block;
    }

    table{
      border-collapse: collapse;
    }

    #head{
        top:55px;
        left: 340px;   
        position: absolute;
        color:white;
    }

    .container{
      width: 100%;
      margin: 0 20px;
    }

    .barcode{
      margin-left:70px;
    }

    #content{
        width:100%;
        margin-top:78px;
        margin-bottom:15px;
        z-index: 1;
    }
    #content2 .body{
        border:1px solid #d4d7db;
        width:100%;
        min-height:80px;
        border-radius:10px;
        padding:6px;
    }

    #content2,#content3{
        margin-bottom: 12px;
    }

    #content3 table tr td{
      border-left:  1px solid  #d4d7db;
      border-right:  1px solid  #d4d7db;
      border-top:  1px solid  #d4d7db;
      border-bottom:  1px solid  #d4d7db;
    }

    #content4 .head {
        width: 100%;
        height: 25px;
        background: #f7dd16;
        border-radius: 9px 9px 0px 0px;
        font-weight: bold;
        font-size: 12px;
    }

    #content4 .body {
        width: 100%;
        border-left: 2px solid #d4d7db;
        border-right: 2px solid #d4d7db;
        border-bottom: 2px solid #d4d7db;
    }

    #content4 .body table tr td {
        border-left: 1px solid #d4d7db;
    }

</style>
<body>

    <header>
        <img src="./img/form/printouttool-request/Header.png" alt=""width="100%">
        <h1 style="top:-5px;left: 340px;position: absolute;color:white;text-align:center;">Tool Request <br> <span style="font-size:12px">(From Jobcard)</span></h1>
        <div id="head">
            <table width="90%">
                <tr>
                    <td width="15%" valign="top"><b>No.</b></td>
                    <td width="2%" valign="top"><b>:</b></td>
                    <td width="83%" valign="top"><b>Generate</b></td>
                </tr>
            </table>
        </div>
    </header>

    <footer>
        <span style="margin-left:6px;">Printed By : Name ; Timestamp </span>
        <img src="./img/form/printouttool-request/Footer.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="2">
                <tr>
                    <td valign="top" width="14%">Date</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="24%">Generated </td>
                    <td valign="top" width="17%">A/C Reg</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="25%">Generated</td>
                    <td valign="top" width="18%" rowspan="4">
                        <div class="barcode">
                            {{-- {!!DNS2D::getBarcodeHTML('getbarcode', 'QRCODE',3.4,3.4)!!} --}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="14%">Ref. JC No</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="24%">Generated</td>
                    <td valign="top" width="17%">Storage</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="25%">Generated</td>
                </tr>
                <tr>
                    <td valign="top" width="14%">Additional No.</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="24%">Generated</td>
                    <td valign="top" width="17%">Section Code</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="25%">Generated</td>
                </tr>
                <tr>
                    <td valign="top" width="14%">A/C Type</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="24%">Generated</td>
                    <td valign="top" width="17%"></td>
                    <td valign="top" width="1%"></td>
                    <td valign="top" width="25%"></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content2">
        <div class="container">
            <p style="font-size:12px;">Remark :</p>
            <div class="body">
                <table width="100%">
                    <tr>
                        <td>Lorem, Lorem ipsum dolor , adipisicing elit. Ad excepturi obcaecati unde vel autem quas facilis! Quod distinctio dolor cupiditate, sequi doloremque commodi fuga illo facere, recusandae ipsum earum sed!</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <table width="100%">
                <tr style="background:#f7dd16;">
                    <th valign="middle" align="center" width="6%">No</th>
                    <th valign="top" align="center" width="11%">Part Number</th>
                    <th valign="top" align="center" width="10%">Serial Number</th>
                    <th valign="middle" align="center" width="26%">Item Description</th>
                    <th valign="middle" align="center" width="15%">Expired Date</th>
                    <th valign="middle" align="center" width="8%">Qty</th>
                    <th valign="middle" align="center" width="8%">Unit</th>
                    <th valign="middle" align="center" width="16%">Remarks</th>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">1</td>
                    <td valign="top" align="center" width="11%">Pr-12312</td>
                    <td valign="top" align="center" width="10%">Pr-12312</td>
                    <td valign="top" width="26%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" width="15%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="16%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">1</td>
                    <td valign="top" align="center" width="11%">Pr-12312</td>
                    <td valign="top" align="center" width="10%">Pr-12312</td>
                    <td valign="top" width="26%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" width="15%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="16%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">1</td>
                    <td valign="top" align="center" width="11%">Pr-12312</td>
                    <td valign="top" align="center" width="10%">Pr-12312</td>
                    <td valign="top" width="26%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" width="15%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="16%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">1</td>
                    <td valign="top" align="center" width="11%">Pr-12312</td>
                    <td valign="top" align="center" width="10%">Pr-12312</td>
                    <td valign="top" width="26%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" width="15%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="16%">Remark</td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="6%">1</td>
                    <td valign="top" align="center" width="11%">Pr-12312</td>
                    <td valign="top" align="center" width="10%">Pr-12312</td>
                    <td valign="top" width="26%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" width="15%">Lorem ipsum dolor, sit amet consectetur </th>
                    <td valign="top" align="center" width="8%">11</td>
                    <td valign="top" align="center" width="8%">Bot</td>
                    <td valign="top" width="16%">Remark</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div id="content4">
        <div class="container">
        <div class="head">
            <table width="100%" cellpadding="6">
            <tr>
                <td width="33%" align="center">Created By</td>
                <td width="33%" align="center">Approved By</td>
                <td width="34%" align="center">Received By</td>
            </tr>
            </table>
        </div>
        <div class="body">
            <table width="100%">
            <tr>
                <td width="33%" height="65" align="center" valign="bottom">
                <div style="width:100%;height:20px;text-align:center">lorem</div>
                <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>generated</span></div>
                </td>
                <td width="33%" height="65" align="center" valign="bottom">
                <div style="width:100%;height:20px;text-align:center">lorem</div>
                <div style="width:100%;height:20px;text-align:left;padding-left:5px;">Date : <span>generated</span></div>
                </td>
                <td width="34%" height="65" align="center" valign="bottom">
                <div style="width:100%;height:20px;text-align:center"lorem</div>
                <div style="width:100%;height:20px;text-align:left;padding-left:5px;">
                    Date : <span>lorem</span></div>
                </td>
            </tr>
            </table>
        </div>
        </div>
    </div>

</body>
</html>