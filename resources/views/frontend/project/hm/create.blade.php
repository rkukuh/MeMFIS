@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Project
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
                                Project
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
                                    Heavy Maintenance Project
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
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Customer @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.select2')
                                                        @slot('id', 'customer')
                                                        @slot('text', 'Customer')
                                                        @slot('name', 'customer')
                                                        @slot('id_error', 'customer')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Work Order Number @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Work Order')
                                                        @slot('id', 'work-order')
                                                        @slot('name', 'work-order')
                                                        @slot('id_error', 'work-order')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <fieldset class="border p-2">
                                                        <legend class="w-auto">Identifier Customer</legend>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="m-portlet__head">
                                                                <div class="m-portlet__head-tools">
                                                                    <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                                                                        <li class="nav-item m-tabs__item">
                                                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                                                                                <i class="la la-bell-o"></i> General
                                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item m-tabs__item">
                                                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                                                                                <i class="la la-bell-o"></i> Contact
                                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item m-tabs__item">
                                                                            <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_tabs_6_3" role="tab">
                                                                                                <i class="la la-cog"></i> Address
                                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Name
                                                                                </label>

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'XXX')
                                                                                    @slot('id', 'name')
                                                                                @endcomponent
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Attention
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', 'Bp. Romdani')
                                                                                    @slot('id', 'attention')
                                                                                    @slot('name', 'attention')
                                                                                @endcomponent
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Phone
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', '+62xxxxxxx / 07777777')
                                                                                    @slot('id', 'phone')
                                                                                @endcomponent

                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                    <label class="form-control-label">
                                                                                        Fax
                                                                                    </label>

                                                                                    @component('frontend.common.input.select2')
                                                                                        @slot('text', '+62xxxxxxx / 07777777')
                                                                                        @slot('id', 'fax')
                                                                                    @endcomponent
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Email
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', '+62xxxxxxx / 07777777')
                                                                                    @slot('id', 'email')
                                                                                @endcomponent

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <label class="form-control-label">
                                                                                    Address
                                                                                </label>

                                                                                @component('frontend.common.input.select2')
                                                                                    @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nulla odio consequuntur obcaecati eos error recusandae minima eveniet dolor sed tempora! Ut quidem illum accusantium expedita nulla eos reprehenderit officiis?')
                                                                                    @slot('id', 'address')
                                                                                @endcomponent
                                                                            </div>
                                                                        </div>
                                                                        <div id="map"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Work Order Attachment @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.upload')
                                                        @slot('text', 'Work Order')
                                                        @slot('id', 'work-order-attachment')
                                                        @slot('name', 'work-order-attachment')
                                                    @endcomponent
                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Type @include('frontend.common.label.required')
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
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Reg @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Red')
                                                        @slot('id', 'reg')
                                                        @slot('name', 'reg')
                                                        @slot('id_error', 'reg')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Serial Number @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Serial Number')
                                                        @slot('id', 'serial-number')
                                                        @slot('name', 'serial-number')
                                                        @slot('id_error', 'serial-number')
                                                    @endcomponent

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Project Title @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.textarea')
                                                        @slot('rows', '8')
                                                        @slot('id', 'project_title')
                                                        @slot('name', 'project_title')
                                                        @slot('text', 'Project Title')
                                                    @endcomponent
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
                                                        @slot('id', 'add-project')
                                                        @slot('class', 'add-project')
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
        #map { height: 200px; }
    </style>

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
    <script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/template.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/aircraft.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/series.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/phone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/email.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/fax.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/address.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>

    <script src="{{ asset('js/frontend/project/hm/create.js') }}"></script>
    <script src="{{ asset('js/frontend/project/form-reset.js') }}"></script>

@endpush
