@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Goods Received Note
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
                        <a href="{{ route('frontend.goods-received.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Goods Received Note
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
                                    Goods Received Note
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Ref PO @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $goodsReceived->purchase_order->number)
                                                    @endcomponent

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Warehouse @include('frontend.common.label.required')
                                                    </label>

                                                    @include('frontend.common.warehouse.index')

                                                    @component('frontend.common.input.hidden')
                                                        @slot('id', 'warehouse')
                                                        @slot('name', 'warehouse')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Delivery Order Number @include('frontend.common.label.required')
                                                            </label>
                                                            @component('frontend.common.input.text')
                                                                @slot('id', 'deliv-number')
                                                                @slot('name', 'deliv-number')
                                                                @slot('text', 'Deliv Number')
                                                                @if(isset($additionals))
                                                                    @slot('value', $additionals->SupplierRefNo)
                                                                @endif
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                DO Date
                                                            </label>

                                                            @component('frontend.common.input.datepicker')
                                                                @slot('text', 'Do Date')
                                                                @slot('name', 'do-date')
                                                                @slot('id', 'do-date')
                                                                @if(isset($additionals))
                                                                    @slot('value', $additionals->SupplierRefDate)
                                                                @endif
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Received By @include('frontend.common.label.required')
                                                            </label>
                                                            @component('frontend.common.input.select2')
                                                                @slot('id', 'received-by')
                                                                @slot('text', 'received-by')
                                                                @slot('name', 'received-by')
                                                                @slot('id_error', 'received-by')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Date @include('frontend.common.label.required')
                                                            </label>

                                                            @component('frontend.common.input.datepicker')
                                                                @slot('id', 'date')
                                                                @slot('text', 'Date')
                                                                @slot('name', 'date')
                                                                @slot('value', $goodsReceived->received_at)
                                                                @slot('id_error', 'date')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Purchase Request Number
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'pr-number')
                                                        @slot('text', $goodsReceived->purchase_order->purchase_request->number)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Vendor
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'vendor-code')
                                                        @slot('text', $goodsReceived->purchase_order->vendor->name)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Project Number
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'project-number')
                                                        @slot('text', '-')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Vehicle No
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('id', 'vehicle-no')
                                                        @slot('text', 'vehicle-no')
                                                        @slot('name', 'vehicle-no')
                                                        @slot('value', $goodsReceived->vehicle_no)
                                                        @slot('id_error', 'vehicle-no')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Remark
                                                    </label>

                                                    @component('frontend.common.input.textarea')
                                                        @slot('id', 'description')
                                                        @slot('text', 'Description')
                                                        @slot('name', 'description')
                                                        @slot('value', $goodsReceived->description)
                                                        @slot('rows', '7')
                                                        @slot('id_error', 'description')
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
                                                                        Item
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
                                                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                                            @component('frontend.common.buttons.create-new')
                                                                                @slot('text', 'Item')
                                                                                @slot('data_target', '#modal_grn_add')
                                                                            @endcomponent

                                                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="purchase_order_datatable" id="purchase_order_datatable"></div>

                                                                @include('frontend.goods-received-note.modal')
                                                                @include('frontend.goods-received-note.modal-edit')

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
                                                                @slot('id', 'update-goods-received')
                                                                @slot('class', 'update-goods-received')
                                                            @endcomponent

                                                            @include('frontend.common.buttons.reset')

                                                            @include('frontend.common.buttons.back')

                                                        </div>
                                                    </div>
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
    <script>
        let grn_uuid = '{{$goodsReceived->uuid}}';
        let po_uuid = '{{$goodsReceived->purchase_order->uuid}}';

        $(document).ready(function () {
            document.getElementById('search-storage').innerHTML = '{{$goodsReceived->storage->name}}';
            document.getElementById('warehouse').value = '{{$goodsReceived->storage->uuid}}';
        });
    </script>

    <script src="{{ asset('js/frontend/functions/select2/material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/material-po.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit-material.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-material.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit-item.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit-item-uom.js') }}"></script>

    <script src="{{ asset('js/frontend/good-received-note/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/do-date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/expired-date.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/received-by.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/received-by.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/unit.js') }}"></script>

@endpush
