@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
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
                        <a href="{{ route('frontend.customer.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Customer
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
                                    Customer
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <form id="customerform" name="customerform">
                                        <div class="m-portlet__body">
                                            @component('frontend.common.input.hidden')
                                                @slot('id', 'customer_uuid')
                                                @slot('name', 'customer_uuid')
                                                @slot('value', $customer->uuid)
                                            @endcomponent
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Name  @include('frontend.common.label.required')
                                                    </label>

                                                    @component('frontend.common.input.text')
                                                        @slot('text', 'Name')
                                                        @slot('name', 'name')
                                                        @slot('value', $customer->name)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Term of Payment @include('frontend.common.label.required')
                                                    </label>
                                                    @component('frontend.common.input.number')
                                                        @slot('text', 'Term of Payment')
                                                        @slot('id', 'term_of_payment')
                                                        @slot('input_append', 'Hari')
                                                        @slot('name', 'term_of_payment')
                                                        @slot('id_error', 'term_of_payment')
                                                        @slot('value', $customer->payment_term)
                                                        @slot('width','50%')
                                                    @endcomponent

                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <label class="form-control-label">
                                                                    Phone @include('frontend.common.label.optional')
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <label class="form-control-label">
                                                                    Ext.
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <label class="form-control-label">
                                                                    Type.
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                            </div>

                                                        </div>
                                                        <div class='repeater'>
                                                            <div data-repeater-list="group-phone">
                                                                <div data-repeater-item>
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                                        @component('frontend.common.input.text')
                                                                            @slot('name', 'phone')
                                                                            @slot('text', 'Phone')
                                                                        @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                                                    @component('frontend.common.input.text')
                                                                                        @slot('name', 'ext')
                                                                                        @slot('text', 'Ext')
                                                                                    @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                                                @component('frontend.common.input.radio')
                                                                                    @slot('text', 'Work')
                                                                                    @slot('name', 'type_phone')
                                                                                    @slot('id', 'type_phone')
                                                                                    @slot('value', 'work')
                                                                                @endcomponent
                                                                                @component('frontend.common.input.radio')
                                                                                    @slot('name', 'type_phone')
                                                                                    @slot('id', 'type_phone')
                                                                                    @slot('text', 'Personal')
                                                                                    @slot('value', 'personal')
                                                                                @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                                            @include('frontend.common.buttons.create_repeater')
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
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
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <label class="form-control-label">
                                                                    Fax @include('frontend.common.label.optional')
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                <label class="form-control-label">
                                                                    Type.
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                            </div>

                                                        </div>
                                                        <div class='repeater'>
                                                            <div data-repeater-list="group-fax">
                                                                <div data-repeater-item>
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                                            @component('frontend.common.input.text')
                                                                                @slot('text', 'fax')
                                                                                @slot('name', 'fax')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                                                @component('frontend.common.input.radio')
                                                                                    @slot('text', 'Work')
                                                                                    @slot('name', 'type_fax')
                                                                                    @slot('id', 'type_fax')
                                                                                    @slot('value', 'work')
                                                                                @endcomponent
                                                                                @component('frontend.common.input.radio')
                                                                                    @slot('name', 'type_fax')
                                                                                    @slot('id', 'type_fax')
                                                                                    @slot('text', 'Personal')
                                                                                    @slot('value', 'personal')
                                                                                @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                                            @include('frontend.common.buttons.create_repeater')
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
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
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Website @include('frontend.common.label.optional')
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <label class="form-control-label">
                                                                    Type.
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                            </div>

                                                        </div>
                                                        <div class='repeater'>
                                                            <div data-repeater-list="group-website">
                                                                <div data-repeater-item>
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            @component('frontend.common.input.text')
                                                                                @slot('text', 'website')
                                                                                @slot('name', 'website')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                                            <select id="type_website" name="type_website" class="form-control">
                                                                                <option value="">
                                                                                    Select a Website Type
                                                                                </option>

                                                                                @foreach ($websites as $website)
                                                                                    <option value="{{ $website->id }}">
                                                                                        {{ $website->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                                            @include('frontend.common.buttons.create_repeater')
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
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
                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <label class="form-control-label">
                                                                    Email @include('frontend.common.label.optional')
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                Type.
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                            </div>

                                                        </div>
                                                        <div class='repeater'>
                                                            <div data-repeater-list="group-email">
                                                                <div data-repeater-item>
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                                            @component('frontend.common.input.email')
                                                                                @slot('name', 'email')
                                                                                @slot('placeholder', 'Email')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                                            @component('frontend.common.input.radio')
                                                                                @slot('text', 'Work')
                                                                                @slot('name', 'type_email')
                                                                                @slot('id', 'type_email')
                                                                                @slot('value', 'work')
                                                                            @endcomponent
                                                                            @component('frontend.common.input.radio')
                                                                                @slot('name', 'type_email')
                                                                                @slot('id', 'type_email')
                                                                                @slot('text', 'Personal')
                                                                                @slot('value', 'personal')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                                            @include('frontend.common.buttons.create_repeater')
                                                                        </div>
                                                                        <div class="col-sm-1 col-md-1 col-lg-1">
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
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Document @include('frontend.common.label.optional')
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            <label class="form-control-label">
                                                                Type.
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                        </div>

                                                    </div>
                                                    <div class='repeater'>
                                                        <div data-repeater-list="group-document">
                                                            <div data-repeater-item>
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        @component('frontend.common.input.upload')
                                                                            @slot('label', 'document')
                                                                            @slot('name', 'document')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                                                        <select id="type_website" name="type_website" class="form-control">
                                                                            <option value="">
                                                                                Select a Document Type
                                                                            </option>

                                                                            @foreach ($documents as $document)
                                                                                <option value="{{ $document->id }}">
                                                                                    {{ $document->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                                        @include('frontend.common.buttons.create_repeater')
                                                                    </div>
                                                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                                                        @include('frontend.common.buttons.delete_repeater')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Active * @include('frontend.common.label.optional')
                                                    </label>

                                                    @component('frontend.common.input.switch')
                                                        @slot('text', 'Active')
                                                        @slot('name', 'active')
                                                        @slot('id', 'active')
                                                    @endcomponent
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Account Code @include('frontend.common.label.optional')
                                                    </label>

                                                    <div style="background-color:beige;padding:15px 10px 5px 15px;">

                                                        <div class="form-group m-form__group row">
                                                            <div class="col-sm-8 col-md-8 col-lg-8">
                                                                @if (isset($customer->journal))
                                                                    @component('frontend.common.label.data-info')
                                                                        @slot('padding', '0')
                                                                        @slot('class', 'search-journal')
                                                                        @slot('text', $customer->account_code_and_name)
                                                                    @endcomponent
                                                                @else
                                                                    <div class="search-journal" id="search-journal">
                                                                        Search account code
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding: 0;">
                                                                @component('frontend.common.account-code.button-create')
                                                                    @slot('text', '')
                                                                    @slot('size', 'sm')
                                                                    @slot('icon', 'search')
                                                                    @slot('data_target', '#modal_account_code')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @include('frontend.common.account-code.modal')

                                                    @component('frontend.common.input.hidden')
                                                        @slot('id', 'account_code')
                                                        @slot('name', 'account_code')
                                                        @slot('value', $customer->account_code)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                                    <div class="flex">
                                                        <div class="action-buttons">
                                                            @component('frontend.common.buttons.update')
                                                                @slot('type', 'button')
                                                                @slot('id', 'edit-customer')
                                                                @slot('class', 'edit-customer')
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
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-tools">
                                                        <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                                                                    <i class="la la-bell-o"></i> Address
                                                                                </a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                                                                    <i class="la la-cog"></i> Document
                                                                                </a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">
                                                                                    <i class="la la-bell-o"></i> Contact
                                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="m-portlet__body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                                                                @component('frontend.common.buttons.create-new')
                                                                                    @slot('text', 'Address')
                                                                                    @slot('id', 'customer-address')
                                                                                    @slot('data_target', '#modal_address')
                                                                                @endcomponent

                                                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @include('frontend.customer.address.modal')

                                                            <div class="customer_address_datatable" id="customer_address_datatable"></div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="customer_document_datatable" id="customer_document_datatable"></div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                                        <div class="m-portlet__head-tools" style="margin-top:-30px;margin-left:15px">

                                                            <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_4" role="tab">
                                                                                                    <i class="la la-cog"></i> Phone
                                                                                                </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_5" role="tab">
                                                                                                        <i class="la la-bell-o"></i> Email
                                                                                                    </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_6" role="tab">
                                                                                                    <i class="la la-bell-o"></i> Fax
                                                                                                </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_7" role="tab">
                                                                                                <i class="la la-bell-o"></i> Website
                                                                                            </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="m_tabs_6_4" role="tabpanel">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="customer_phone_datatable" id="customer_phone_datatable"></div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="m_tabs_6_5" role="tabpanel">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="customer_email_datatable" id="customer_email_datatable"></div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="m_tabs_6_6" role="tabpanel">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="customer_fax_datatable" id="customer_fax_datatable"></div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="m_tabs_6_7" role="tabpanel">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="customer_website_datatable" id="customer_website_datatable"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header-scripts')
    <style>
        #map { height: 500px; }
    </style>
    <style>
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
        let customer_uuid = '{{ $customer->uuid }}';
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

    {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script> --}}
    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/term-of-payment.js') }}"></script>
    {{-- <script src="{{ asset('js/frontend/functions/fill-combobox/term-of-payment.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/functions/select2/address-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/address-type.js') }}"></script>
    <script src="{{ asset('js/frontend/vendor/edit.js') }}"></script>
    <script src="{{ asset('js/frontend/vendor/form-reset.js') }}"></script>

    <script src="{{ asset('js/frontend/common/account-code.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>

@endpush
