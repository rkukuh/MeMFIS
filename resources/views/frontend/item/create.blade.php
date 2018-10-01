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
                                        <h3 class="m-portlet__head-text">
                                            Item Create
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet m-portlet--mobile">
                                <div class="m-portlet__body">
                                    <div class="m-portlet__body">
                                            <div class="form-group m-form__group row ">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Part Number
                                                    @component('frontend.common.label.required')
                                                    @endcomponent
                                                    </label>
                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Code')
                                                        @slot('name', 'code')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Name
                                                    @component('frontend.common.label.optional')
                                                    @endcomponent
                                                    </label>
                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Name')
                                                        @slot('name', 'name')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row ">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Barcode
                                                    @component('frontend.common.label.optional')
                                                    @endcomponent
                                                    </label>
                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Barcode')
                                                        @slot('name', 'barcode')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Category
                                                    @component('frontend.common.label.required')
                                                    @endcomponent
                                                    </label>
                                                    @component('frontend.common.input.select')
                                                        @slot('text', 'Category')
                                                        @slot('name', 'category')
                                                        @slot('id', 'm_select2_2')
                                                        @slot('style', 'width:100%')
                                                    @endcomponent

                                                    @component('frontend.common.buttons.create-new')
                                                        @slot('size', 'sm')
                                                        @slot('text', 'add category')
                                                        @slot('data_target', '#modal_category')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row ">
                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                            @component('frontend.common.input.checkbox')
                                                                @slot('text', 'Active')
                                                                @slot('name', 'active')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('text', 'IsPPn')
                                                                    @slot('name', 'isppn')
                                                                @endcomponent

                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                    @component('frontend.common.input.checkbox')
                                                                        @slot('text', 'IsStock')
                                                                        @slot('name', 'isstock')
                                                                    @endcomponent
                                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row ">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Description
                                                    @component('frontend.common.label.optional')
                                                    @endcomponent
                                                    </label>
                                                    @component('frontend.common.input.textarea')
                                                        @slot('rows', '3')
                                                        @slot('name', 'description')
                                                        @slot('text', 'Description')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            xPicture
                                                        @component('frontend.common.label.optional')
                                                        @endcomponent
                                                        </label>
                                                        @component('frontend.common.input.upload')
                                                            @slot('text', 'xPicture')
                                                            @slot('name', 'xpicture')
                                                        @endcomponent
                                                    </div>
                                            </div>
                                            <div class="form-group m-form__group row ">
                                            </div>
                                            <div class="form-group m-form__group row ">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        AccountCode
                                                    @component('frontend.common.label.optional')
                                                    @endcomponent
                                                    </label>
                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'AccountCode')
                                                        @slot('name', 'accountcode')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Storage
                                                        @component('frontend.common.label.required')
                                                        @endcomponent
                                                        </label>
                                                        @component('frontend.common.input.select')
                                                            @slot('text', 'Storage')
                                                            @slot('name', 'storage')
                                                            @slot('id', 'm_select2_1')
                                                            @slot('style', 'width:100%')
                                                        @endcomponent

                                                        @component('frontend.common.buttons.create-new')
                                                            @slot('size', 'sm')
                                                            @slot('text', 'add storage')
                                                            @slot('data_target', '#modal_storage')
                                                        @endcomponent
                                                    </div>

                                            </div>
                                            <div class="form-group m-form__group row ">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Max
                                                            @component('frontend.common.label.required')
                                                            @endcomponent
                                                            </label>
                                                            @component('frontend.common.input.number')
                                                                @slot('text', 'Max')
                                                                @slot('name', 'max')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Min
                                                                @component('frontend.common.label.required')
                                                                @endcomponent
                                                                </label>
                                                                @component('frontend.common.input.number')
                                                                    @slot('text', 'Min')
                                                                    @slot('name', 'min')
                                                                @endcomponent
                                                            </div>

                                                    </div>
                                                    <div class="form-group m-form__group row ">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">

                                                    @component('frontend.common.buttons.submit')
                                                        @slot('size', 'md')
                                                        @slot('class', 'add22')
                                                    @endcomponent

                                                    @component('frontend.common.buttons.reset')
                                                        @slot('size', 'md')
                                                    @endcomponent

                                                    @component('frontend.common.buttons.close')
                                                        @slot('size', 'md')
                                                        @slot('data_dismiss', 'modal')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
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
                                                    <h3 class="m-portlet__head-text">
                                                        Item Unit Datalist
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet m-portlet--mobile">
                                            <div class="m-portlet__body">
                                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-5 order-1 order-xl-2 m--align-right">
                                                            @component('frontend.common.buttons.create-new')
                                                                @slot('id', 'item-unit')
                                                                @slot('size', 'md')
                                                                @slot('color', 'primary')
                                                                @slot('attribute', 'disabled')
                                                                @slot('text', 'Add Item Unit')
                                                                @slot('data_target', '#modal_itemsunit')
                                                            @endcomponent

                                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @include('frontend.item-unit.modal')
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
                                                        <h3 class="m-portlet__head-text">
                                                            Item Stock
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-portlet m-portlet--mobile">
                                                <div class="m-portlet__body">

                                                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">

                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                            @component('frontend.common.buttons.create-new')
                                                @slot('id', 'item-stock')
                                                @slot('size', 'md')
                                                @slot('color', 'primary')
                                                @slot('attribute', 'disabled')
                                                @slot('text', 'Add Item Stock')
                                                @slot('data_target', '#modal_itemstock')
                                            @endcomponent

                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>

                                @include('frontend.storage.modal')
                                @include('frontend.item-stock.modal')

                                <div class="m_datatable2" id="second"></div>


                                                            </div>


                                                </div>
                                            </div>
                                        </div>
            </div>


        </div>
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2.js')}}"></script>
    <script src="{{ asset('js/frontend/accountcode.js')}}"></script>
    <script src="{{ asset('js/frontend/bank.js')}}"></script>

    <script src="{{ asset('js/frontend/item.js') }}"></script>
    <script src="{{ asset('js/frontend/item-unit.js')}}"></script>
    <script src="{{ asset('js/frontend/item-stock.js')}}"></script>
@endpush
