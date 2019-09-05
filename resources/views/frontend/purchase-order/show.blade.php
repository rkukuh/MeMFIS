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
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Currency
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Exchange Rate
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
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
                                                                @slot('text', 'generate')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Valid Until
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'generate')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Date Shipping
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label class="form-control-label">
                                                        Vendor
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
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
                                                                                @slot('disabled','disabled')
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
                                                                                @slot('disabled','disabled')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            @component('frontend.common.input.number')
                                                                                @slot('text', 'Term of Payment')
                                                                                @slot('id', 'top_day_amount')
                                                                                @slot('input_append', 'Days')
                                                                                @slot('name', 'top_day_amount')
                                                                                @slot('id_error', 'top_day_amount')
                                                                                @slot('disabled','disabled')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                                            @component('frontend.common.input.datepicker')
                                                                                @slot('id', 'top_start_at')
                                                                                @slot('text', 'Date')
                                                                                @slot('name', 'top_start_at')
                                                                                @slot('id_error', 'top_start_at')
                                                                                @slot('disabled','disabled')
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
                                                        Shipping Address
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <label class="form-control-label">
                                                        Description
                                                    </label>

                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'generate')
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
                                                                    @slot('disabled','disabled')
                                                                    @slot('style_div','margin-top:15px')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.input.checkbox')
                                                                    @slot('id', 'is_ppn_exclude')
                                                                    @slot('name', 'is_ppn_exclude')
                                                                    @slot('value', 1.1)
                                                                    @slot('text', 'Exclude')
                                                                    @slot('disabled','disabled')
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
    function myFunction(object) {
        // var numItems = $('.project').length

        // var x = this.getElementById("type_website");
        var x = object;
        var y = x.name;

        var numb = y.match(/\d/g);
        var z = x.value;
        var projectUuid = z;
    }
    </script>

    <script type="text/javascript">
        let simpan = $('.tes').on('click', '.save', function () {
        var usertype=[];
        $("select[name=project]").each(function(){
            usertype.push($(this).val());
            // alert($(this).val());
        });
        var ajaxdata={"UserType":usertype};

        console.log(JSON.stringify(ajaxdata));
        });
    </script>
    {{-- <script>
        function initMap() {
            var myLatLng = {lat: -7.265757, lng: 112.734146};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 10,
                center  : myLatLng
            });

            var marker = new google.maps.Marker({
                position    : myLatLng,
                map         : map,
                title       : 'Hello World!'
            });
        }
    </script> --}}
    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>

    {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/vendor.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/project.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/scheduled-payment-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/project.js') }}"></script>


    <script src="{{ asset('js/frontend/functions/select2/ref.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/phone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/email.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/fax.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/address.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/scheduled-payment-type.js') }}"></script>

    <script src="{{ asset('js/frontend/quotation/create.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/form-reset.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/valid-until.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date-shipping.js')}}"></script>

@endpush
