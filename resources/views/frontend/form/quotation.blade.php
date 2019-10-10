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
        margin-top:-80px;
    }
    #content3 .head{
      font-weight: bold;
      font-size: 14px;
    }

    #content3 .body{
      width: 100%;
      border-left:  2px solid  #d4d7db;
      border-right:  2px solid  #d4d7db;
      border-bottom:  2px solid  #d4d7db;
    }

    #content3-next {
        margin-top:142px;
    }
    #content3-next .head{
      font-weight: bold;
      font-size: 14px;
    }

    #content3-next .body{
      width: 100%;
      min-height: 300px;
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
        margin-top: 20px;
    }


    .page_break { page-break-before: always; }


    footer .num:after { content: counter(page); }

</style>
<body>

    <header>
        <img src="./img/form/printoutquotation/HeaderQuotation.png" alt=""width="100%">
        <div id="head">
            <div style="margin-right:20px;text-align:left;">
                <h1 style="font-size:34px;">QUOTATION</h1>
                <div style="font-size:14px;letter-spacing:1px;margin-top:-15px">
                    <table width="100%">
                        <tr>
                            <td width="20%" valign="top">QN No.</td>
                            <td width="1%" valign="top">:</td>
                            <td width="79%" valign="top">{{$quotation->number}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </header>

    <footer style="margin-top:14px;">
        <span style="margin-left:6px">Created By : {{ $created_by->name }} ; {{$quotation->created_at}} &nbsp;&nbsp;&nbsp; Printed By : {{$username}} ; {{ date('Y-m-d H:i:s') }}</span><span style="position:absolute; right:20px;" class="num">PAGE </span>
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
                        {{$quotation->quotationable->customer->name}}
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
                    @if($attention->phone !== "null"){{ $attention->phone }} @else - @endif/ @if($attention->fax !== "null") {{ $attention->fax }} @else - @endif
                        @else
                        - / -
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
                        @if($attention->address !== "null")
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
                        @if($attention->name !== "null")
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
                        {{$quotation->quotationable->no_wo}}
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
                    <td width="35%" valign="top">{{$quotation->created_at}}</td>
                    <th width="14%" valign="top">Project No</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{$quotation->quotationable->code}}</td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Currency</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{$quotation->currency->name}}</td>
                    <th width="14%" valign="top">A/C Type</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{$quotation->quotationable->aircraft->name}}</td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Exchange Rate</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">Rp. {{number_format($quotation->exchange_rate)}}</td>
                    <th width="14%" valign="top">A/C Reg.</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{$quotation->quotationable->aircraft_register}}</td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Valid Until</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{$quotation->valid_until}}</td>
                    <th width="14%" valign="top">A/C Serial No.</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{$quotation->quotationable->aircraft_sn}}</td>
                </tr>
                <tr>
                    <th width="14%" valign="top">Subject</th>
                    <td width="1%" valign="top">:</td>
                    <td width="35%" valign="top">{{$quotation->quotationable->title}}</td>
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
                <table width="100%" border="1" cellpadding="4">
                    <tr style="background:#f7dd16;">
                        <td width="8%" align="center">No</td>
                        <td width="42%" align="center">Description</td>
                        <td width="16%" align="center">Sub Total</td>
                        <td width="17%" align="center">Disc</td>
                        <td width="17%" align="center">Total</td>
                    </tr>
                </table>
            </div>
            @if(sizeof($quotation->workpackages->toArray()) <= 2)
                <div class="body" style="min-height:120px">
            @else
                <div class="body" style="height: 458px;">
            @endif
                <table width="100%" cellpadding="4">
                    @php
                        $i = 1;
                        $subtotal = $total = 0;
                    @endphp
                    @for($a = 0 ; $a<=3 && $a < sizeof($jobRequest); $a++)
                    @php

                    @endphp
                    <tr>
                        <td width="8%" align="center" valign="top">{{$i++}}</td>
                        <td width="42%" align="left" valign="top">
                            @if(isset($jobRequest[$a]->jobrequest_description))
                                {{$jobRequest[$a]->jobrequest_description}}
                            @else
                                No Description
                            @endif
                        </td>
                        <td width="16%" align="center" valign="top"></td>
                        <td width="17%" align="center" valign="top"></td>
                        <td width="17%" align="right" valign="top"></td>
                    </tr>
                    <tr>
                        <td width="8%" align="center" valign="top"></td>
                        <td width="42%" align="left" valign="top">- Manhours Price :{{$jobRequest[$a]->total_manhours_with_performance_factor}} x {{ number_format($jobRequest[$a]->jobrequest_manhour_rate_amount, 2) }}</td>
                        <td width="16%" align="center" valign="top"> {{$quotation->currency->symbol}}. {{ number_format($jobRequest[$a]->total_manhours_with_performance_factor*$jobRequest[$a]->jobrequest_manhour_rate_amount, 2) }}</td>

                        @if($jobRequest[$a]->jobrequest_discount_value == null && $jobRequest[$a]->jobrequest_discount_type== null)
                        <td width="17%" align="center" valign="top"></td>
                        @else
                            @if($jobRequest[$a]->jobrequest_discount_type==  'amount')
                            <td width="17%" align="center" valign="top">{{$quotation->currency->symbol}}. {{ number_format($jobRequest[$a]->jobrequest_discount_value, 2) }}</td>
                            @elseif($jobRequest[$a]->jobrequest_discount_type== 'percentage'){
                            <td width="17%" align="center" valign="top">{{ $jobRequest[$a]->jobrequest_discount_value }}%</td>
                            @endif
                        @endif
                            <td width="17%" align="right" valign="top">{{$quotation->currency->symbol}}. {{ number_format($jobRequest[$a]->total_manhours_with_performance_factor * $jobRequest[$a]->jobrequest_manhour_rate_amount + $jobRequest[$a]->facilities_price_amount + $jobRequest[$a]->mat_tool_price, 2) }}</td>
                    </tr>
                    <tr>
                        <td width="8%" align="center" valign="top"></td>
                        <td width="42%" align="left" valign="top">- Material Price</td>
                        <td width="16%" align="center" valign="top">
                            @if($jobRequest[$a]->mat_tool_price)
                                {{$quotation->currency->symbol}}. {{number_format($jobRequest[$a]->mat_tool_price, 2)}}
                            @else
                                -
                            @endif
                        </td>
                        <td width="17%" align="center" valign="top"></td>
                        <td width="17%" align="right" valign="top"></td>
                    </tr>
                    <tr>
                        <td width="8%" align="center" valign="top"></td>
                        <td width="42%" align="left" valign="top">- Facilities Price</td>
                        <td width="16%" align="center" valign="top">
                            @if($jobRequest[$a]->facilities_price_amount)
                                {{$quotation->currency->symbol}}. {{number_format($jobRequest[$a]->facilities_price_amount, 2)}}
                            @else
                                -
                            @endif
                        </td>
                        <td width="17%" align="center" valign="top"></td>
                        <td width="17%" align="right" valign="top"></td>
                    </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
    @if(sizeof($quotation->workpackages->toArray())<=2)
    <div id="content4">
        <div class="container">
            <table width="100%" cellpadding="3">
                <tr>
                    <td width="50%" rowspan="6" valign="top"><b>Term & Condition</b><br>
                        @if(isset($quotation->term_of_condition))
                            {{$quotation->term_of_condition}}
                        @else   
                            -
                        @endif
                    </td>
                    <td width="25%" valign="top" align="left">Total</td>
                    <td width="25%" valign="top" align="right">{{ $quotation->currency->symbol }} {{ number_format( $subTotal, 2) }}</td>
                </tr>
                <tr>
                    <td width="25%" valign="top" align="left">Disc</td>
                    <td width="25%" valign="top" align="right">-{{ $quotation->currency->symbol }} {{ number_format($discount, 2) }}</td>
                </tr>
                @if($totalCharge > 0)
                <tr>
                    <td width="25%" valign="top" align="left">Delivery Cost</td>
                    <td width="25%" valign="top" align="right">{{ $quotation->currency->symbol }} {{ number_format($totalCharge, 2) }}</td>
                </tr>
                @endif
                <tr>
                    <th width="25%" valign="top" align="left">Grand Total in USD</th>
                    <th width="25%" valign="top" align="right">{{ $quotation->currency->symbol }} {{ number_format($subTotal + $totalCharge - $discount, 2) }}</th>
                </tr>
                <tr>
                    <th width="25%" valign="top" align="left">Grand Total in Rupiah</th>
                    <th width="25%" valign="top" align="right">Rp. {{ number_format( ($subTotal + $totalCharge - $discount) * $quotation->exchange_rate, 2) }}</th>
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
                        <b> {{ $username }}</b><br>
                        
                    </td>
                    <td width="50%" align="center">
                        @if(isset($quotation->approvals->last()->note))
                        <b> {{ $quotation->approvals->last()->note }} </b><br>
                        @endif
                        <b> {{ $quotation->quotationable->customer->name }} </b><br>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @endif

    @if(sizeof($quotation->workpackages->toArray())>2)
    <div class="page_break">
        <div id="content3-next">
            <div class="container">
                <div class="head">
                    <table width="100%" border="1" cellpadding="4">
                        <tr style="background:#f7dd16;">
                            <td width="8%" align="center">No</td>
                            <td width="42%" align="center">Description</td>
                            <td width="16%" align="center">Sub Total</td>
                            <td width="17%" align="center">Disc</td>
                            <td width="17%" align="center">Total</td>
                        </tr>
                    </table>
                </div>
                <div class="body">
                    <table width="100%" cellpadding="4">
                        @php
                            $i = $a+1;
                        @endphp
                        @for($b = 4 ;$b<(sizeof($jobRequest->toArray())); $b++)
                        <tr>
                            <td width="8%" align="center" valign="top">{{$i++}}</td>
                            <td width="42%" align="left" valign="top">
                                @if(isset($jobRequest[$b]->jobrequest_description))
                                    {{$jobRequest[$b]->jobrequest_description}}
                                @else
                                    No Description
                                @endif
                            </td>
                            <td width="16%" align="center" valign="top"></td>
                            <td width="17%" align="center" valign="top"></td>
                            <td width="17%" align="right" valign="top"></td>
                        </tr>
                        <tr>
                            <td width="8%" align="center" valign="top"></td>
                            <td width="42%" align="left" valign="top">- Manhours Price :{{$jobRequest[$b]->total_manhours_with_performance_factor}} x {{ number_format($jobRequest[$b]->jobrequest_manhour_rate_amount, 2)}}</td>
                            <td width="16%" align="center" valign="top">{{$quotation->currency->symbol}}. {{ number_format($jobRequest[$b]->total_manhours_with_performance_factor*$jobRequest[$b]->jobrequest_manhour_rate_amount, 2)}}</td>

                            @if($jobRequest[$b]->jobrequest_discount_value == null && $jobRequest[$b]->jobrequest_discount_type== null)
                            <td width="17%" align="center" valign="top"></td>
                            @else
                                @if($jobRequest[$b]->jobrequest_discount_type==  'amount')
                                <td width="17%" align="center" valign="top">{{$quotation->currency->symbol}}. {{ number_format($jobRequest[$b]->jobrequest_discount_value, 2) }}</td>
                                @elseif($jobRequest[$b]->jobrequest_discount_type== 'percentage'){
                                <td width="17%" align="center" valign="top">{{ $jobRequest[$b]->jobrequest_discount_value }}%</td>
                                @endif
                            @endif
                            <td width="17%" align="right" valign="top">{{$quotation->currency->symbol}}. {{ number_format($jobRequest[$a]->total_manhours_with_performance_factor * $jobRequest[$a]->jobrequest_manhour_rate_amount + $jobRequest[$a]->facilities_price_amount + $jobRequest[$a]->mat_tool_price, 2) }}</td>
                        </tr>
                        <tr>
                            <td width="8%" align="center" valign="top"></td>
                            <td width="42%" align="left" valign="top">- Material Price</td>
                            <td width="16%" align="center" valign="top">
                                @if($jobRequest[$b]->mat_tool_price)
                                    {{$quotation->currency->symbol}}. {{number_format($jobRequest[$b]->mat_tool_price, 2)}}
                                @else
                                    -
                                @endif
                            </td>
                            <td width="17%" align="center" valign="top"></td>
                            <td width="17%" align="right" valign="top"></td>
                        </tr>
                        <tr>
                            <td width="8%" align="center" valign="top"></td>
                            <td width="42%" align="left" valign="top">- Facilities Price</td>
                            <td width="16%" align="center" valign="top">
                                @if($jobRequest[$b]->facilities_price_amount)
                                    {{$quotation->currency->symbol}}. {{number_format($jobRequest[$b]->facilities_price_amount, 2)}}
                                @else
                                    -
                                @endif
                            </td>
                            <td width="17%" align="center" valign="top"></td>
                            <td width="17%" align="right" valign="top"></td>
                        </tr>
                        @endfor
                    </table>
                </div>
            </div>
        </div>
        <div id="content4">
            <div class="container">
                <table width="100%" cellpadding="3">
                    <tr>
                        <th width="50%" rowspan="6" valign="top">Term & Condition <br></th>
                        <td width="25%" valign="top" align="left">Total</td>
                        <td width="25%" valign="top" align="right">{{ $quotation->currency->symbol }} {{ number_format( $subTotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top" align="left">Disc</td>
                        <td width="25%" valign="top" align="right">-{{ $quotation->currency->symbol }} {{ number_format($discount, 2) }}</td>
                    </tr>
                    @if($totalCharge > 0)
                    <tr>
                        <td width="25%" valign="top" align="left">Delivery Cost</td>
                        <td width="25%" valign="top" align="right">{{ $quotation->currency->symbol }} {{ number_format($totalCharge, 2) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th width="25%" valign="top" align="left">Grand Total in USD</th>
                        <th width="25%" valign="top" align="right">{{ $quotation->currency->symbol }} {{ number_format($subTotal + $totalCharge - $discount, 2) }}</th>
                    </tr>
                    <tr>
                        <th width="25%" valign="top" align="left">Grand Total in Rupiah</th>
                        <th width="25%" valign="top" align="right">Rp. {{ number_format( ($subTotal + $totalCharge - $discount) * $quotation->exchange_rate, 2) }}</th>
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
                            <b> {{ $username }}</b><br>
                        </td>
                        <td width="50%" align="center">
                            @if(isset($quotation->approvals->last()->note))
                            <b> {{ $quotation->approvals->last()->note }} </b><br>
                            @else
                            <b> {{ $quotation->quotationable->customer->name }} </b><br>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endif

</body>
</html>
