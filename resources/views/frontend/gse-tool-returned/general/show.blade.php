@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    GSE/Tool Returned General
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ route('frontend.gse-tool-returned.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                GSE/Tool Returned General
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    GSE/Tool Returned General
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
                                                Date    
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Storage    
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Ref Tool Request No.    
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Location    
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                               Department
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('id', 'department')
                                                @slot('text', 'generate')
                                            @endcomponent
                                        </div>
                                        
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                               Loaned To
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('id', 'loaned')
                                                @slot('text', 'generate')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Remark
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generated')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="m-portlet">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <span class="m-portlet__head-icon m--hide">
                                                                <i class="la la-gear"></i>
                                                            </span>

                                                            @include('frontend.common.label.datalist')

                                                            <h3 class="m-portlet__head-text">
                                                                Tool
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-portlet m-portlet--mobile">
                                                    <div class="m-portlet__body">
                                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                            <div class="row align-items-center">
                                                                <div class="col-xl-8 order-2 order-xl-1">
                                                                    <div class="form-group m-form__group row align-items-center">
                                                                        <div class="col-md-4">
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
                                                        @include('frontend.gse-tool-returned.modal')
                                                        <div class="gse_tool_returned_datatable" id="gse_tool_returned_datatable"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-gse-tool-returned')
                                                        @slot('class', 'add-gse-tool-returned')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

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


@push('footer-scripts')

    <script src="{{ asset('js/frontend/gse-tool-returned/show.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/storage.js') }}"></script>
@endpush
