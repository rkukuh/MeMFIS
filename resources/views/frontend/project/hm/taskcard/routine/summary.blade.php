@extends('frontend.master')

@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.summary')

                            <h3 class="m-portlet__head-text">
                              Routine Summary
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <table border="1px" width="100%">
                                    <tr>
                                        <td width="100%" colspan="2" style="background-color:beige;padding:10px;font-weight:bold">
                                            Routine Taskcard
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Basic
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Sip
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Cpcp
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;font-weight:bold">
                                            Total Manhour(s)
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" colspan="2" style="background-color:beige;padding:10px;font-weight:bold">
                                            Skill Needed
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Airframe
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Powerplant
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Radio
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Electrical
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Instrument
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Cabin Maintenance
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                </table>
                                <table border="1px" width="100%">
                                    <tr>
                                        <td colspan="4" style="background-color:beige;padding:10px;font-weight:bold">
                                            Tool(s) List (from taskcard)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;font-weight:bold" width="20%">
                                            P/N
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="40%">
                                            Tool Description
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="10%">
                                            Qty
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="30%">
                                            Remarks
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="20%">
                                            67937376
                                        </td>
                                        <td style="text-align:center" width="40%">
                                            Obeng
                                        </td>
                                        <td style="text-align:center" width="10%">
                                            2
                                        </td>
                                        <td style="text-align:center" width="30%">
                                            Bla Bla
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                </table>
                                <table border="1px" width="100%">
                                    <tr>
                                        <td colspan="4" style="background-color:beige;padding:10px;font-weight:bold">
                                            Material(s) List (from taskcard)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;font-weight:bold" width="20%">
                                            P/N
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="40%">
                                            Material  Description
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="10%">
                                            Qty
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="30%">
                                            Remarks
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="20%">
                                            67937376
                                        </td>
                                        <td style="text-align:center" width="40%">
                                            Obeng
                                        </td>
                                        <td style="text-align:center" width="10%">
                                            3
                                        </td>
                                        <td style="text-align:center" width="30%">
                                            Bla Bla
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                </table>
                                <table border="1px" width="100%">
                                    <tr>
                                        <td colspan="4" style="background-color:beige;padding:10px;font-weight:bold">
                                            General Tool(s) List
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;font-weight:bold" width="20%">
                                            P/N
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="40%">
                                            Tool Description
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="10%">
                                            Qty
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="30%">
                                            Remarks
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="20%">
                                            67937376
                                        </td>
                                        <td style="text-align:center" width="40%">
                                            Obeng
                                        </td>
                                        <td style="text-align:center" width="10%">
                                            2
                                        </td>
                                        <td style="text-align:center" width="30%">
                                            Bla Bla
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                </table>
                                <table border="1px" width="100%">
                                    <tr>
                                        <td colspan="4" style="background-color:beige;padding:10px;font-weight:bold">
                                            General Material(s) List
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;font-weight:bold" width="20%">
                                            P/N
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="40%">
                                            Material Decription
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="10%">
                                            Qty
                                        </td>
                                        <td style="text-align:center;font-weight:bold" width="30%">
                                            Remarks
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" width="20%">
                                            67937376
                                        </td>
                                        <td style="text-align:center" width="40%">
                                            Radiator
                                        </td>
                                        <td style="text-align:center" width="10%">
                                            3
                                        </td>
                                        <td style="text-align:center" width="30%">
                                            Bla Bla
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center" height="20px" width="20%"></td>
                                        <td style="text-align:center" height="20px" width="40%"></td>
                                        <td style="text-align:center" height="20px" width="10%"></td>
                                        <td style="text-align:center" height="20px" width="30%"></td>
                                    </tr>
                                </table>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @include('frontend.common.buttons.back')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
