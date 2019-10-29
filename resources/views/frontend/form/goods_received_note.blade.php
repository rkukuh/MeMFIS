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
        top:5px;
        left: 350px;   
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
        margin-top:220px;
    }

    #content3 table tr td{
      border-left:  1px solid  #d4d7db;
      border-right:  1px solid  #d4d7db;
      border-top:  1px solid  #d4d7db;
      border-bottom:  1px solid  #d4d7db;
    }

    #content4 .body{
        border:1px solid #d4d7db;
        width:100%;
        min-height:80px;
        border-radius:10px;
        padding:6px;
    }
</style>
<body>
        <header>
            <img src="./img/form/printoutgrn/HeaderGRN.png" alt=""width="100%">
            <div id="head">
                <p style="font-size:40px">Good Received Notes</p>
                <table width="75%" style="font-size:16px;margin-top:-40px;">
                    <tr>
                        <td width="22%" valign="top"><b>GRN No.</b></td>
                        <td width="2%" valign="top">:</td>
                        <td width="76%" valign="top">001/GRN-PJ/MMF/02/19</td>
                    </tr>
                </table>
            </div>
        </header>
        
        <footer>
            <div style="margin-bottom:75px; font-size:16px">
                <div class="container">
                    <table width="100%">
                        <tr>
                            <th width="50%" align="center">
                                Approved By
                            </th>
                            <th width="50%" align="center">
                                Received By
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
            <img src="./img/form/printoutgrn/FooterGRN.png" width="100%" alt="" >
        </footer>


        <div id="content">
            <div class="container">
                <table width="100%" cellpadding="3">
                    <tr>
                        <td valign="top" width="13%"><b>Supplier</b></td>
                        <td valign="top"width="1%">:</td>
                        <td valign="top" width="54%">PT. Maju Mundur</td>
                        <td valign="top" width="32%" rowspan="6">
                            <div class="barcode">
                                {!!DNS2D::getBarcodeHTML('getbarcode', 'QRCODE',5.6,5.6)!!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" width="13%"><b>Telp/fax</b></td>
                        <td valign="top"width="1%">:</td>
                        <td valign="top" width="54%">031-8686481/031-8686482</td>
                    </tr>
                    <tr>
                        <td valign="top" width="13%"><b>Address</b></td>
                        <td valign="top"width="1%">:</td>
                        <td valign="top" width="54%">JL. JALAN RAYA INDONESIA</td>
                    </tr>
                    <tr>
                        <td valign="top" width="13%"><b>Ref. DO No</b></td>
                        <td valign="top"width="1%">:</td>
                        <td valign="top" width="54%">Nomer Surat Jalan - Date</td>
                    </tr>
                    <tr>
                        <td valign="top" width="13%"><b></b></td>
                        <td valign="top"width="1%"></td>
                        <td valign="top" width="54%"></td>
                    </tr>
                    <tr>
                        <td valign="top" width="13%"><b></b></td>
                        <td valign="top"width="1%"></td>
                        <td valign="top" width="54%"></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="content2">
            <div class="container">
                <table width="100%" cellpadding="4">
                    <tr>
                        <td width="10%" valign="top"><b>Date</b></td>
                        <td width="1%" valign="top">:</td>
                        <td width="39%" valign="top">01 Februari 2019</td>
                        <td width="18%" valign="top"></td>
                        <td width="11%" valign="top"><b>PO No.</b></td>
                        <td width="1%" valign="top">:</td>
                        <td width="20%" valign="top">01 Februari 2019</td>
                    </tr>
                    <tr>
                        <td width="10%" valign="top"><b>Warehouse</b></td>
                        <td width="1%" valign="top">:</td>
                        <td width="39%" valign="top">01 Februari 2019</td>
                        <td width="18%" valign="top"></td>
                        <td width="11%" valign="top"><b>PR No.</b></td>
                        <td width="1%" valign="top">:</td>
                        <td width="20%" valign="top">01 Februari 2019</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div id="content3">
            <div class="container">
                <table width="100%" cellpadding="6">
                    <tr style="background:#f7dd16;">
                        <th valign="top" align="center" width="6%">No</th>
                        <th valign="top" align="center" width="21%">P/N</th>
                        <th valign="top" align="center" width="31%">Item Description</th>
                        <th valign="top" align="center" width="8%">Qty</th>
                        <th valign="top" align="center" width="8%">Unit</th>
                        <th valign="top" align="center" width="26%">Description</th>
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
    
        <div id="content4">
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