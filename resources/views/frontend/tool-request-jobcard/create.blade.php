@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Tool Request Jobcard
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
                    <a href="{{ route('frontend.tool-request-jobcard.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Tool Request Jobcard
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
                                Tool Request Jobcard
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
                                            Date @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.datepicker')
                                        @slot('id', 'date')
                                        @slot('text', 'Date')
                                        @slot('name', 'date')
                                        @slot('id_error','requested_at')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Storage
                                        </label>

                                        @component('frontend.common.input.select2')
                                        @slot('text', 'Storage')
                                        @slot('id', 'item_storage_id')
                                        @slot('name', 'item_storage_id')
                                        @slot('id_error', 'item_storage_id')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                @component('frontend.common.input.radio')
                                                @slot('id', 'jc_ref_no')
                                                @slot('name', 'ref_no')
                                                @slot('value', 'jc_ref_no')
                                                @slot('checked','checked')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-11 col-md-11 col-lg-11">
                                                <label class="form-control-label">
                                                    JC Ref No. @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                @slot('text', 'JC Ref No.')
                                                @slot('id', 'ref_jobcard')
                                                @slot('name', 'jc_no')
                                                @slot('id_error', 'ref_jobcard')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                @component('frontend.common.input.radio')
                                                @slot('id', 'project_ref_no')
                                                @slot('name', 'ref_no')
                                                @slot('value', 'project_ref_no')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-11 col-md-11 col-lg-11">
                                                <label class="form-control-label">
                                                    Project Ref No. @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select2')
                                                @slot('text', 'Project Ref No.')
                                                @slot('id', 'ref_project')
                                                @slot('name', 'ref_project')
                                                @slot('id_error', 'ref_project')
                                                @slot('disabled', 'disabled')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Project No.
                                        </label>

                                        @component('frontend.common.label.data-info')
                                        @slot('id', 'project_number')
                                        @slot('text', 'generate setelah select ref jc HM')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Section Code
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('text', 'Section Code')
                                        @slot('id', 'section_code')
                                        @slot('name', 'section_code')
                                        @slot('id_error', 'section_code')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    A/C Type
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                @slot('id', 'actype')
                                                @slot('text', 'generate setelah select ref jc HM')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    A/C Reg
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                @slot('id', 'acreg')
                                                @slot('text', 'generate setelah select ref jc HM')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Loaned To
                                        </label>

                                        @component('frontend.common.input.select2')
                                        @slot('text', 'Loaned To')
                                        @slot('id', 'loaned')
                                        @slot('name', 'loaned')
                                        @slot('id_error', 'loaned')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Remark
                                        </label>

                                        @component('frontend.common.input.textarea')
                                        @slot('rows', '5')
                                        @slot('id', 'description')
                                        @slot('name', 'description')
                                        @slot('text', 'Description')
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
                                                                            <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                                <span><i class="la la-search"></i></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                                @component('frontend.common.buttons.create-new')
                                                                @slot('text', 'Item')
                                                                @slot('data_target', '#modal_tool_request')
                                                                @endcomponent


                                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    @include('frontend.tool-request-jobcard.modal')
                                                    <div class="tool_request_project_datatable" id="tool_request_project_datatable"></div>
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
                                                @slot('id', 'add-request')
                                                @slot('class', 'add-request')
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

<script src="{{ asset('js/frontend/tool-request-jobcard/create.js') }}"></script>

<script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

<script src="{{ asset('js/frontend/functions/select2/loaned.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/ref-jobcard.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/jobcard-number.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/ref-project.js') }}"></script>

<!-- <script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script> -->

<!-- <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script> -->

<script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/storage.js') }}"></script>

@endpush