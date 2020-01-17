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

                                @include('frontend.common.label.show')

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
                                                        Ref PR
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->purchase_request->number)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Currency
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->currency->name)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Exchange Rate
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->exchange_rate)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Date
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $purchaseOrder->ordered_at)
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Valid Until
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $purchaseOrder->valid_until)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Date Shipping
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->ship_at)
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Vendor
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->vendor->name)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Term of Payment
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @if($top == 'cash')
                                                            @slot('text','Cash')
                                                        @elseif($top == 'by-date')
                                                            @slot('text',$purchaseOrder->top_day_amount." Days   |     ".$purchaseOrder->top_start_at )
                                                        @endif
                                                    @endcomponent

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Shipping Address
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->shipping_address)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <label class="form-control-label">
                                                        Description
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $purchaseOrder->description)
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

                                                        <br>
                                                        @include('frontend.purchase-order.modal-check')

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
                                                                    @slot('text', '0')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <div class="m--align-left" style="padding-top:15px">
                                                                    Total Discount
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'total_discount')
                                                                    @slot('class', 'total_discount')
                                                                    @slot('text', '0')
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
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'taxation')
                                                                    @slot('name', 'taxation')
                                                                    @if(sizeof($purchaseOrder->taxes) > 0)
                                                                    @slot('text', $purchaseOrder->taxes->first()->type->name)
                                                                    @else
                                                                    @slot('text', 'Without')
                                                                    @endif
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2 tax_amount">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'tax_amount')
                                                                    @slot('name', 'tax_amount')
                                                                    @slot('text', '10%')
                                                                    @slot('disabled', 'disabled')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row total_ppn">
                                                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <div class="m--align-left" style="padding-top:15px">
                                                                    Total PPN
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'total_ppn')
                                                                    @slot('class', 'total_ppn')
                                                                    @slot('text', $purchaseOrder->currency->symbol."".number_format($purchaseOrder->taxes->first()->amount,0))
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row grand_total_foreign">
                                                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <div class="m--align-left" style="padding-top:15px">
                                                                    Grand Total in {{ $purchaseOrder->currency->name }}
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'grand_total')
                                                                    @slot('class', 'grand_total')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <div class="m--align-left" style="padding-top:15px">
                                                                    Grand Total in Rupiah
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'grand_total_rupiah')
                                                                    @slot('class', 'grand_total_rupiah')
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

    <script>
        let po_uuid = "{{$purchaseOrder->uuid}}";
        let currencyCode = "{{$purchaseOrder->currency->code}}";
        let exchange_rate = "{{$purchaseOrder->exchange_rate}}";
        if(currencyCode == "idr"){
            $(".grand_total_foreign").addClass("hidden");
        }
        let tax = {!! $purchaseOrder->taxes->first() !!}
        if(!tax){
            $(".tax_amount").addClass("hidden");
            $(".total_ppn").addClass("hidden");
        }
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/vendor.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/project.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/scheduled-payment-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/project.js') }}"></script>


    <script src="{{ asset('js/frontend/purchase-order/show.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/ref.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/phone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/email.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/fax.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/address.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/scheduled-payment-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/storage.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/storage.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/valid-until.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date-shipping.js')}}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>

@endpush
