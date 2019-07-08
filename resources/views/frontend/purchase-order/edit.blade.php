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
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Purchase Order Number
                                                                </label>

                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', 'PR-2121212')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Currency @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.select2')
                                                            @slot('id', 'currency')
                                                            @slot('text', 'Currency')
                                                            @slot('name', 'currency')
                                                            @slot('id_error', 'currency')
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
                                                                    @slot('id_error', 'valid_until')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Exchange Rate @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'exchange')
                                                            @slot('input_prepend', 'Rp')
                                                            @slot('name', 'exchange')
                                                            @slot('id', 'exchange')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Ref PR @include('frontend.common.label.required')
                                                        </label>
                                                        @include('frontend.common.purchase-request.index')

                                                        @component('frontend.common.input.hidden')
                                                            @slot('id', 'ref-pr')
                                                            @slot('name', 'ref-pr')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Date Shipping @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.datepicker')
                                                            @slot('id', 'date_shipping')
                                                            @slot('text', 'Date Shipping')
                                                            @slot('name', 'date_shipping')
                                                            @slot('id_error', 'date_shipping')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Vendor @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.select2')
                                                            @slot('id', 'vendor')
                                                            @slot('text', 'vendor')
                                                            @slot('name', 'vendor')
                                                            @slot('id_error', 'vendor')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Shipping Address @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.textarea')
                                                            @slot('id', 'shipping_address')
                                                            @slot('text', 'Shipping Adddress')
                                                            @slot('name', 'shipping_address')
                                                            @slot('rows', '3')
                                                            @slot('value', 'Jl. Raya Bandara Juanda,Sudimoro, Betro, Sedati, Bali, Jawa Timur 61253')
                                                            @slot('id_error', 'shipping_address')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Term of Payment @include('frontend.common.label.required')
                                                        </label>
                                                        <div class="form-group m-form__group row" >
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                                @component('frontend.common.input.radio')
                                                                                    @slot('name', 'top')
                                                                                    @slot('id', 'top')
                                                                                    @slot('value', 'cash')
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
                                                                                    @slot('id', 'top')
                                                                                    @slot('value', 'non-cash')
                                                                                @endcomponent
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                @component('frontend.common.input.number')
                                                                                    @slot('text', 'Term of Payment')
                                                                                    @slot('id', 'term_of_payment')
                                                                                    @slot('input_append', 'Hari')
                                                                                    @slot('name', 'term_of_payment')
                                                                                    @slot('id_error', 'term_of_payment')
                                                                                @endcomponent
                                                                            </div>
                                                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                                                @component('frontend.common.input.datepicker')
                                                                                    @slot('id', 'date')
                                                                                    @slot('text', 'Date')
                                                                                    @slot('name', 'date')
                                                                                    @slot('id_error', 'date')
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
                                                            Description @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.textarea')
                                                            @slot('id', 'description')
                                                            @slot('text', 'Description')
                                                            @slot('name', 'description')
                                                            @slot('value', $purchaseOrder->description)
                                                            @slot('rows', '3')
                                                            @slot('id_error', 'description')
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
    <script>
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
    </script>
    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>

    <script src="{{ asset('js/frontend/functions/select2/vendor.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/vendor.js') }}"></script>

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
