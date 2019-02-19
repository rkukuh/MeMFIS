<!-- inputan dari task card -->
<html>
<head>
    <style>
        td {
            font-size: 14px;
            /* text-align:center; */
        }
    </style>
</head>
<body>
    <table  width="100%" style="margin: 0px;">
        <tr>
            <th colspan="1" width="35%" height="60">
                    <img src="img/LogoMMF.png" alt="logo" height="100%" style="margin-bottom:-20px">
            </th>
            <th colspan="7" width="65%" height="60">
                    <h1>Purchase Request</h1>
            </th>
        </tr>
    </table>
    <br>
    <table  width="100%">
        <tr>
            <td width="20%">
                <b>Purchase Request No</b>
            </td>
            <td width="30%">
                : 001/PR/HM-MMF/01/19
            </td>
            <td width="20%"></td>
            <td width="15%">
                <b>Ref. Project No</b>
            </td>
            <td width="15%">
                : Project 001
            </td>
        </tr>
        <tr>
            <td width="20%">
                <b>Date </b>
            </td>
            <td width="30%">
                : 06/01/2019
            </td>
            <td width="20%"></td>
            <td width="15%">
                <b>Date Required</b>
            </td>
            <td width="15%">
                : 10/01/2019
            </td>
        </tr>
        <tr>
            <td width="20%">
                <b>A/C Type</b>
            </td>
            <td width="30%">
                : F27
            </td>
            {{-- <td width="50%"></td> --}}
        </tr>


    </table>
    <br>

    <table width="100%" border="1px" style="margin: 0px;border-collapse: collapse;">
        <tr>
            <th  width="5%" bgcolor="#D3D3D3">
                <center>NO</center>
            </th>
            <th  width="14%" bgcolor="#D3D3D3">
                <center>P/N</center>
            </th>
            <th  width="35%" bgcolor="#D3D3D3">
                <center>Item</center>
            </th>
            <th  width="7%" bgcolor="#D3D3D3">
                <center>Qty</center>
            </th>
            <th  width="14%" bgcolor="#D3D3D3">
                <center>Unit</center>
            </th>
            <th  width="35%" bgcolor="#D3D3D3">
                <center>Description</center>
            </th>
        </tr>

        <tr>
            <td><center> 1. </center></td>
            <td><center>1234</center></td>
            <td><center>Item A</center></td>
            <td><center>2</center></td>
            <td>
                <center>
                    Pcs
                </center>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td><center> 2. </center></td>
            <td><center>5678</center></td>
            <td><center>Item B</center></td>
            <td><center>4</center></td>
            <td>
                <center>
                    Box
                </center>
            </td>
            <td>
            </td>
        </tr>


    </table>

    <br>

    <p>REMARKS :</p>
    <table  width="100%">
        <tr>
            <td height="60">
                <div style="margin-bottom:50px;">{!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE')!!}</div></br>
                {{-- <div style="margin-bottom:50px;">{!!DNS1D::getBarcodeHTML('JO-1151596', 'S25')!!}</div></br> --}}
                {{-- <div style="margin-bottom:50px;">{!!DNS1D::getBarcodeHTML('JO-1151596', 'I25')!!}</div></br> --}}
                {{-- <div style="margin-bottom:50px;">{!!DNS1D::getBarcodeHTML('JO-1151596', 'MSI+')!!}</div></br> --}}

            </td>
        </tr>
    </table>
    <br>
    <br>
    <table width="100%">
        <tr>
            <td width="10%"></td>
            <td width="30%">
                <center><b>Prepared By</b></center>
            </td>
            <td width="20%"></td>
            <td width="30%">
                <center><b>Approved By</b></center>
            </td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="100%" colspan="5" height="60"></td>
        </tr>
        <tr>
            <td width="10%"></td>
            <td width="30%">
                <center>(Name)</center>
            </td>
            <td width="20%"></td>
            <td width="30%">
                <center>(Name)</center>
            </td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="10%"></td>
            <td width="30%">
                <center>@php
                    echo date("d/m/Y");
                 @endphp</center>
            </td>
            <td width="20%"></td>
            <td width="30%">
                <center>@php
                    echo date("d/m/Y");
                 @endphp</center>
            </td>
            <td width="10%"></td>
        </tr>
    </table>

    {{-- <table width="100%" border="1px" style="margin: 0px;border-collapse: collapse;">
        <tr>
            <td width="12%"> A. Routine</td>
            <td width="40%">Basic C07 (414 Tasks)</td>
            <td width="12%">258.87</td>
            <td width="12%">.....</td>
            <td width="12%">.....</td>
            <td width="12%">.....</td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>B. AD/SB </td>
            <td>AD/SB (31 Task)</td>
            <td>979.40</td>
            <td>.....</td>
            <td>.....</td>
            <td>.....</td>
        </tr>
        <tr>
            <td height="15"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>C. STC</td>
            <td>STC Items (35 Tasks)</td>
            <td>107.00</td>
            <td>.....</td>
            <td>.....</td>
            <td>.....</td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>D. HTC</td>
            <td>Hard Time Component items (33 Tasks)</td>
            <td>43.10</td>
            <td>.....</td>
            <td>.....</td>
            <td>.....</td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        <tr>
            <td>E. Access</td>
            <td>Access Panel</td>
            <td>60.99</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>F. Additional</td>
            <td>EA Non AD (30 Tasks)</td>
            <td>34.30</td>
            <td>.....</td>
            <td>....</td>
            <td>....</td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>>>>TOTAL</td>
            <td><b>1483.66</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>ADDITIONAL</b></td>
            <td>EST Defect Finding</td>
            <td>370.92</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td height="15"> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td> </td>
            <td>>>>TOTAL</td>
            <td>370.92</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td> </td>
            <td>>>>SUB TOTAL</td>
            <td>1854.58</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>
    <br>
    <table width="100%">
        <tr>
            <td colspan="2" colspan="52%">Total MHRS Package (without "Performance Factor" & "Allowance") </td>
            <td width="12%">1854.58</td>
            <td width="12%"></td>
            <td width="12%"></td>
            <td width="12%"></td>
        </tr>
        <tr>
            <td colspan="2" colspan="52%">Prod. Planner recommendation with Performance Factor = 1.33& Allowance =1.20
            </td>
            <td width="12%">2,967.32</td>
            <td width="12%"></td>
            <td width="12%"></td>
            <td width="12%"></td>
        </tr>
        <tr>
            <td width="12%"> </td>
            <td width="40%">Turn Around Time (T.A.T) >>>>>> </td>
            <td width="12%">23.55 Work days</td>
            <td width="12%"></td>
            <td width="12%"></td>
            <td width="12%"></td>
        </tr>

    </table>
    <table width="100%">
        <tr>
            <td width="20%"><u>NOTE :</u> </td>
            <td width="7%"> </td>
            <td width="20%"></td>
            <td width="12%"></td>
            <td width="7%"></td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="20%">workhour scheduled (hr) </td>
            <td width="7%"> 8</td>
            <td width="20%">Total Manpower</td>
            <td width="12%"></td>
            <td width="7%">27</td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="20%">lost time (hr) </td>
            <td width="7%"> 2</td>
            <td width="20%"></td>
            <td width="12%">A/P Pers.</td>
            <td width="7%">1</td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="20%">allowance</td>
            <td width="7%">20% </td>
            <td width="20%"></td>
            <td width="12%">ERI Pers.</td>
            <td width="7%">5</td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="20%"> </td>
            <td width="7%"> </td>
            <td width="20%"></td>
            <td width="12%">REP Pers.</td>
            <td width="7%">5</td>
            <td width="34%"></td>
        </tr>

        <tr>
            <td width="20%"> </td>
            <td width="7%"> </td>
            <td width="20%"></td>
            <td width="12%">CAB Pers.</td>
            <td width="7%">1</td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="20%"></td>
            <td width="7%"> </td>
            <td width="20%"></td>
            <td width="12%">Shop Pers.</td>
            <td width="7%">5</td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="27%" colspan="2">Date Compiled : March 9, 2018</td>
            <td width="20%"></td>
            <td width="12%"></td>
            <td width="7%"></td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="27%" colspan="2">Compiled By Ali Sadikin</td>
            <td width="20%"></td>
            <td width="12%"></td>
            <td width="7%"></td>
            <td width="34%"></td>
        </tr>
        <tr>
            <td width="27%" colspan="2">Approved By L Thatut CR</td>
            <td width="20%"></td>
            <td width="12%"></td>
            <td width="7%"></td>
            <td width="34%"></td>
        </tr>
    </table> --}}
</body>
</html>
