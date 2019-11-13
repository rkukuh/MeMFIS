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
            height: 1.8cm;
        }
        ul li{
            display: inline-block;
        }

        table{
            border-collapse: collapse;
        }

        #head{
            top:0px;
            left: 370px;
            position: absolute;
            color:white;
        }

        .container{
            width: 100%;
            margin: 0 36px;
        }

        .barcode{
            margin-left:70px;
            margin-top:12px;
        }

        #content{
            width:100%;
            height:190px;
            margin-top:226px;
            z-index: 1;
        }

        #content2{
            margin-top:30px;
        }

        #content2 .head-table{
            border-top:  2px solid  #d4d7db;
            border-bottom:  2px solid  #d4d7db;
        }

        #content2 .body-table{
            height: 195px;
            border-bottom:  2px solid  #d4d7db;
        }

        #content3{
            margin-top:12px;
        }

    </style>
</head>
<body>
    
    <header>
        <img src="./img/form/printoutpurchase-order/HeaderPO.png" alt=""width="100%">
        <div id="head">
            <div style="margin-right:20px;text-align:left;">
                <h1 style="font-size:34px;">PURCHASE ORDER</h1>
                <table width="84%" cellpadding="3" style="margin-left:-40px;font-size:16px;">
                    <tr>
                        <td valign="top" width="35%">Purchase Order No.</td>
                        <td valign="top" width="1%">:</td>
                        <td valign="top" width="64%">Nomor PO</td>
                    </tr>
                    <tr>
                        <td valign="top" width="35%">Date</td>
                        <td valign="top" width="1%">:</td>
                        <td valign="top" width="64%">16 Januari 2019</td>
                    </tr>
                    <tr>
                        <td valign="top" width="35%">Valid Until</td>
                        <td valign="top" width="1%">:</td>
                        <td valign="top" width="64%">20 Januari 2019</td>
                    </tr>
                    <tr>
                        <td valign="top" width="35%">Ref PR No.</td>
                        <td valign="top" width="1%">:</td>
                        <td valign="top" width="64%">001/PR-PJ/MMF/01/19</td>
                    </tr>
                </table>
            </div>
        </div>
    </header>

    <footer>
        <table width="100%">
            <tr>
                <td>  <span style="margin-left:6px;">Created By : Name ; Timestamp &nbsp;&nbsp;&nbsp; Printed By : Name ; Timestamp</span> </td>
                <td>Form No. : F02-0504</td>
            </tr>
        </table>
        <img src="./img/form/printoutpurchase-order/FooterPO.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <div class="container">
            <table width="100%" style="margin-top:20px;">
                <tr>
                    <td valign="top" width="37%" height="70">
                        <span style="line-height:20px;">
                            PT. MERPATI MAINTENANCE FACILITY <br> JUANDA INTERNATIONAL AIRPORT <br> JL. RAYA JUANDA NO.16 <br>
                            BETRO,SEDATI SIDOARJO JAWA TIMUR <br> INDONESIA 61253 <br>
                            <span style="line-height:20px;">TELP &nbsp; : 031-8686481</span> <br>
                            <span style="line-height:20px;">FAX &nbsp;&nbsp; : 031-8686500</span> <br>
                        </span>
                    </td>
                    <td valign="top" width="30%" height="70" style="line-height:20px;">
                        <b>To :</b> <br>
                        PT. MAJU MUNDUR <br>
                        JL. RAYA INDONESIA <br>
                        SURABAYA <br>
                        TELP : 031-8686481
                    </td>
                    <td valign="top" width="33%" height="70" align="center">
                        <div class="barcode">
                            {!!DNS2D::getBarcodeHTML('PO-Number', 'QRCODE',5.6,5.6)!!}
                        </div>
                    </td>
                </tr>
            </table>
            <table width="100%" style="margin-top:15px;"> 
                <tr>
                    <td valign="top" width="5%">Currency</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="10%">USD</td>
                    <td valign="top" width="5%">Rate</td>
                    <td valign="top" width="1%">:</td>
                    <td valign="top" width="78%">Rp. 15.000</td>
                </tr>
            </table>
        </div>
    </div>

    <div id="content2">
        <div class="head-table">
            <table width="100%" cellpadding="3">
                <tr>
                    <th valign="top" align="center" width="5%">No</th>
                    <th valign="top" align="center" width="11%">P/N</th>
                    <th valign="top" align="center" width="24%">Item Description</th>
                    <th valign="top" align="center" width="7%">Qty</th>
                    <th valign="top" align="center" width="7%">Unit</th>
                    <th valign="top" align="center" width="7%">Price</th>
                    <th valign="top" align="center" width="14%">Subtotal</th>
                    <th valign="top" align="center" width="11%">Disc</th>
                    <th valign="top" align="center" width="14%">Total</th>
                </tr>
            </table>
        </div>
        <div class="body-table">
            <table width="100%" cellpadding="3">
                <tr>
                    <td valign="top" align="center" width="5%">1</td>
                    <td valign="top" align="center" width="11%">P/N 1232</td>
                    <td valign="top" width="24%">Lorem, ipsum dolor sit amet consec</td>
                    <td valign="top" align="center" width="7%">2</td>
                    <td valign="top" align="center" width="7%">Bot</td>
                    <td valign="top" align="center" width="7%">12.000</td>
                    <td valign="top" align="center" width="14%">24.000</td>
                    <td valign="top" align="center" width="11%">12%</td>
                    <td valign="top" align="center" width="14%">12.000</td>
                </tr>
            </table>
        </div>  
    </div>

    <div id="content3">
        <div class="container">
            <table width="100%">
                <tr>
                    <th valign="top" width="78%">Description :</th>
                    <th valign="top" width="8%">Total</th>
                    <th valign="top" width="2%">:</th>
                    <th valign="top" width="12%">Rp. 1.221.232</th>
                </tr>
                <tr>
                    <td valign="top" width="78%" rowspan="2">Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint laborum architecto nemo facilis magni eos unde aperiam eius alias cupiditate, consequuntur fugit, voluptatum cumque autem? Sapiente, architecto! Nesciunt, dolores suscipit. ipsum dolor sit amet consectetur adipisicing elit. Voluptates veritatis accusantium lorem</td>
                    <th valign="top" width="8%">PPN 10%</th>
                    <th valign="top" width="2%">:</th>
                    <th valign="top" width="12%">Rp. 1.221.232</th>
                </tr>
                <tr>
                    <th valign="top" width="8%">Grandtotal</th>
                    <th valign="top" width="2%">:</th>
                    <th valign="top" width="12%">Rp. 1.221.232</th>
                </tr>
            </table>
            <div>
                <table width="100%" style="margin-top:11px;">
                    <tr>
                        <th valign="top" width="78%">Term of Payment : 30 Days / cash</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="content4">
        <div class="container">
            <table width="100%" style="margin-top:20px;">
                <tr>
                    <td valign="top" width="37%" height="70" rowspan="3">
                        <span style="line-height:20px;">
                            <b>Shipping Address :</b> <br> PT. MERPATI MAINTANANCE FACILITY <br> JL. RAYA JUANDA NO.16 <br>
                            BETRO,SEDATI SIDOARJO JAWA TIMUR <br> INDONESIA 61253
                        </span>
                    </td>
                    <td align="center" valign="top" width="30%">
                        <b>Checked By</b>
                    </td>
                    <td align="center" valign="top" width="33%">
                        <b>Approved By</b>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="bottom" height="70" width="30%">
                        <b>Name;Timestamp (Approval 1)</b><br>
                        <span>jabatan(link with HR)</span>
                    </td>
                    <td align="center" valign="bottom" height="70" width="33%">
                        <b>Name;Timestamp (Approval 2)</b><br>
                        <span>jabatan(link with HR)</span>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="bottom" width="30%">
                    </td>
                    <td align="center" valign="bottom"width="33%">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>