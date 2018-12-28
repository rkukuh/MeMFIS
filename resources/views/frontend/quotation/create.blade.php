@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Quotation
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
                                Quotation
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
                                    Quotation
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <form id="itemform" name="itemform">
                                <div class="m-portlet__body">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">

                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Project
                                                        </label>
                                                            {{-- <table class="order-list" style="margin-left:-13px;margin-right:10px">
                                                                <tr>
                                                                    <td class="col-sm-2"><select name="project"  class="select form-control js-example-tags project"><option >-</option>
                                                                    @foreach ($websites as $website)
                                                                    <option value="{{$website->id}}">{{$website->name}}</option>
                                                                    @endforeach
                                                                    </select></td>
                                                                    <td class="col-sm-1">
                                                                        <div data-repeater-create=""
                                                                            class= "btn btn-brand btn-sm"
                                                                            id="addrow">
                                                                            <span>
                                                                                <i class="la la-plus"></i>
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-sm-1">
                                                                        <label class="form-control-label">
                                                                            Project Number
                                                                        </label>
                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'P-01/HMxxxxx')
                                                                        @endcomponent
                                                                        <label class="form-control-label">
                                                                            Intruction
                                                                        </label>
                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', '..........')
                                                                        @endcomponent
                                                                    </td>
                                                                </tr>
                                                            </table> --}}
                                                            <div class='repeater'>
                                                                    <div data-repeater-list="group-website">
                                                                        <div data-repeater-item>
                                                                            <div class="form-group m-form__group row">
                                                                                <div class="col-sm-10 col-md-10 col-lg-10">
                                                                                        <select id="type_website" name="type_website" class="form-control project"  onchange="myFunction(this)">
                                                                                                <option value="">
                                                                                                    Select a Project
                                                                                                </option>
                                                                                                <option value="1">Project A</option>
                                                                                                <option value="2">Project B</option>
                                                                                                <option value="3">Project C</option>
                                                                                                <option value="4">Project D</option>
                                                                                                <option value="5">Project E</option>
                                                                                                <option value="6">Project F</option>
                                                                                                {{-- @foreach ($websites as $website)
                                                                                                    <option value="{{ $website->id }}">
                                                                                                        {{ $website->name }}
                                                                                                    </option>
                                                                                                @endforeach --}}
                                                                                            </select>
                                                                                </div>
                                                                                <div class="col-sm-1 col-md-1 col-lg-1">
                                                                                    @include('frontend.common.buttons.create_repeater')
                                                                                </div>
                                                                                <div class="col-sm-1 col-md-1 col-lg-1">
                                                                                    @include('frontend.common.buttons.delete_repeater')
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group m-form__group row">
                                                                                <div class="col-sm-10 col-md-10 col-lg-10">
                                                                                    <label class="form-control-label">
                                                                                        Project Number
                                                                                    </label>
                                                                                    @component('frontend.common.label.data-info')
                                                                                        @slot('text', 'P-01/HMxxxxx')
                                                                                    @endcomponent
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group m-form__group row">
                                                                                <div class="col-sm-10 col-md-10 col-lg-10">
                                                                                    <label class="form-control-label">
                                                                                        Intruction
                                                                                    </label>
                                                                                    @component('frontend.common.label.data-info')
                                                                                        @slot('text', '..........')
                                                                                    @endcomponent
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
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
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Currency @include('frontend.common.label.required')
                                                                </label>

                                                                @component('frontend.common.input.select2')
                                                                    @slot('id', 'currency')
                                                                    @slot('text', 'Currency')
                                                                    @slot('name', 'currency')
                                                                    @slot('id_error', 'currency')
                                                                    @slot('style', 'width:100%')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Exchange Rate @include('frontend.common.label.required')
                                                                </label>

                                                                @component('frontend.common.input.text')
                                                                    @slot('text', 'exchange')
                                                                    @slot('name', 'exchange')
                                                                    @slot('id', 'exchange')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Term of Payment @include('frontend.common.label.required')
                                                        </label>
                                                        @component('frontend.common.input.number')
                                                            @slot('text', 'Term of Payment')
                                                            @slot('id', 'term_of_payment')
                                                            @slot('input_append', 'Hari')
                                                            @slot('name', 'term_of_payment')
                                                            @slot('id_error', 'term_of_payment')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">

                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Scheduled Payment Type @include('frontend.common.label.required')
                                                        </label>
                                                        @component('frontend.common.input.select2')
                                                            @slot('id', 'scheduled_payment_type')
                                                            @slot('text', 'Scheduled Payment Type')
                                                            @slot('name', 'scheduled_payment_type')
                                                            @slot('style', 'width:100%')
                                                            @slot('id_error', 'scheduled_payment_type')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                                Scheduled Payment @include('frontend.common.label.required')
                                                        </label>
                                                        <div class='repeater'>
                                                            <div data-repeater-list="group-phone">
                                                                <div data-repeater-item>
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-8 col-md-8 col-lg-8">
                                                                        @component('frontend.common.input.text')
                                                                            @slot('name', 'scheduled_payment')
                                                                            @slot('id', 'scheduled_payment')
                                                                            @slot('text', 'Phone')
                                                                        @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                                            @include('frontend.common.buttons.create_repeater')
                                                                        </div>
                                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                                            @include('frontend.common.buttons.delete_repeater')
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Subject @include('frontend.common.label.required')
                                                        </label>

                                                        @component('frontend.common.input.textarea')
                                                            @slot('rows', '5')
                                                            @slot('id', 'subject')
                                                            @slot('name', 'subject')
                                                            @slot('text', 'Subject')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Term and Condition @include('frontend.common.label.optional')
                                                        </label>

                                                        @component('frontend.common.input.textarea')
                                                            @slot('rows', '5')
                                                            @slot('id', 'top_description')
                                                            @slot('name', 'top_description')
                                                            @slot('text', 'Top Description')
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

                                                        @component('frontend.common.buttons.back')
                                                            @slot('href', route('frontend.quotation.index'))
                                                        @endcomponent
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
        console.log(x.name);
    }
    </script>

    <script type="text/javascript">
        $("#type_website").on('change', function() {
            // var numItems = $('.project').length
            // alert(numItems);
            // if ($(this).val() == 'selectionKey'){
            //     DoSomething();
            // } else {
            //     DoSomethingElse();
            // }
        });
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

@endpush
