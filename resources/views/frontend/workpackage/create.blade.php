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
                                                Title @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'title')
                                                @slot('id', 'title')
                                                @slot('name', 'title')
                                                @slot('id_error', 'title')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                (A/C Type) @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Applicability Airplane')
                                                @slot('id', 'applicability_airplane')
                                                @slot('name', 'applicability_airplane')
                                                @slot('id_error', 'applicability-airplane')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-workpackage')
                                                        @slot('class', 'add-workpackage')
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
                                <!-- <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        {{-- <div class="taskcard_datatable" id="second"></div> --}}
                                        <div class="m-portlet__body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Routine</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Non Routine</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">General Tool(s) & Material(s)</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                                    @include('frontend.workpackage.routine.index')
                                                    @include('frontend.workpackage.routine.basic.modal')
                                                    @include('frontend.workpackage.routine.sip.modal')
                                                    @include('frontend.workpackage.routine.cpcp.modal')
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                                    @include('frontend.workpackage.nonroutine.index')
                                                    @include('frontend.workpackage.nonroutine.adsb.modal')
                                                    @include('frontend.workpackage.nonroutine.cmrawl.modal')
                                                    @include('frontend.workpackage.nonroutine.si.modal')
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                                    @include('frontend.workpackage.item.index')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
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
    <script>
    $(document).ready(function () {
        $(':input[type="button"]').prop('disabled', true);
        $('#add-workpackage').prop('disabled', false);
    });

    </script>
    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

    {{-- <script src="{{ asset('js/frontend/functions/select2/quotation.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/quotation.js') }}"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/aircraft.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/series.js') }}"></script>

    <script src="{{ asset('js/frontend/workpackage/create.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/form-reset.js') }}"></script>
    <script src="{{ asset('js/frontend/workpackage/datatables.js')}}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
