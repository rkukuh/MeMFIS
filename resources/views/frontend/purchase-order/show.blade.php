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
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label class="form-control-label">
                                                                    Purchase Order Number
                                                                </label>

                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', $purchaseOrder->number)
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Currency @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $purchaseOrder->currency->name)
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

                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '10-10-2018')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Valid Until @include('frontend.common.label.optional')
                                                                </label>

                                                                @if (empty($purchaseOrder->valid_until))
                                                                    @include('frontend.common.label.data-info-nodata')
                                                                @else
                                                                    @component('frontend.common.label.data-info')
                                                                        @slot('text', $purchaseOrder->valid_until)
                                                                    @endcomponent
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Exchange Rate @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $purchaseOrder->exchange_rate)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Ref PR @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $purchaseOrder->purchase_request->number)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Date Shipping @include('frontend.common.label.optional')
                                                        </label>

                                                        @if (empty($purchaseOrder->ship_at))
                                                            @include('frontend.common.label.data-info-nodata')
                                                        @else
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $purchaseOrder->ship_at)
                                                            @endcomponent
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Vendor @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', $purchaseOrder->vendor->code)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Shipping Address @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'Jl RS Fatmawati 20 Rukan Fatmawati Mas Bl III/319,Cipete Utara')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Term of Payment @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'cash')
                                                        @endcomponent

                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">

                                                        <label class="form-control-label">
                                                            Description @include('frontend.common.label.optional')
                                                        </label>

                                                        @if (empty($purchaseOrder->description))
                                                            @include('frontend.common.label.data-info-nodata')
                                                        @else
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $purchaseOrder->description)
                                                            @endcomponent
                                                        @endif
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
