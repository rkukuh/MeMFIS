@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Work Package
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
                        <a href="{{ route('frontend.workpackage.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Work Package
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

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Work Package
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
                                                    Code @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Code')
                                                    @slot('id', 'code')
                                                    @slot('name', 'code')
                                                    @slot('id_error', 'code')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Title @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'title')
                                                    @slot('id', 'title')
                                                    @slot('name', 'title')
                                                    @slot('id_error', 'title')
                                                @endcomponent
                                            </div>
                                            
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Aircraft @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                    @slot('text', 'Aircraft')
                                                    @slot('id', 'aircraft')
                                                    @slot('name', 'aircraft')
                                                    @slot('id_error', 'aircraft')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Series @include('frontend.common.label.required')
                                                </label>
    
                                                @component('frontend.common.input.select2')
                                                    @slot('id', 'series')
                                                    @slot('text', 'Series')
                                                    @slot('name', 'series')
                                                    @slot('id_error', 'series')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="taskcard_datatable" id="second"></div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                                <div class="flex">
                                                    <div class="action-buttons">
                                                        @component('frontend.common.buttons.submit')
                                                            @slot('type','button')
                                                            @slot('id', 'add-taskcard')
                                                            @slot('class', 'add-taskcard')
                                                        @endcomponent

                                                        @include('frontend.common.buttons.reset')

                                                        @component('frontend.common.buttons.back')
                                                            @slot('href', route('frontend.workpackage.index'))
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
@endsection

@push('header-scripts')
    <style>
        fieldset {
            margin-bottom: 30px;
        }

        .padding-datatable {
            padding: 0px
        }

        .margin-info {
            margin-left: 5px
        }
    </style>
@endpush

@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/select2/code.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/quotation.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/quotation.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/title.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/aircraft.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/series.js') }}"></script>

    <script src="{{ asset('js/frontend/workpackage/create.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/form-reset.js') }}"></script>
@endpush