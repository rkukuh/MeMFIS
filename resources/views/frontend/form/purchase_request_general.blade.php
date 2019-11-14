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
                    <td width="69%" valign="top">{{$purchaseRequest->number}}</td>
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
                            {{$created_by}} ; {{$purchaseRequest->created_at}}
                        </td>
                        <td width="50%" align="center">
                            @if(sizeOf($purchaseRequest->approvals)<>0)
                                {{$purchaseRequest->approvals->first()->conductedBy->first_name." ".$purchaseRequest->approvals->first()->conductedBy->last_name." ; ".$purchaseRequest->approvals->first()->created_at}}
                            @else
                            Name ; Timestamp
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <span style="margin-left:6px;">Created By : {{$created_by}} ; {{$purchaseRequest->created_at}} &nbsp;&nbsp;&nbsp; Printed By : {{$username}} ; {{ date('Y-m-d H:i:s') }}</span>
        <img src="./img/form/printoutpurchase-request/FooterPurchaseRequest.png" width="100%" alt="" >
    </footer>

    <div id="content">
        <div class="container">
            <table width="100%" cellpadding="6" style="font-size:15px;">
                <tr>
                    <td valign="top" width="20%"></td>
                    <td valign="top"width="1%"></td>
                    <td valign="top" width="47%"></td>
                    <td width="32%" rowspan="4">
                        <div class="barcode">
                            {!!DNS2D::getBarcodeHTML($purchaseRequest->number, 'QRCODE',4.5,4.5)!!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="20%">Date</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="47%">{{$purchaseRequest->requested_at}}</td>
                </tr>
                <tr>
                    <td valign="top" width="20%">Date Required</td>
                    <td valign="top"width="1%">:</td>
                    <td valign="top" width="47%">{{$purchaseRequest->required_at}}</td>
                </tr>
                <tr>
                    <td valign="top" width="20%"></td>
                    <td valign="top"width="1%"></td>
                    <td valign="top" width="47%"></td>
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
                @php
                    $i = 1;
                @endphp
                @foreach($items as $item)
                    <tr>
                        <td valign="top" align="center" width="6%">{{$i++}}</td>
                        <td valign="top" align="center" width="21%">{{$item->item->code}}</td>
                        <td valign="top" width="31%">{{$item->item->description}} </th>
                        <td valign="top" align="center" width="8%">{{$item->quantity}}</td>
                        <td valign="top" align="center" width="8%">{{$item->unit->name}}</td>
                        <td valign="top" width="26%">{{$item->note}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div id="content3">
        <div class="container">
            <p style="font-size:14px;">Description :</p>
            <div class="body">
                <table width="100%">
                    <tr>
                        <td>{{$purchaseRequest->description}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
