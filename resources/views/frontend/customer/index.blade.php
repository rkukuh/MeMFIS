@extends('frontend.master')

@section('content')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Customer
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
                        <a href="/customer" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Customer
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->

    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Customer Datalist
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <!--begin: Search Form -->
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
                                            @slot('text', 'Add Customer')
                                            @slot('color', 'primary')
                                            @slot('size', 'md')
                                            @slot('data_target', '#modal_customer')
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Search Form -->

                            @include('frontend.customer.modal')

                            <!--begin: Datatable -->
                            <div class="m_datatable" id="scrolling_both"></div>
                            <!--end: Datatable -->
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection


@push('footer-scripts')
    <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script>
    {{-- <script src="{{ asset('assets/metronic//demo/default/custom/crud/forms/widgets/typeahead.js')}}"></script> --}}
    <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/select2.js')}}"></script>

    <script src="{{ asset('js/customer.js')}}"></script>
    <script src="{{ asset('js/addres.js')}}"></script>

    {{-- <script src="{{ asset('js/select.js')}}"></script> --}}
@endpush
