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
                                Additional Task
                            </h3>
                        </div>
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
                                    <th>ERI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>@if( isset($otr["airframe"]) ) {{ $otr["airframe"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["powerplant"]) ) {{ $otr["powerplant"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["radio"]) ) {{ $otr["radio"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["electrical"]) ) {{ $otr["electrical"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["instrument"]) ) {{ $otr["instrument"] }} @else 0 @endif</td> --}}
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered ">
                            <thead class="thead-light">
                                <tr>
                                    <th>Run-Up</th>
                                    <th>Repair</th>
                                    <th>Repainting</th>
                                    <th>Cabin Maintenance</th>
                                    <th>NDI / NDT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>@if( isset($otr["runup"]) ) {{ $otr["runup"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["repair"]) ) {{ $otr["repair"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["repainting"]) ) {{ $otr["repainting"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["cabin"]) ) {{ $otr["cabin"] }} @else 0 @endif</td>
                                    <td>@if( isset($otr["ndi-ndt"]) ) {{ $otr["ndi-ndt"] }} @else 0 @endif</td> --}}
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
                        <h3 class="m-widget_content-title">Defect Card</h3>
                        <div class="m-widget_content-items">
                            <div class="m-widget_content-item">
                                <div class="row mt-4">
                                    <div class="col-5">
                                        <span>Total</span>
                                    </div>
                                    <div class="col-7">
                                        <span>Total Manhours Estimation</span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-5">
                                        <span class="m--font-accent"><b>20 Item(s)</b></span>
                                    </div>
                                    <div class="col-7">
                                        <span class="m--font-accent">46,5</span>
                                    </div>
                                </div>
                                {{-- <span>Basic</span>
                                <span class="m--font-accent">{{$basic}}</span>
                                <span class="m--font-accent"></span> --}}
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
                                <span class="m-accordion__item-title">
                                    <h1>Tool(s) Taskcard List</h1>
                                </span>

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
                                <span class="m-accordion__item-title">
                                    <h1>Material(s) Taskcard List</h1>
                                </span>

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
                    <div class="flex">
                        <div class="action-buttons">
                            @component('frontend.common.buttons.back')
                            {{-- @slot('href', route('frontend.workpackage.edit',['id' => $workPackage->uuid])) --}}
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('js/frontend/project/hm-additional/summary.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/item/form-reset.js') }}"></script>
@endpush