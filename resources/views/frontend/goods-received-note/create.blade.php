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
                        <a href="{{ route('frontend.quotation.index') }}" class="m-nav__link">
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
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Date @include('frontend.common.label.required')
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

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Ref PO @include('frontend.common.label.required')
                                                    </label>
                                                    @include('frontend.common.purchase-order.index')

                                                    @component('frontend.common.input.hidden')
                                                        @slot('id', 'ref-po')
                                                        @slot('name', 'ref-po')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Vendor @include('frontend.common.label.required')
                                                    </label>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            @component('frontend.common.label.data-info')
                                                                @slot('id', 'vendor-code')
                                                                @slot('text', '-')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-8 col-md-8 col-lg-8">
                                                            @component('frontend.common.label.data-info')
                                                                @slot('id', 'vendor-name')
                                                                @slot('text', '-')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Purchase Request Number @include('frontend.common.label.required')
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'pr-number')
                                                        @slot('text', '-')
                                                    @endcomponent

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Vendor DO No.
                                                            </label>

                                                            @component('frontend.common.input.text')
                                                                @slot('id', 'do-no')
                                                                @slot('text', 'do-no')
                                                                @slot('name', 'do-no')
                                                                @slot('id_error', 'do-no')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                DO Ref Date
                                                            </label>

                                                            @component('frontend.common.input.datepicker')
                                                                @slot('text', 'ref-date')
                                                                @slot('name', 'ref-date')
                                                                @slot('id', 'ref-date')
                                                            @endcomponent
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Project Number @include('frontend.common.label.required')
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('id', 'project-number')
                                                        @slot('text', '-')
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
                                                    <label class="form-control-label">
                                                        Description @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.textarea')
                                                        @slot('id', 'description')
                                                        @slot('text', 'Description')
                                                        @slot('name', 'description')
                                                        @slot('rows', '7')
                                                        @slot('id_error', 'description')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group m-form__group row" style="margin-top:22px">
                                                        <label for="example-text-input" class="col-2 col-form-label">Received By</label>
                                                        <div class="col-10">
                                                            @component('frontend.common.input.select2')
                                                                @slot('id', 'received-by')
                                                                @slot('text', 'received-by')
                                                                @slot('name', 'received-by')
                                                                @slot('id_error', 'received-by')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row" >
                                                        <label for="example-text-input" class="col-2 col-form-label">Vehicle No</label>
                                                        <div class="col-10">
                                                            @component('frontend.common.input.text')
                                                                @slot('id', 'vehicle-no')
                                                                @slot('text', 'vehicle-no')
                                                                @slot('name', 'vehicle-no')
                                                                @slot('id_error', 'vehicle-no')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row" >
                                                        <label for="example-text-input" class="col-2 col-form-label">Container No</label>
                                                        <div class="col-10">
                                                            @component('frontend.common.input.text')
                                                                @slot('id', 'container-no')
                                                                @slot('text', 'container-no')
                                                                @slot('name', 'container-no')
                                                                @slot('id_error', 'container-no')
                                                            @endcomponent
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
                                                                @slot('id', 'add-goods-received')
                                                                @slot('class', 'add-goods-received')
                                                            @endcomponent

                                                            @include('frontend.common.buttons.reset')

                                                            @component('frontend.common.buttons.back')
                                                                @slot('href', route('frontend.goods-received.index'))
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="purchase_order_datatable" id="purchase_order_datatable"></div>
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

    <script src="{{ asset('js/frontend/good-received-note/create.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/received-by.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/received-by.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/ref-date.js')}}"></script>

@endpush
