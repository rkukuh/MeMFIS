@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Purchase Order
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
                        <a href="{{ route('frontend.quotation.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Purchase Order
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

                                @include('frontend.common.label.edit')

                                <h3 class="m-portlet__head-text">
                                    Purchase Order
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
                                                        Ref PR @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->purchase_request->number)
                                                    @endcomponent

                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Currency @include('frontend.common.label.required')
                                                    </label>

                                                    <select id="currency" name="currency" class="form-control m-select2">
                                                        @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->id }}" @if ($currency->id == $purchaseOrder->currency_id) selected @endif>
                                                            {{ $currency->name }} ({{ $currency->symbol }})
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Exchange Rate @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.number')
                                                        @slot('text', 'exchange')
                                                        @slot('name', 'exchange')
                                                        @slot('value', $purchaseOrder->exchange_rate)
                                                        @slot('id', 'exchange')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Date @include('frontend.common.label.required')
                                                            </label>

                                                            @component('frontend.common.input.datepicker')
                                                                @slot('id', 'date')
                                                                @slot('text', 'Date')
                                                                @slot('name', 'date')
                                                                @slot('value', $purchaseOrder->ordered_at)
                                                                @slot('id_error', 'date')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Valid Until @include('frontend.common.label.required')
                                                            </label>

                                                            @component('frontend.common.input.datepicker')
                                                                @slot('id', 'valid_until')
                                                                @slot('text', 'Valid Until')
                                                                @slot('name', 'valid_until')
                                                                @slot('value', $purchaseOrder->valid_until)
                                                                @slot('id_error', 'valid_until')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Date Shipping
                                                    </label>

                                                    @component('frontend.common.input.datepicker')
                                                        @slot('id', 'date_shipping')
                                                        @slot('text', 'Date Shipping')
                                                        @slot('name', 'date_shipping')
                                                        @slot('value', $purchaseOrder->ship_at)
                                                        @slot('id_error', 'date_shipping')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Vendor @include('frontend.common.label.required')
                                                    </label>

                                                    <select id="vendor" name="vendor" class="form-control m-select2">
                                                        @foreach ($vendors as $vendor)
                                                        <option value="{{ $vendor->id }}" @if ($vendor->id == $purchaseOrder->vendor_id) selected @endif>
                                                            {{ $vendor->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Term of Payment
                                                    </label>
                                                    <div class="form-group m-form__group row" >
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                                            @component('frontend.common.input.radio')
                                                                                @slot('name', 'top')
                                                                                @slot('id', 'cash')
                                                                                @slot('value', 'cash')
                                                                                @if($top == 'cash')
                                                                                    @slot('checked','checked')
                                                                                @endif
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-11 col-md-11 col-lg-11">
                                                                            Cash
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                                            @component('frontend.common.input.radio')
                                                                                @slot('name', 'top')
                                                                                @slot('id', 'by-date')
                                                                                @slot('value', 'by-date')
                                                                                @if($top == 'by-date')
                                                                                    @slot('checked','checked')
                                                                                @endif
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            @component('frontend.common.input.number')
                                                                                @slot('text', 'Term of Payment')
                                                                                @slot('id', 'top_day_amount')
                                                                                @slot('input_append', 'Days')
                                                                                @slot('value', $purchaseOrder->top_day_amount)
                                                                                @if($top == 'cash')
                                                                                    @slot('value','')
                                                                                    @slot('disabled','disabled')
                                                                                @endif
                                                                                @slot('name', 'top_day_amount')
                                                                                @slot('id_error', 'top_day_amount')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                                            @component('frontend.common.input.datepicker')
                                                                                @slot('id', 'top_start_at')
                                                                                @slot('text', 'Date')
                                                                                @slot('value', $purchaseOrder->top_start_at)
                                                                                @if($top == 'cash')
                                                                                    @slot('value','')
                                                                                    @slot('disabled','disabled')
                                                                                @endif
                                                                                @slot('name', 'top_start_at')
                                                                                @slot('id_error', 'top_start_at')
                                                                            @endcomponent
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Shipping Address @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.textarea')
                                                        @slot('id', 'shipping_address')
                                                        @slot('text', 'Shipping Adddress')
                                                        @slot('name', 'shipping_address')
                                                        @slot('rows', '5')
                                                        @slot('value',  $purchaseOrder->shipping_address)
                                                        @slot('id_error', 'shipping_address')

                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <label class="form-control-label">
                                                        Description
                                                    </label>

                                                    @component('frontend.common.input.textarea')
                                                        @slot('id', 'description')
                                                        @slot('text', 'Description')
                                                        @slot('name', 'description')
                                                        @slot('value', $purchaseOrder->description)
                                                        @slot('rows', '5')
                                                        @slot('id_error', 'description')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item_datatable" id="scrolling_both"></div>

                                                        @include('frontend.purchase-order.modal-check')
                                                        @include('frontend.purchase-order.modal-po')

                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <div class="m--align-left" style="padding-top:15px">
                                                                    Total
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'sub_total')
                                                                    @slot('class', 'sub_total')
                                                                    @slot('text', 'generate semua total ditabel')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <div class="m--align-left" style="padding-top:15px">
                                                                    PPN
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'is_ppn_include')
                                                                    @slot('name', 'is_ppn_include')
                                                                    @slot('value', 1.1)
                                                                    @slot('text', 'Include')
                                                                    @slot('style_div','margin-top:15px')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'is_ppn_exclude')
                                                                    @slot('name', 'is_ppn_exclude')
                                                                    @slot('value', 1.1)
                                                                    @slot('text', 'Exclude')
                                                                    @slot('style_div','margin-top:15px')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <div class="m--align-left" style="padding-top:15px">
                                                                    GrandTotal
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'sub_total')
                                                                    @slot('class', 'sub_total')
                                                                    @slot('text', 'menghitung nilai total & biaya lainnya')
                                                                @endcomponent
                                                            </div>
                                                        </div>
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
                                                        @slot('id', 'update-po')
                                                        @slot('class', 'update-po')
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

    <script>
        let po_uuid = "{{$purchaseOrder->uuid}}";
    </script>

    <script src="{{ asset('js/frontend/functions/select2/vendor.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/discount-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/discount-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/project.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/scheduled-payment-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/project.js') }}"></script>


    <script src="{{ asset('js/frontend/functions/select2/ref.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/unit.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/phone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/email.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/fax.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/address.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/scheduled-payment-type.js') }}"></script>

    <script src="{{ asset('js/frontend/purchase-order/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/purchase-order/form-reset.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/valid-until.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date-shipping.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/by-date.js')}}"></script>

@endpush
