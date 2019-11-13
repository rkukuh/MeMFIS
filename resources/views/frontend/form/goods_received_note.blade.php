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
    #content3{
        margin-top:30px;
    }

    #content3 .head-table{
        border-top:  2px solid  #d4d7db;
        border-bottom:  2px solid  #d4d7db;
    }

    #content3 .body-table{
        height: 175px;
        border-bottom:  2px solid  #d4d7db;
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
                <p style="font-size:40px;color:#34408a"><b>Good Received Notes</b></p>
                <table width="75%" style="font-size:16px;margin-top:-40px;color:#34408a">
                    <tr>
                        <td width="22%" valign="top"><b>GRN No.</b></td>
                        <td width="2%" valign="top">:</td>
                        <td width="76%" valign="top">{{$goodsReceived->number}}</td>
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
                                {{$goodsReceived->receivedBy->first_name." ".$goodsReceived->receivedBy->lat_name}} ; {{$goodsReceived->received_at}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <table width="100%">
                <tr>
                    <td>  <span style="margin-left:6px;">Created By : {{$created_by}} ; {{$goodsReceived->created_at}} &nbsp;&nbsp;&nbsp; Printed By : {{$username}} ; {{ date('Y-m-d H:i:s') }}</span> </td>
                    <td>Form No. : F02-0211</td>
                </tr>
            </table>
            <img src="./img/form/printoutgrn/FooterGRN.png" width="100%" alt="" >
        </footer>


        <div id="content">
            <div class="container">
                <table width="100%" cellpadding="3">
                    <tr>
                        <td valign="top" width="13%"><b>Vendor</b></td>
                        <td valign="top"width="1%">:</td>
                        <td valign="top" width="54%">{{$goodsReceived->purchase_order->vendor->name}}</td>
                        <td valign="top" width="32%" rowspan="6">
                            <div class="barcode">
                                {!!DNS2D::getBarcodeHTML($goodsReceived->number, 'QRCODE',5.6,5.6)!!}
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
                        <td valign="top" width="54%"></td>
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
                        <td width="39%" valign="top">{{$goodsReceived->received_at}}</td>
                        <td width="18%" valign="top"></td>
                        <td width="11%" valign="top"><b>PO No.</b></td>
                        <td width="1%" valign="top">:</td>
                        <td width="20%" valign="top">{{$goodsReceived->purchase_order->number}}</td>
                    </tr>
                    <tr>
                        <td width="10%" valign="top"><b>Storage</b></td>
                        <td width="1%" valign="top">:</td>
                        <td width="39%" valign="top">{{$goodsReceived->storage->name}}</td>
                        <td width="18%" valign="top"></td>
                        <td width="11%" valign="top"><b>PR No.</b></td>
                        <td width="1%" valign="top">:</td>
                        <td width="20%" valign="top">{{$goodsReceived->purchase_order->purchase_request->number}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="content3">
            <div class="head-table">
                <table width="100%" cellpadding="3">
                    <tr>
                        <th valign="top" align="center" width="5%">No</th>
                        <th valign="top" align="center" width="16%">P/N</th>
                        <th valign="top" align="center" width="16%">Serial No.</th>
                        <th valign="top" align="center" width="24%">Item Description</th>
                        <th valign="top" align="center" width="7%">Qty</th>
                        <th valign="top" align="center" width="7%">Unit</th>
                        <th valign="top" align="center" width="14%">Expired Date</th>
                        <th valign="top" align="center" width="11%">Location</th>
                    </tr>
                </table>
            </div>
            <div class="body-table">
                <table width="100%" cellpadding="3">
                    @php $i = 1 ;@endphp
                    @foreach($goodsReceived->items as $item)
                        <tr>
                            <td valign="top" align="center" width="5%">{{$i++}}</td>
                            <td valign="top" align="center" width="16%">{{$item->code}}</td>
                            <td valign="top" align="center" width="16%">{{$item->pivot->serial_number}}</td>
                            <td valign="top" width="24%">{{$item->description}}</td>
                            <td valign="top" align="center" width="7%">{{$item->pivot->quantity}}</td>
                            <td valign="top" align="center" width="7%">{{$item->pivot->unit_id}}</td>
                            <td valign="top" align="center" width="14%">{{$item->pivot->expired_at}}</td>
                            <td valign="top" align="center" width="11%"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div id="content4">
            <div style="margin:0 12px">
                <p style="font-size:14px;">Remark :</p>
                <div class="body">
                    <table width="100%">
                        <tr>
                            <td>{{$goodsReceived->note}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

</body>
</html>
