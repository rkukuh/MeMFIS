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
                                Non-Routine Summary
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
                                            Non-Routine Taskcard
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            AD/SB
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            CMR/AWL
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" style="background-color:beige;padding:10px;">
                                            Special Intruction (SI)
                                        </td>
                                        <td width="70%" style="text-align:center">
                                            5 Taskcard(s)
                                        </td>
                                    </tr>
                                    <tr>
                                      <td width="30%" style="background-color:beige;padding:10px;">
                                          HT/CRR
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
                                                @component('frontend.common.buttons.back')
                                                    @slot('href', route('frontend.workpackage.create'))
                                                @endcomponent
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

    <div class="row">
        
        <div class="col-xl-6">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Skill Needed
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <div class="table-responsive-xl text-center">
                        <table class="table table-bordered ">
                            <thead class="thead-light">
                                <tr>
                                    <th>Airframe</th>
                                    <th>Powerplant</th>
                                    <th>Radio</th>
                                    <th>Electrical</th>
                                    <th>Instrument</th>
                                    <th>Cabin Maintenance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="m-widget29">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-widget_content">
                        <h3 class="m-widget_content-title">Non Routine Taskcard</h3>
                        <div class="m-widget_content-items">
                            <div class="m-widget_content-item">
                                <span>AD/SB</span>
                                <span class="m--font-accent">450</span>
                            </div>
                            <div class="m-widget_content-item">
                                <span>CMR/AWL</span>
                                <span class="m--font-brand">79</span>
                            </div>
                            <div class="m-widget_content-item">
                                <span>Special Instruction (SI)</span>
                                <span class="m--font-focus">88</span>
                            </div>
                            <div class="m-widget_content-item">
                                <span>HT/CRR</span>
                                <span class="m--font-success">16</span>
                            </div>
                            <div class="m-widget_content-item">
                                <span>Total</span>
                                <span>633</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-widget_content">
                        <h3 class="m-widget_content-title">Manhour</h3>
                        <div class="m-widget_content-items">
                            <div class="m-widget_content-item">
                                <span>Total MPD</span>
                                <span class="m--font-accent">{{ number_format(367) }}</span>
                            </div>
                            <div class="m-widget_content-item">
                                <span>Performance Factor</span>
                                <span class="m--font-brand">+15%</span>
                            </div>
                            <div class="m-widget_content-item">
                                <span>Total</span>
                                <span>{{ number_format(5973) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End::Section-->

    <div class="row">
        <div class="col-xl-12">

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div id="m_accordion_1" class="m-accordion m-accordion--default m-accordion--solid m-accordion--section m-accordion--padding-lg m-accordion--toggle-arrow" role="tablist">

                        <div class="m-accordion__item ">
                            <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_1_item_1_head" data-toggle="collapse" href="#m_accordion_1_item_1_body" aria-expanded="false">
                                <span class="m-accordion__item-icon"></span>
                                <span class="m-accordion__item-title"> <h1>Tool(S) List (from taskcard)</h1></span>

                                <span class="m-accordion__item-mode"></span>
                            </div>

                            <div class="m-accordion__item-body collapse show" id="m_accordion_1_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_1_head" data-parent="#m_accordion_1">

                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-6 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="m-input-icon m-input-icon--left">
                                                                <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                    <span><i class="la la-search"></i></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-accordion__item-content">
                                            <div class="general_tools_datatable" id="scrolling_both"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div id="m_accordion_2" class="m-accordion m-accordion--default m-accordion--solid m-accordion--section m-accordion--padding-lg m-accordion--toggle-arrow" role="tablist">

                        <div class="m-accordion__item ">
                            <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_2_item_1_head" data-toggle="collapse" href="#m_accordion_2_item_1_body" aria-expanded="false">
                                <span class="m-accordion__item-icon"></span>
                                <span class="m-accordion__item-title"> <h1>Item(S) List (from taskcard)</h1></span>

                                <span class="m-accordion__item-mode"></span>
                            </div>

                            <div class="m-accordion__item-body collapse show" id="m_accordion_2_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_1_head" data-parent="#m_accordion_1">

                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-6 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="m-input-icon m-input-icon--left">
                                                                <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                    <span><i class="la la-search"></i></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-accordion__item-content">
                                            <div class="general_items_datatable" id="scrolling_both"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div id="m_accordion_4" class="m-accordion m-accordion--default m-accordion--solid m-accordion--section m-accordion--padding-lg m-accordion--toggle-arrow" role="tablist">

                        <div class="m-accordion__item ">
                            <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_4_item_1_head" data-toggle="collapse" href="#m_accordion_4_item_1_body" aria-expanded="false">
                                <span class="m-accordion__item-icon"></span>
                                <span class="m-accordion__item-title"> <h1>General Tools(S) List</h1></span>

                                <span class="m-accordion__item-mode"></span>
                            </div>

                            <div class="m-accordion__item-body collapse show" id="m_accordion_4_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_4_item_1_head" data-parent="#m_accordion_1">

                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-6 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="m-input-icon m-input-icon--left">
                                                                <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                    <span><i class="la la-search"></i></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-accordion__item-content">
                                            <div class="general_tools_datatable" id="scrolling_both"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div id="m_accordion_3" class="m-accordion m-accordion--default m-accordion--solid m-accordion--section m-accordion--padding-lg m-accordion--toggle-arrow" role="tablist">

                        <div class="m-accordion__item ">
                            <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_3_item_1_head" data-toggle="collapse" href="#m_accordion_3_item_1_body" aria-expanded="false">
                                <span class="m-accordion__item-icon"></span>
                                <span class="m-accordion__item-title"> <h1>General Material(S) List</h1></span>

                                <span class="m-accordion__item-mode"></span>
                            </div>

                            <div class="m-accordion__item-body collapse show" id="m_accordion_3_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_3_item_1_head" data-parent="#m_accordion_1">

                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__body">
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-6 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="m-input-icon m-input-icon--left">
                                                                <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                    <span><i class="la la-search"></i></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-accordion__item-content">
                                            <div class="general_materials_datatable" id="scrolling_both"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div class="flex">
                        <div class="action-buttons">
                            @component('frontend.common.buttons.back')
                            @slot('href', route('frontend.workpackage.create'))
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
