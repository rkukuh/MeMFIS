@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Material
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
                        <a href="{{ route('frontend.item.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Material
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Material
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

                                        @component('frontend.common.input.hidden')
                                            @slot('id', 'id')
                                            @slot('name', 'id')
                                            @slot('id_error', 'code')
                                            @slot('value', $item->uuid)
                                        @endcomponent

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
                                                    @slot('value',$item->code)
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
                                                    @slot('value',$item->name)
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
                                                    @slot('value',$item->description)
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

                                            <select id="unit_item" name="unit_item" class="form-control m-select2">
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}"
                                                        @if ($unit->id == $item->unit_id) selected @endif>
                                                        {{ $unit->name }} ({{ $unit->symbol }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Category @include('frontend.common.label.required')
                                            </label>
                                            <select id="category" name="category" class="form-control m-select2">
                                                <option value="">
                                                    &mdash; Select Category &mdash;
                                                </option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id == $item->category->id) selected @endif>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="form-control-feedback text-danger" id="category-error"></div>

                                            @component('frontend.common.buttons.create-new')
                                                @slot('size', 'sm')
                                                @slot('text', 'category')
                                                @slot('style', 'margin-top: 10px;')
                                                @slot('data_target', '#modal_category')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6" style="padding-left: 0">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'is_stock')
                                                    @slot('name', 'is_stock')
                                                    @slot('text', 'Stockable?')

                                                    @if ($item->is_stock == 1)
                                                        @slot('checked', 'checked')
                                                    @endif
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="checkbox">
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('id', 'is_ppn')
                                                        @slot('name', 'is_ppn')
                                                        @slot('text', 'Taxable?')

                                                        @if ($item->is_ppn == 1)
                                                            @slot('checked', 'checked')
                                                        @endif
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 0">
                                                    @component('frontend.common.input.number')
                                                            @slot('text', 'PPN')
                                                            @slot('id', 'ppn_amount')
                                                            @slot('input_append', '%')
                                                            @slot('name', 'ppn_amount')
                                                            @slot('input_prepend', 'PPN')
                                                            @slot('value', $item->ppn_amount)

                                                            @if ($item->is_ppn == 0)
                                                                @slot('disabled', 'disabled')
                                                            @endif
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
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
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Tag @include('frontend.common.label.optional')
                                            </label>

                                            <select id="tag" name="tag" class="form-control m-select2" multiple>
                                                {{-- TODO: Load all tags and selected item's tags --}}
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Photos @include('frontend.common.label.optional')
                                            </label>
                                            <br>

                                            <input id="myInput" type="file" multiple style="display: none">

                                            @component('frontend.common.buttons.browse')
                                                @slot('id', 'myButton')
                                                @slot('icon', 'fa-plus')
                                                @slot('name', 'myButton')
                                                @slot('text', 'Add Files')
                                            @endcomponent

                                            <div id="myFiles"></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type', 'button')
                                                        @slot('id', 'edit-item')
                                                        @slot('class', 'edit-item')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.item.index') )
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
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    Material &harr; UoM (Unit of Measurement)
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
                                            @slot('text', 'UoM')
                                            @slot('id', 'item-uom')
                                            @slot('data_target', '#modal_uom')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.item.uom.modal')

                            <div class="item_unit_datatable" id="item_unit_datatable"></div>
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
                                    Material &harr; Storage Stock
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
                                            @slot('text', 'Storage Stock')
                                            @slot('id', 'item-storage_stock')
                                            @slot('data_target', '#modal_storage_stock')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.storage.modal')
                            @include('frontend.category.modal')
                            @include('frontend.item.storage.modal')

                            <div class="item_storage_datatable" id="item_storage_datatable"></div>
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
    </style>
@endpush

@push('footer-scripts')
    <script>
        let item_uuid = '{{ $item->uuid }}';
    </script>

    <script src="{{ asset('js/frontend/functions/select2/tag.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/category.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit-item.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/storage.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/reset.js') }}"></script>
    <script src="{{ asset('js/frontend/item/edit.js') }}"></script>
@endpush
