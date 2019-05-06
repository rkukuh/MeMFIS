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
                                Basic Taskcard
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Total Task Card(s)
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $total_taskcard .' Item (s)')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Total MPD's Manhour(s)
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $total_manhor_taskcard.' mhrs')
                                        @endcomponent
                                    </div>

                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Skill Needed
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'choosed template')
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__body">
                                        <h1>Tool(S) List (from taskcard)</h1>
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-6 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="m-input-icon m-input-icon--left">
                                                                <input type="text" class="form-control m-input" placeholder="Search..."
                                                                    id="generalSearch">
                                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                    <span><i class="la la-search"></i></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="general_tools_datatable" id="scrolling_both"></div>
                                    </div>
                                </div>
                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__body">
                                        <h1>Item(S) List (from taskcard)</h1>
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-6 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="m-input-icon m-input-icon--left">
                                                                <input type="text" class="form-control m-input" placeholder="Search..."
                                                                    id="generalSearch">
                                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                    <span><i class="la la-search"></i></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="general_items_datatable" id="scrolling_both"></div>
                                    </div>
                                </div>
                                <div class="m-portlet m-portlet--mobile">
                                        <div class="m-portlet__body">
                                            <h1>General Material(S) List</h1>
                                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-6 order-2 order-xl-1">
                                                        <div class="form-group m-form__group row align-items-center">
                                                            <div class="col-md-6">
                                                                <div class="m-input-icon m-input-icon--left">
                                                                    <input type="text" class="form-control m-input" placeholder="Search..."
                                                                        id="generalSearch">
                                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                        <span><i class="la la-search"></i></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="general_materials_datatable" id="scrolling_both"></div>
                                        </div>
                                    </div>
                                    <div class="m-portlet m-portlet--mobile">
                                        <div class="m-portlet__body">
                                            <h1>General Tools(S) List</h1>
                                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-6 order-2 order-xl-1">
                                                        <div class="form-group m-form__group row align-items-center">
                                                            <div class="col-md-6">
                                                                <div class="m-input-icon m-input-icon--left">
                                                                    <input type="text" class="form-control m-input" placeholder="Search..."
                                                                        id="generalSearch">
                                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                        <span><i class="la la-search"></i></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="general_tools_datatable" id="scrolling_both"></div>
                                        </div>
                                    </div>

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
</div>
@push('footer-scripts')
    <script>let workPackage_uuid = '{{ $workPackage->uuid }}';  </script>
    <script src="{{ asset('js/frontend/workpackage/item/summary.js') }}"></script>    
    <script src="{{ asset('js/frontend/workpackage/item/form-reset.js') }}"></script>
@endpush
@endsection
