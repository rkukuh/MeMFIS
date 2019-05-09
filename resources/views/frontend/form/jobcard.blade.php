<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <head>
        <style>
            td {
                font-size: 10px;
                /* text-align:center; */
            }

            .override {
                color: white !important;
            }

            .nmtb{
                margin-top:0px; margin-bottom:0px;
            }

        </style>
    </head>

<body>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <table height="100px"  style="margin: 0px;">
                    <tr>
                        <th rowspan="3" colspan="1" width="20%" height="50px" class="center" style="padding-right:20px">
                            <img src="{{asset('img/LogoMMF.png')}}" alt="logo" height="100%" style="margin: 10px 10px 10px 10px;">
                        </th>
                        <th colspan="7" style="border-left: solid;" class="ntnb">
                            <p style="margin-left:25px; " class="nmtb">Juanda International Airport, Sidoarjo, Indonesia</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="7" style="border-left: solid;" class="ntnb">
                            <p style="margin-left:25px; " class="nmtb">Phone : 031-1234567 Fax : 031-1234567</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="7" style="border-left: solid;" class="ntnb">
                            <p style="margin-left:25px; " class="nmtb">Email : Marketing@ptmmf.co.id</p>
                        </th>
                    </tr>
                </table>
                <table width="100%" height="50px" style="margin: 0px;" bordercolor="#17acbf" >
                    <tr bgcolor="#17acbf">
                        <td width="20%"></td>
                        <td width="20%" ></td>
                        <td width="20%"></td>
                        <td width="20%" style="background-color:white; text-align:center; ">
                            <h1 class="nmtb">Job Card <br></h1><h3 class="nmtb">( Routine )</h3>
                        </td>
                        <td width="20%"></td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td width="20%" rowspan="">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nihil porro tempora animi. Maxime placeat natus laudantium rerum aspernatur vero accusamus debitis dolorem velit delectus!</td>
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
                    </tr>
                </table>
                <br>

                <table width="100%" border="1px" style="margin: 0px;border-collapse: collapse;">
                    <tr>
                        <th width="5%" bgcolor="#D3D3D3">
                            <center>NO</center>
                        </th>
                        <th width="14%" bgcolor="#D3D3D3">
                            <center>P/N</center>
                        </th>
                        <th width="35%" bgcolor="#D3D3D3">
                            <center>Item</center>
                        </th>
                        <th width="7%" bgcolor="#D3D3D3">
                            <center>Qty</center>
                        </th>
                        <th width="14%" bgcolor="#D3D3D3">
                            <center>Unit</center>
                        </th>
                        <th width="35%" bgcolor="#D3D3D3">
                            <center>Description</center>
                        </th>
                    </tr>

                    <tr>
                        <td>
                            <center> 1. </center>
                        </td>
                        <td>
                            <center>1234</center>
                        </td>
                        <td>
                            <center>Item A</center>
                        </td>
                        <td>
                            <center>2</center>
                        </td>
                        <td>
                            <center>
                                Pcs
                            </center>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center> 2. </center>
                        </td>
                        <td>
                            <center>5678</center>
                        </td>
                        <td>
                            <center>Item B</center>
                        </td>
                        <td>
                            <center>4</center>
                        </td>
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
                <table width="100%">
                    <tr>
                        <td height="60">
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
            </div>
        </div>
    </div>
</body>

</html>