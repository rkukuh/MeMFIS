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
                                Preliminary Taskcard
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">
            <div class="m-widget29">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-widget_content">
                        <h3 class="m-widget_content-title">Taskcard</h3>
                        <div class="m-widget_content-items">
                            <div class="m-widget_content-item">
                                <span>Total</span>
                                <span class="m--font-accent">{{$total_taskcard}} Item(s)</span>
                            </div>
                            <div class="m-widget_content-item">
                                <span>Total Manhour MPD</span>
                                <span class="m--font-accent">{{ number_format($total_manhour_taskcard,2) }}</span>
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
                                <span class="m-accordion__item-title"> <h1>Tool(s) Taskcard List</h1></span>

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
                                            <div class="preliminary_tools_datatable" id="scrolling_both"></div>
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
                                <span class="m-accordion__item-title"> <h1>Material(s) Taskcard List</h1></span>

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
                                            <div class="preliminary_materials_datatable" id="scrolling_both"></div>
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
                            @include('frontend.common.buttons.back')
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
    <script>
        let workPackage_uuid = '{{ $workPackage->uuid }}';
    </script>
    <script src="{{ asset('js/frontend/workpackage/non-routine/summary.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/item/form-reset.js') }}"></script>
@endpush
