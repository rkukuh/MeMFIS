<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Card - Routine</title>

    <head>
        <style>
            @page {
                margin: 0px;
            }

            body {
                margin: 0px;
            }

            .m-content {
                margin: 22px;
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

            .footer {
                position: fixed;
                left: 0;
                bottom: 70;
                text-align: center;
            }

            .header {
                left: 0;
                top: 0;
                width: 100%;
                text-align: center;
            }

            .center {
                text-align: center;
            }

            tr.border {
                outline: thin solid;
            }
        </style>
    </head>

<body>
    <img src="img/form/header.jpg" class="header" width="100%" alt="">
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <fieldset style="width:60%;">
                    <legend>JC NO : {{ $jobCard->jobcardable->eo_header->number }}<legend>
                    <table width="100%">
                        <tr>
                            <td>Issues Date</td>
                            <td>: Generated</td>
                            <td>Inspection Type</td>
                            <td>: Generated</td>
                            <!-- <td rowspan="4" style=" text-align: center;">{!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE', 7 ,7)!!}</td> -->
                        </tr>
                        <tr>
                            <td>Prepared Date</td>
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
                <div>{!!DNS2D::getBarcodeHTML('JO-1151596', 'QRCODE',5 ,5)!!}</div>

                <table width="100%">
                    <tr>
                        <td width="20%">Issues Date</td>
                        <td width="80%">: Generated</td>
                    </tr>
                    <tr>
                        <td width="20%">Issues Date</td>
                        <td width="80%">: Generated</td>
                    </tr>
                    <tr>
                        <td width="20%">Issues Date</td>
                        <td width="80%">: Generated</td>
                    </tr>
                </table>

                <br>

                <table width="100%" class="center">
                    <thead>
                        <tr>
                            <th>Skill</th>
                            <th>Work Area</th>
                            <th>Est. Mhrs</th>
                            <th>Actual Mhrs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border">
                            <td>ucing</td>
                            <td>ucing</td>
                            <td>ucing</td>
                            <td>ucing</td>
                        </tr>
                    </tbody>
                </table>

                <table width="100%">
                    <tbody>
                        <tr class="border center">
                            <td colspan="2">ucing</td>
                            <td colspan="2">ucing</td>
                        </tr>
                        <tr class="border center">
                            <td colspan="2">ucing</td>
                            <td colspan="2">ucing</td>
                        </tr>
                        <tr class="border center">
                            <td colspan="2">ucing</td>
                            <td colspan="2">ucing</td>
                        </tr>
                        <tr class="border center">
                            <td colspan="2">ucing</td>
                            <td colspan="2">ucing</td>
                        </tr>
                        <tr class="border center">
                            <td colspan="2">ucing</td>
                            <td colspan="2">ucing</td>
                        </tr>
                        <tr class="border">
                            <td>Accoplishment record:</td>
                            <td colspan="3"> record</td>
                        </tr>
                        <tr class="border">
                            <td colspan="2">Discrepancy found : </td>
                            <td colspan="2">Transfer to Defect Card No :</td>
                        </tr>
                        <tr class="border">
                            <td width="20%"></td>
                            <td>
                                <form action="#">
                                    <input type="checkbox"> YES
                                    <input type="checkbox"> NO
                                </form>
                            </td>
                            <td colspan="2">@if(sizeof($jobCard->defectcards()->has('approvals','>',1)->pluck('code')) > 0){{ join(',',$jobCard->defectcards()->has('approvals','>',1)->pluck('code')->toArray()) }} @endif</td>
                        </tr>
                        </tr>
                        <tr class="border">
                            <td colspan="2">ucing</td>
                            <td>ucing</td>
                            <td>ucing</td>
                        </tr>
                    </tbody>
                </table>

                <table>
                    <thead>
                        <tr class="center">
                            <th width="30%">Accomplished by</th>
                            <th width="30%">Inspected by</th>
                            <th width="30%">RII by</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="30%"></td>
                            <td width="30%"></td>
                            <td width="30%"></td>
                        </tr>
                        <tr>
                            <td width="30%"></td>
                            <td width="30%"></td>
                            <td width="30%"></td>
                        </tr>
                        <tr class="center">
                            <td width="30%">Ye</td>
                            <td width="30%">Mi</td>
                            <td width="30%">Ma</td>
                        </tr>
                        <tr>
                            <td width="30%">Date : </td>
                            <td width="30%">Date : </td>
                            <td width="30%">Date : </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="footer">
        <img src="img/form/footerJO.png" alt="footer heere" width="100%">
    </div>
</body>

</html>