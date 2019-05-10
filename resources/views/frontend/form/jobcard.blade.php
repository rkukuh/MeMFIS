<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Card - Routine</title>

    <head>
        <style>
            body{
                /* background-image: url("img/form/bg-jo.png"); */
            }
            td {
                font-size: 14px;
                margin-bottom: 5px;
                margin-top: 5px;
                padding-top: 10px;
                /* text-align:center; */
            }

            .override {
                color: white !important;
            }

            .nmtb {
                margin-top: 0px;
                margin-bottom: 0px;
            }

            .grid-container {
                display: grid;
                grid-row-gap: 50px;
                grid-template-columns: auto auto auto;
                background-color: #2196F3;
                padding: 10px;
            }

            .grid-item {
                background-color: rgba(255, 255, 255, 0.8);
                border: 1px solid rgba(0, 0, 0, 0.8);
                padding: 20px;
                font-size: 30px;
                text-align: center;
            }
        </style>
    </head>

<body>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <img src="img/form/bg-jo.png" height="50px" alt="">
                <table width="100%" height="50px" style="margin: 0px;" bordercolor="#17acbf">
                    <tr bgcolor="#17acbf">
                        <td width="20%"></td>
                        <td width="20%"></td>
                        <td width="20%"></td>
                        <td width="20%" style="background-color:white; text-align:center; ">
                            <h1 class="nmtb">Job Card <br></h1>
                            <h3 class="nmtb">( Routine )</h3>
                        </td>
                        <td width="20%"></td>
                    </tr>
                </table>
                <fieldset class="grid-item">
                    <legend>JC NO : #######</legend>
                    <table width="100%">
                        <tr>
                            <td>Issues Date</td>
                            <td>: Generated</td>
                            <td>Inspection Type</td>
                            <td>: Generated</td>
                            <!-- <td rowspan="4" style=" text-align: center;">{!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE', 7 ,7)!!}</td> -->
                        </tr>
                        <tr>
                            <td>Issues Date</td>
                            <td>: Generated</td>
                            <td>Inspection Type</td>
                            <td>: Generated</td>
                        </tr>
                        <tr>
                            <td>Issues Date</td>
                            <td>: Generated</td>
                            <td>Inspection Type</td>
                            <td>: Generated</td>
                        </tr>
                        <tr>
                            <td>Issues Date</td>
                            <td>: Generated</td>
                            <td>Inspection Type</td>
                            <td>: Generated</td>
                        </tr>
                    </table>
                </fieldset>
                <center class="grid-item">{!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',5 ,5)!!}</center>


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