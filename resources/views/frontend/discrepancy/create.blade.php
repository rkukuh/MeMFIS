@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Discrepancy Found
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
                                Discrepancy
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="taskcardform" name="taskcardform">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Date @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.datepicker')
                                        @slot('id', 'date')
                                        @slot('text', 'Date')
                                        @slot('name', 'date')
                                        @slot('id_error', 'date')
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
                                            Discrrepancy Form @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('id', 'discrepancy_form')
                                        @slot('text', 'Discrepancy Form')
                                        @slot('name', 'discrepancy_form')
                                        @slot('id_error', 'discrepancy_form')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            A/C Reg @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('text', 'Aircraft Register')
                                        @slot('id', 'aircraft_register')
                                        @slot('name', 'aircraft_register')
                                        @slot('id_error', 'aircraft_register')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            JC No Reference @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('id', 'discrepancy_form')
                                        @slot('text', 'Discrepancy Form')
                                        @slot('name', 'discrepancy_form')
                                        @slot('id_error', 'discrepancy_form')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            A/C SN @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('text', 'Aircraft Serial Number')
                                        @slot('id', 'aircraft_serial_number')
                                        @slot('name', 'aircraft_serial_number')
                                        @slot('id_error', 'aircraft_serial_number')
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Sequence No @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.number')
                                        @slot('id', 'engineer_quantity')
                                        @slot('text', 'Engineer Quantity')
                                        @slot('name', 'engineer_quantity')
                                        @slot('value', '1')
                                        @slot('min', '1')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Engineer Quantity @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.number')
                                                @slot('id', 'engineer_quantity')
                                                @slot('text', 'Engineer Quantity')
                                                @slot('name', 'engineer_quantity')
                                                @slot('value', '1')
                                                @slot('min', '1')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Mechanic Quantity @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.number')
                                                @slot('id', 'mechanic_quantity')
                                                @slot('text', 'Mechanic Quantity')
                                                @slot('name', 'mechanic_quantity')
                                                @slot('value', '0')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Skill @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.select2')
                                        @slot('text', 'Otr Certification')
                                        @slot('id', 'otr_certification')
                                        @slot('name', 'otr_certification')
                                        @slot('id_error', 'otr-certification')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        @component('frontend.common.input.checkbox')
                                        @slot('id', 'is_rii')
                                        @slot('name', 'is_rii')
                                        @slot('text', 'RII?')
                                        @slot('style_div','margin-top:30px')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            Zone @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.select2')
                                        @slot('id', 'zone')
                                        @slot('text', 'Zone')
                                        @slot('name', 'zone')
                                        @slot('id_error', 'zone')
                                        @slot('multiple','multiple')
                                        @slot('help_text','You can chose multiple value')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            ATA @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('id', 'ATA')
                                        @slot('text', 'ATA')
                                        @slot('name', 'ATA')
                                        @slot('id_error', 'ATA')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label class="form-control-label">
                                            Manhour Estimation @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.decimal')
                                        @slot('id', 'manhour')
                                        @slot('text', 'Manhour')
                                        @slot('name', 'manhour')
                                        @slot('id_error', 'manhour')
                                        @slot('min', '0')
                                        @slot('value', '1')
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Complaint @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                        @slot('rows', '5')
                                        @slot('id', 'complaint')
                                        @slot('name', 'complaint')
                                        @slot('text', 'Complaint')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Remark @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.textarea')
                                        @slot('rows', '5')
                                        @slot('id', 'remark')
                                        @slot('name', 'remark')
                                        @slot('text', 'Remark')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Propose Correction @include('frontend.common.label.optional')
                                        </label>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'remove')
                                                @slot('name', 'remove')
                                                @slot('text', 'Remove')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'repair')
                                                @slot('name', 'repair')
                                                @slot('text', 'Repair')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'test')
                                                @slot('name', 'test')
                                                @slot('text', 'Test')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'install')
                                                @slot('name', 'install')
                                                @slot('text', 'install')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'replace')
                                                @slot('name', 'replace')
                                                @slot('text', 'replace')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'shop_visit')
                                                @slot('name', 'shop_visit')
                                                @slot('text', 'Shop Visit')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'recticification')
                                                @slot('name', 'recticification')
                                                @slot('text', 'recticification')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'NDT')
                                                @slot('name', 'NDT')
                                                @slot('text', 'NDT')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                @component('frontend.common.input.checkbox')
                                                @slot('id', 'onokabe')
                                                @slot('name', 'onokabe')
                                                @slot('text', 'onokabe')
                                                @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__body">
                                        <h1>Tool(S) List</h1>
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
                                                <div class="col-xl-6 order-1 order-xl-2 m--align-right">
                                                    @component('frontend.common.buttons.create-new')
                                                    @slot('id', 'tool')
                                                    @slot('text', 'Tools')
                                                    @slot('data_target', '#modal_tool')
                                                    @endcomponent


                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                </div>
                                                @include('frontend.workpackage.item.tool.index')

                                            </div>
                                        </div>

                                        <div class="tools_datatable" id="scrolling_both"></div>
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
                                                @slot('href', route('frontend.taskcard.index'))
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

@endpush

@push('footer-scripts')

<script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

<script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/zone.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/zone.js') }}"></script>

<script src="{{ asset('js/frontend/discrepancy/create.js') }}"></script>
<script src="{{ asset('js/frontend/discrepancy/form-reset.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

@endpush