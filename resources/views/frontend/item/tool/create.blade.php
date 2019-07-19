@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Tool
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
                        <a href="{{ route('frontend.tool.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Tool
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-7">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">
                                    Tool
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto">Identifier</legend>

                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Part Number @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'code')
                                                    @slot('text', 'Code')
                                                    @slot('name', 'code')
                                                    @slot('id_error', 'code')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Name @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('id', 'name')
                                                    @slot('text', 'Name')
                                                    @slot('name', 'name')
                                                    @slot('id_error', 'name')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Description @include('frontend.common.label.optional')
                                                </label>

                                                @component('frontend.common.input.textarea')
                                                    @slot('rows', '3')
                                                    @slot('id', 'description')
                                                    @slot('name', 'description')
                                                    @slot('text', 'Description')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group m-form__group row hidden">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Barcode @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('id', 'barcode')
                                                @slot('text', 'Barcode')
                                                @slot('name', 'barcode')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Unit @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Unit')
                                                @slot('id', 'unit_id')
                                                @slot('name', 'unit_id')
                                                @slot('id_error', 'unit')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                                            <label class="form-control-label">
                                                Category @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'category')
                                                @slot('text', 'Category')
                                                @slot('name', 'category')
                                                @slot('id_error', 'category')
                                            @endcomponent
                                            <div class="hidden">
                                                @component('frontend.common.buttons.create-new')
                                                    @slot('size', 'sm')
                                                    @slot('text', 'category')
                                                    @slot('style', 'margin-top: 10px;')
                                                    @slot('data_target', '#modal_category')
                                                @endcomponent
                                            </div>

                                            @include('frontend.category.modal')
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Tagging @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'tag')
                                                @slot('text', 'Tag')
                                                @slot('name', 'tag')
                                                @slot('multiple', 'multiple')
                                                @slot('id_error', 'tag')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Manufacturer @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'manufacturer_id')
                                                @slot('text', 'Manufactur')
                                                @slot('name', 'manufacturer_id')
                                                @slot('id_error', 'manufactur')
                                            @endcomponent

                                            @component('frontend.common.buttons.create-new')
                                                @slot('size', 'sm')
                                                @slot('text', 'Manufacturer')
                                                @slot('style', 'margin-top: 10px;')
                                                @slot('data_target', '#modal_manufacturer')
                                            @endcomponent

                                            @include('frontend.manufacturer.modal')
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6" style="padding-left: 0">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'is_stock')
                                                    @slot('name', 'is_stock')
                                                    @slot('text', 'Stockable?')
                                                    @slot('checked', 'checked')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="checkbox">
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('id', 'is_ppn')
                                                        @slot('name', 'is_ppn')
                                                        @slot('text', 'Taxable?')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 0">
                                                    @component('frontend.common.input.number')
                                                        @slot('text', 'PPN')
                                                        @slot('id', 'ppn_amount')
                                                        @slot('input_append', '%')
                                                        @slot('name', 'ppn_amount')
                                                        @slot('input_prepend', 'PPN')
                                                        @slot('id_error', 'ppn_amount')
                                                        @slot('disabled', 'disabled')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row hidden">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Account Code @include('frontend.common.label.optional')
                                            </label>

                                            @include('frontend.common.account-code.index')

                                            @component('frontend.common.input.hidden')
                                                @slot('id', 'account_code')
                                                @slot('name', 'account_code')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-item')
                                                        @slot('class', 'add-item')
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
            <div class="col-lg-5">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Unit Conversion Table
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('id', 'item-uom')
                                            @slot('text', 'Unit Conversion')
                                            @slot('attribute', 'disabled')
                                            @slot('data_target', '#modal_uom')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Warehouse Stock Management
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        @component('frontend.common.buttons.create-new')
                                            @slot('attribute', 'disabled')
                                            @slot('text', 'Storage Stock')
                                            @slot('id', 'item-storage_stock')
                                            @slot('data_target', '#modal_storage_stock')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('js/frontend/functions/select2/manufacturer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/manufacturer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/category.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/category.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/tag.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tag.js') }}"></script>

    <script src="{{ asset('js/frontend/item/tool/create.js') }}"></script>
    <script src="{{ asset('js/frontend/item/tool/form-reset.js') }}"></script>
@endpush
