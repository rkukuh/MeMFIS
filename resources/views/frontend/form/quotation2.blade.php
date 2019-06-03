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

    #content3 {
        margin-top:-60px;
    }
    #content3 .head{
      font-weight: bold;
      font-size: 14px;
    }

    #content3 .body{
      width: 100%;
      min-height: 138px;
      border-left:  2px solid  #d4d7db;
      border-right:  2px solid  #d4d7db;
      border-bottom:  2px solid  #d4d7db;
    }

    #content4 {
        margin-top:12px;
    }

    #content5{
        height:60px;
        width:100%;
        padding-top: 20px;
        margin-top: 50px;
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
    <div id="content3">
        <div class="container">
            <div class="head">
                <table width="100%" border="1" cellpadding="10">
                    <tr style="background:#f7dd16;">
                        <td width="8%" align="center">No</td>
                        <td width="42%" align="center">Description</td>
                        <td width="16%" align="center">Sub Total</td>
                        <td width="17%" align="center">Disc %</td>
                        <td width="17%" align="center">Total</td>
                    </tr>
                </table>
            </div>
            <div class="body">
                <table width="100%" cellpadding="5">
                    <tr>
                        <td width="8%" align="center" valign="top">1</td>
                        <td width="42%" align="left" valign="top">Job Request Description yang diinput marketing</td>
                        <td width="16%" align="center" valign="top"></td>
                        <td width="17%" align="center" valign="top"></td>
                        <td width="17%" align="right" valign="top"></td>
                    </tr> 
                    <tr>
                        <td width="8%" align="center" valign="top"></td>
                        <td width="42%" align="left" valign="top">- Manhours Price : 1.250 x $18</td>
                        <td width="16%" align="center" valign="top">$22.500</td>
                        <td width="17%" align="center" valign="top"></td>
                        <td width="17%" align="right" valign="top">$22.500</td>
                    </tr> 
                    <tr>
                        <td width="8%" align="center" valign="top"></td>
                        <td width="42%" align="left" valign="top">- Material Price</td>
                        <td width="16%" align="center" valign="top">$2.500</td>
                        <td width="17%" align="center" valign="top"></td>
                        <td width="17%" align="right" valign="top">$2.500</td>
                    </tr> 
                    <tr>
                        <td width="8%" align="center" valign="top"></td>
                        <td width="42%" align="left" valign="top">- Facilities Price</td>
                        <td width="16%" align="center" valign="top">$2.500</td>
                        <td width="17%" align="center" valign="top"></td>
                        <td width="17%" align="right" valign="top">$2.500</td>
                    </tr> 
                </table>
            </div>
        </div>
    </div>
    <div id="content4">
        <div class="container">
            <table width="100%" cellpadding="3">
                <tr>
                    <th width="50%" rowspan="7" valign="top">Term & Condition</th>
                    <td width="25%" valign="top" align="left">Total</td>
                    <td width="25%" valign="top" align="right">$25.000</td>
                </tr>
                <tr>
                    <td width="25%" valign="top" align="left">Disc</td>
                    <td width="25%" valign="top" align="right">$ / %</td>
                </tr>
                <tr>
                    <td width="25%" valign="top" align="left">Vat 10%</td>
                    <td width="25%" valign="top" align="right">$000</td>
                </tr>
                <tr>
                    <td width="25%" valign="top" align="left">Delivery Cost</td>
                    <td width="25%" valign="top" align="right">$52</td>
                </tr>
                <tr>
                    <td width="25%" valign="top" align="left">Other Cost(if available)</td>
                    <td width="25%" valign="top" align="right">$000 <hr width="100%"></td>
                </tr>
                <tr>
                    <th width="25%" valign="top" align="left">Grand Total in USD</th>
                    <th width="25%" valign="top" align="right">$2.100.000</th>
                </tr>
                <tr>
                    <th width="25%" valign="top" align="left">Grand Total in Rupiah</th>
                    <th width="25%" valign="top" align="right">Rp. 2.321.000.000</th>
                </tr>
            </table>
        </div>
    </div>
    <div id="content5">
        <div class="container">
            <table width="100%">
                <tr>
                    <th width="50%" align="center">
                        Actnowledge by,
                    </th>
                    <th width="50%" align="center">
                        Approved by,
                    </th>
                </tr>
            </table>
            <table style="margin-top:80px;" width="100%">
                <tr>
                    <td width="50%" align="center">
                        <b> EDDY SIREGAR</b><br>
                        Marketing Manager
                    </td>
                    <td width="50%" align="center">
                        <b> EDDY SIREGAR </b><br>
                        Sriwijaya Air
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div style="position:absolute;bottom:0;">
        <div class="container">
        </div>
        <img src="./img/form/printoutquotation/FooterQuotation.jpg" width="100%" alt="" srcset="">
    </div>
        
</body>
</html>