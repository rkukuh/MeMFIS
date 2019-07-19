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

                                @include('frontend.common.label.show')

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

                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '10-12-2018')
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
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'PO-1130549030')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Vendor @include('frontend.common.label.required')
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '21111')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-8 col-md-8 col-lg-8">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', 'Vendor 1')
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
                                                            @slot('text', '21111122')
                                                        @endcomponent

                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Sup DO No.
                                                                </label>

                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '211232')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Ref Date
                                                                </label>

                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '10-12-2018')
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
                                                            @slot('text', '211114444')
                                                        @endcomponent

                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Warehouse @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'ST-DUM-1148160410 - Storage Dummy #1148160410')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="purchase_order_datatable" id="purchase_order_datatable"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Description @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'Description')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group m-form__group row" style="margin-top:22px">
                                                            <label for="example-text-input" class="col-2 col-form-label">Received By</label>
                                                            <div class="col-10">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '10-12-2018')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row" >
                                                            <label for="example-text-input" class="col-2 col-form-label">Vehicle No</label>
                                                            <div class="col-10">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '1231222')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row" >
                                                            <label for="example-text-input" class="col-2 col-form-label">Container No</label>
                                                            <div class="col-10">
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '575673')
                                                                @endcomponent
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
                                                            @slot('id', 'add-quotation')
                                                            @slot('class', 'add-quotation')
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



    <script src="{{ asset('js/frontend/good-received-note/create.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/ref-date.js')}}"></script>

@endpush
