@extends('frontend.master')

@section('content')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Item
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
                        <a href="{{route('frontend.item.index')}}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Item
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
                                @include('frontend.common.label.create-new')

                                <h3 class="m-portlet__head-text">Item</h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                            <div class="m-portlet__body">
                                <fieldset class="border p-2">
                                    <legend class="w-auto">Identifier</legend>

                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Part Number @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Code')
                                                @slot('name', 'code')
                                                @slot('id', 'code')
                                                @slot('id_error', 'code')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Name @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.text')
                                                @slot('text', 'Name')
                                                @slot('name', 'name')
                                                @slot('id', 'name')
                                                @slot('id_error', 'name')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '3')
                                                @slot('name', 'description')
                                                @slot('id', 'description')
                                                @slot('text', 'Description')
                                            @endcomponent
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                                        <label class="form-control-label">
                                            Barcode @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.text')
                                            @slot('text', 'Barcode')
                                            @slot('name', 'barcode')
                                            @slot('id', 'barcode')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Category @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.select2')
                                            @slot('id', 'category')
                                            @slot('text', 'Category')
                                            @slot('name', 'category')
                                            @slot('style', 'width:100%')
                                            @slot('id_error', 'category')
                                        @endcomponent

                                        @component('frontend.common.buttons.create-new')
                                            @slot('size', 'sm')
                                            @slot('text', 'add category')
                                            @slot('data_target', '#modal_category')
                                            @slot('style', 'margin-top: 10px;')
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Tag @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.select2')
                                                @slot('id', 'tag')
                                                @slot('text', 'Tag')
                                                @slot('name', 'tag')
                                                @slot('style', 'width:100%')
                                                @slot('multiple', 'multiple')
                                            @endcomponent

                                            @component('frontend.common.buttons.create-new')
                                                @slot('size', 'sm')
                                                @slot('text', 'add tag')
                                                @slot('data_target', '#modal_tag')
                                                @slot('style', 'margin-top: 10px;')
                                            @endcomponent
                                        </div>
                                </div>
                                <div class="form-group m-form__group row ">

                                <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Quantity @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.number')
                                            @slot('value', 1)
                                            @slot('id', 'quantity')
                                            @slot('text', 'Quantity')
                                            @slot('name', 'quantity')
                                            @slot('id_error', 'quantity')
                                        @endcomponent
                                    </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Unit @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.select2')
                                        @slot('id', 'unit')
                                        @slot('text', 'Unit')
                                        @slot('name', 'unit')
                                        @slot('id_error', 'unit')
                                        @slot('style', 'width:100%')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                        @component('frontend.common.input.checkbox')
                                            @slot('text', 'Stockable?')
                                            @slot('name', 'isstock')
                                            @slot('id', 'isstock')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="checkbox">
                                            @component('frontend.common.input.checkbox')
                                                @slot('text', 'Dikenai PPN?')
                                                @slot('name', 'isppn')
                                                @slot('id', 'isppn')
                                            @endcomponent
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12" style="padding:0px">
                                            @component('frontend.common.input.number')
                                                @slot('id', 'ppn')
                                                @slot('text', 'PPN')
                                                @slot('name', 'ppn')
                                                @slot('class', 'ppn')
                                                @slot('editable', 'disabled')
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
                                                @slot('name', 'accountcode2')
                                                @slot('id', 'accountcode2')
                                            @endcomponent

                                        </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Photos @include('frontend.common.label.optional')
                                        </label>
                                        <br>
                                        <input id="myInput" type="file" multiple style="display:none" />
                                        @component('frontend.common.buttons.browse')
                                            @slot('text', 'Add Files')
                                            @slot('name', 'myButton')
                                            @slot('id', 'myButton')
                                            @slot('icon','fa-plus')
                                        @endcomponent

                                        <div id="myFiles"></div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                                <div class="flex">
                                                    <div class="action-buttons">
                                                        @component('frontend.common.buttons.submit')
                                                            @slot('class', 'add-item')
                                                            @slot('id', 'add-item')
                                                            @slot('type','button')
                                                        @endcomponent

                                                        @include('frontend.common.buttons.reset')

                                                        @component('frontend.common.buttons.back')
                                                            @slot('href', route('frontend.item.index') )
                                                        @endcomponent

                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                {{-- <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.submit')
                                                    @slot('class', 'add-item')
                                                    @slot('id', 'add-item')
                                                    @slot('type','button')
                                                @endcomponent

                                                @include('frontend.common.buttons.reset')

                                                @component('frontend.common.buttons.back')
                                                    @slot('href', route('frontend.item.index') )
                                                @endcomponent

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
                                    Item &rsaquo; UoM (Unit of Measurement)
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
                                            @slot('text', 'Add UoM')
                                            @slot('attribute', 'disabled')
                                            @slot('data_target', '#modal_uom')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="m_datatable1" id="fisrt"></div>
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
                                    Item &rsaquo; Min/Max Stock
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
                                            @slot('id', 'item-minmaxstock')
                                            @slot('attribute', 'disabled')
                                            @slot('text', 'Add Min/Max Stock')
                                            @slot('data_target', '#modal_minmaxstock')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.category.modal')


                            <div class="m_datatable2" id="second"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header-scripts')
    <style>
        fieldset { margin-bottom: 30px; }
        .padding-datatable {
            padding : 0px
        }
        .margin-info{
            margin-left: 5px
        }
    </style>
@endpush

@push('footer-scripts')

    {{-- <script src="{{ asset('js/frontend/functions/select2.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox.js')}}"></script> --}}
    <script src="{{ asset('js/frontend/functions/select2/category.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/category.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/tag.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/tag.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/account-code.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/account-code.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit2.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/storage.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/storage.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/reset.js')}}"></script>
    {{-- <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script> --}}
    <script src="{{ asset('/js/frontend/functions/accounting/accounting.js')}}"></script>

    <script src="{{ asset('js/frontend/category-item.js') }}"></script>
    <script src="{{ asset('js/frontend/item/qty.js')}}"></script>
    <script src="{{ asset('js/frontend/item/create/item-unit.js')}}"></script>
    <script src="{{ asset('js/frontend/item/create/item-storage.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/number.js')}}"></script>
    <script src="{{ asset('js/frontend/item/create.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/item/journal.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/functions/component.js')}}"></script>

@endpush
