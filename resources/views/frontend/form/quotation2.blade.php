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

    .barcode{
      margin-left:70px;
      margin-top: -12px;
    }

    #header .quotation-number{
      height: 50px;
      width: 300px;
      float: right;
      color: white;
      position: relative;
    }

    #header .quotation-number h1{
      font-size: 35px;
    }

    #content{
        width:100%;
        height:190px;
        background:#efefef;
        margin-top:10px;
    }

    #content2{
        width: 100%;
        height: 200px;
        margin-top: 12px;
    }

</style>
<body>
    <div id="header">
        <img src="./img/form/printoutquotation/HeaderQuotation.jpg" alt=""width="100%">
        <div class="quotation-number">
            <h1>QUOTATION</h1>
            <div style="height:20px;width:220px;position:absolute;top:70px;font-size:14px;letter-spacing: 1px">
                <table width="100%">
                    <tr>
                        <td width="25%" valign="top">QN No.</td>
                        <td width="1%" valign="top">:</td>
                        <td width="74%" valign="top">001/QN/PJ-MMF/05/19</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="1" style="margin-top:20px;">
                <tr>
                    <td width="33%" rowspan="5" valign="top">
                       <span style="line-height:20px;">
                            PT. MERPATI MAINTANANCE FACILITY <br> JUANDA INTERNASIONAL AIRPORT <br> JL. RAYA JUANDA NO.16 <br>
                            BETRO,SEDATI SIDOARJO JAWA TIMUR <br> INDONESIA 61253 <br> 
                            <span style="line-height:20px;">TELP &nbsp; : 031-8686481</span> <br>
                            <span style="line-height:20px;">FAX &nbsp;&nbsp; : 031-8686500</span> <br>    
                       </span>
                    </td>
                    <th width="9%" valign="top">
                        To
                    </th>
                    <td width="1%" valign="top">
                        :
                    </td>
                    <td width="23%" valign="top">
                        PT. MAJU MUNDUR
                    </td>
                    <td width="33%" rowspan="5" align="center">
                            <div class="barcode">
                                {!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',5.6,5.6)!!}    
                            </div> 
                    </td>
                </tr>
                <tr>
                    <th width="9%" valign="top">
                        Telp/Fax
                    </th>
                    <td width="1%" valign="top">
                        :
                    </td>
                    <td width="23%" valign="top">
                        031-8686481/031-8686482
                    </td>
                </tr>
                <tr>
                    <th width="9%" valign="top">
                        Address
                    </th>
                    <td width="1%" valign="top">
                        :
                    </td>
                    <td width="23%" valign="top">
                        JL. RAYA INDONESIA
                    </td>
                </tr>
                <tr>
                    <th width="9%" valign="top">
                        Attn
                    </th>
                    <td width="1%" valign="top">
                        :
                    </td>
                    <td width="23%" valign="top">
                        Bp. Dwi Iswantoro
                    </td>
                </tr>
                <tr>
                    <th width="9%" valign="top">
                        Ref WO
                    </th>
                    <td width="1%" valign="top">
                        :
                    </td>
                    <td width="23%" valign="top">
                        Nomor Work Order
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="content2">
        <div class="container">
            <table width="100%" cellpadding="7">
                <tr>
                    <th width="14%" valign="top">Date</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                    <th width="14%" valign="top">Project No</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Currency</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                    <th width="14%" valign="top">A/C Type</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Exchange Rate</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                    <th width="14%" valign="top">A/C Reg.</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Valid Until</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                    <th width="14%" valign="top">A/C Serial No.</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top"></td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Subject</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">Isi subject adalah title project</td>
                    <td width="14%" valign="top"></td>
                    <td width="1%" valign="top"></td>
                    <td width="35%" valign="top"></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>