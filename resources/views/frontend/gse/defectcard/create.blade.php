@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    GSE/Tool Returned
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
                        <a href="{{ route('frontend.gse.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                GSE/Tool Returned
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
                                    GSE/Tool Returned
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <input type="hidden" id="type" name="type" value="defectcard">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Date @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.datepicker')
                                                @slot('id', 'date')
                                                @slot('text', 'Date')
                                                @slot('name', 'date')
                                                @slot('id_error','date')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Ref Document No. @include('frontend.common.label.required')
                                            </label>
                                            @component('frontend.common.input.select2')
                                            @slot('text', 'Defect Card')
                                            @slot('id', 'tool_request')
                                            @slot('name', 'tool_request')
                                            @slot('id_error', 'tool_request')
                                            @endcomponent

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Additional Project No.
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('id', 'project_number')
                                                @slot('text', '-')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Type
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'ac_type')
                                                        @slot('text', '-')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        A/C Reg
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'ac_reg')
                                                        @slot('text', '-')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Storage @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Storage')
                                                @slot('id', 'item_storage_id')
                                                @slot('name', 'item_storage_id')
                                                @slot('id_error', 'item_storage_id')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Section Code
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Section Code')
                                                @slot('id', 'section')
                                                @slot('name', 'section')
                                                @slot('id_error', 'section')
                                            @endcomponent
                                        </div>

                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Returned By @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'employee')
                                                @slot('text', 'employee')
                                                @slot('name', 'employee')
                                                @slot('id_error', 'employee')
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
                                                @slot('id', 'note')
                                                @slot('name', 'note')
                                                @slot('text', 'Note')
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
                                                        @include('frontend.gse.modal')
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
                                                        @slot('id', 'add-gse')
                                                        @slot('class', 'add-gse')
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

    <script src="{{ asset('js/frontend/gse/create.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/employee.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/employee-uuid.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/storage.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/tool-request.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tool-request-defectcard.js') }}"></script>
@endpush
