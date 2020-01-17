@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                RIR (Receiving Insspection Report)
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
                            RIR (Receiving Insspection Report)
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
                                RIR (Receiving Insspection Report)
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
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Purchase Order Number
                                                        </label>

                                                        @component('frontend.common.input.select2')
                                                            @slot('id', 'purchase_order')
                                                            @slot('text', 'Purchase Order')
                                                            @slot('name', 'purchase_order')
                                                            @slot('id_error', 'purchase_order')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Vendor
                                                        </label>

                                                        @component('frontend.common.input.select2')
                                                            @slot('id', 'vendor')
                                                            @slot('text', 'Vendor')
                                                            @slot('name', 'vendor')
                                                            @slot('id_error', 'vendor')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Delivery Document
                                                    </label>

                                                    @component('frontend.common.input.input')
                                                        @slot('name', 'delivery document')
                                                        @slot('id', 'document')
                                                        @slot('name', 'document')
                                                        @slot('placeholder', 'Delivery Document')
                                                    @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Date
                                                    </label>

                                                    @component('frontend.common.input.datepicker')
                                                        @slot('id', 'date')
                                                        @slot('text', 'Date')
                                                        @slot('name', 'date')
                                                        @slot('id_error', 'date')
                                                    @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Status
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Purchase')
                                                            @slot('id','purchase')
                                                            @slot('value','purchase')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Repair')
                                                            @slot('id','repair')
                                                            @slot('value','repair')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Serviceable')
                                                            @slot('id','serviceable')
                                                            @slot('value','serviceable')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.input.radio')
                                                            @slot('name', 'status')
                                                            @slot('text','Unserviceable')
                                                            @slot('id','unserviceable')
                                                            @slot('value','unserviceable')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rir_datatable" id="scrolling_both"></div>
                                <hr>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.submit')
                                                    @slot('type','button')
                                                    @slot('id', 'add-rir')
                                                    @slot('class', 'add-rir')
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
    <script src="{{ asset('js/frontend/rir/create.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/vendor.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/vendor.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/purchase-order.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/purchase-order.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

@endpush
