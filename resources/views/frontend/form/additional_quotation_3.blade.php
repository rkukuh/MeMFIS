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
      height: 1.4cm;
    }
    ul li{
      display: inline-block;
    }

    table{
      border-collapse: collapse;
    }

    #head{
        top:25px;
        left: 455px;
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
        height:190px;
        background:#efefef;
        margin-top:130px;
    }

    #content2{
        width: 100%;
        height: 200px;
        margin-top: 12px;
    }

    #content3 {
        margin-top:-135px;
    }

    #content3 table tr td{
      border-left:  1px solid  #d4d7db;
      border-right:  1px solid  #d4d7db;
      border-top:  1px solid  #d4d7db;
      border-bottom:  1px solid  #d4d7db;
    }


    .page_break { page-break-before: always; }


    footer .num:after { content: counter(page); }

</style>
<body>
    


    <header>
        <img src="./img/form/printoutquotation/HeaderQuotation.png" alt=""width="100%">
        <div id="head">
            <div style="margin-right:20px;text-align:center;">
                <h1 style="font-size:22px;">ADDITIONAL MATERIAL SUMMARY</h1>
            </div>
        </div>
    </header>

    <footer style="margin-top:14px;">
        <span style="margin-left:6px">{{ $quotation->created_at}} &nbsp;&nbsp;&nbsp; Printed By : {{ $username}} ; {{ date('Y-m-d H:i:s') }}</span><span style="position:absolute; right:20px;" >PAGE {{ $page }} of 3 </span>
        <img src="./img/form/printoutquotation/FooterQuotation.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="1" style="margin-top:20px;">
                <tr>
                    <td width="33%" rowspan="5" valign="top">
                       <span style="line-height:20px;">
                            PT. MERPATI MAINTENANCE FACILITY <br> JUANDA INTERNATIONAL AIRPORT <br> JL. RAYA JUANDA NO.16 <br>
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
                        {{ $quotation->quotationable->customer->name}}
                    </td>
                    <td width="33%" rowspan="5" align="center">
                        <div class="barcode">
                            {!!DNS2D::getBarcodeHTML($quotation->number, 'QRCODE',5.6,5.6)!!}
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
                        @if($attention)
                            {{ $attention->phone }} / {{ $attention->fax }}
                        @else
                        -
                        @endif 
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
                        @if($attention)
                            {{ $attention->address }}
                        @else
                            -
                        @endif 
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
                        @if($attention)
                        {{ $attention->name }}
                        @else
                        -
                        @endif 
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
                        {{ $quotation->quotationable->no_wo}} 
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="content2">
        <div class="container">
            <table width="100%" cellpadding="4">
                <tr>
                    <th width="14%" valign="top">Date</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{ date_format($quotation->created_at, 'd-m-Y') }}</td>
                    <th width="14%" valign="top">Project No</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{ $quotation->quotationable->code }}</td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Quotation No.</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{ $quotation->number }}</td>
                    <th width="14%" valign="top">A/C Type</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{ $quotation->quotationable->aircraft->name}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div id="content3">
        <div class="container">
            <table width="100%" border="1" cellpadding="4" >
                <tr style="background:#f7dd16;">
                    <td width="8%" align="center"><b>No</b></td>
                    <td width="15%" align="center"><b>Defect Card No.</b></td>
                    <td width="12%" align="center"><b>P/N No.</b></td>
                    <td width="26%" align="center"><b>Item Description</b></td>
                    <td width="8%" align="center"><b>Qty</b></td>
                    <td width="7%" align="center"><b>Unit</b></td>
                    <td width="12%" align="center"><b>Price</b></td>
                    <td width="14%" align="center"><b>Total</b></td>
                </tr>
                @if(sizeof($items) > 0)
                    @foreach($items as $item)
                        <tr>
                            <td width="8%" align="center" valign="top">{{ $numbering+= 1 }}</td>
                            <td width="15%" align="center" valign="top">{{ $item->defectcard->code }}</td>
                            <td width="12%" align="center" valign="top">{{ $item->item->code }}</td>
                            <td width="26%" valign="top">{{ $item->note }}</td>
                            <td width="8%" align="center" valign="top">{{ $item->quantity }}</td>
                            <td width="7%" align="center" valign="top">{{ $item->unit->name }}</td>
                            <td width="12%" align="center" valign="top">Rp. {{ number_format($item->price_amount, 2, ",", ".") }}</td>
                            <td width="14%" align="center" valign="top"> Rp. {{ number_format($item->subtotal, 2, ",", ".") }}</td>
                        </tr>
                    @endforeach
                    <tr style="background:#f7dd16;">
                        <td colspan="3" align="center"><b>Total Additional Material</b></td>
                        <td align="center" valign="top"><b>Qty Total</b></td>
                        <td align="center" valign="top"><b>{{ number_format($total_item_quantity) }}</b></td>
                        <td align="center" valign="top"><b>Total</b></td>
                        <td colspan="3" align="center" valign="top"><b>Rp. {{ number_format($total_item_price, 2, ",", ".") }}</b></td>
                    </tr>
                @else
                <tr>
                    <td width="100%" align="center" valign="top" colspan="7"><i>No item</i></td>
                </tr>
                <tr style="background:#f7dd16;">
                        <td colspan="3" align="center"><b>Total Additional Material</b></td>
                        <td align="center" valign="top"><b>Qty Total</b></td>
                        <td align="center" valign="top"><b>0</b></td>
                        <td align="center" valign="top"><b>Total</b></td>
                        <td colspan="3" align="center" valign="top"><b>Rp. 0</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</body>
</html>