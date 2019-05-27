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
        <div class="col-lg-7">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.create-new')

                            <h3 class="m-portlet__head-text">
                                Customer
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
                                        <label class="form-control-label">
                                            Name @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.input.text')
                                        @slot('text', 'Name')
                                        @slot('name', 'name')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                        <label class="form-control-label">
                                            Level Customer @include('frontend.common.label.required')
                                        </label>
                                    </div>
                                    <div class="col-sm-7 col-md-7 col-lg-7">
                                        <label class="form-control-label">
                                            Term of Payment @include('frontend.common.label.required')
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                        <select id="level_customer" name="level_customer" class="form-control">
                                            <option value="1">
                                                1
                                            </option>
                                            <option value="2">
                                                2
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-7 col-md-7 col-lg-7">
                                        @component('frontend.common.input.number')
                                        @slot('text', 'Term of Payment')
                                        @slot('id', 'term_of_payment')
                                        @slot('input_append', 'Hari')
                                        @slot('name', 'term_of_payment')
                                        @slot('id_error', 'term_of_payment')
                                        @slot('width','50%')
                                        @endcomponent
                                    </div>

                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Phone @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                <label class="form-control-label">
                                                    Ext.
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
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
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
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
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
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
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Fax @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
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
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.text')
                                                            @slot('text', 'fax')
                                                            @slot('name', 'fax')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
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
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Website @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
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
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.text')
                                                            @slot('text', 'website')
                                                            @slot('name', 'website')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
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
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Email @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                            </div>

                                        </div>
                                        <div class='repeater'>
                                            <div data-repeater-list="group-email">
                                                <div data-repeater-item>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.email')
                                                            @slot('name', 'email')
                                                            @slot('placeholder', 'Email')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
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
                                            <div class="col-sm-5 col-md-5 col-lg-5">
                                                <label class="form-control-label">
                                                    Document @include('frontend.common.label.optional')
                                                </label>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
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
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                            @component('frontend.common.input.upload')
                                                            @slot('label', 'document')
                                                            @slot('name', 'document')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
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
                                    <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                                        <label class="form-control-label">
                                            Active * @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.input.checkbox')
                                        @slot('text', 'Active')
                                        @slot('name', 'active')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Account Code @include('frontend.common.label.optional')
                                        </label>

                                        @include('frontend.common.account-code.index')

                                        @component('frontend.common.input.hidden')
                                        @slot('id', 'account_code')
                                        @slot('name', 'account_code')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                        <div class="flex">
                                            <div class="action-buttons">
                                                @component('frontend.common.buttons.submit')
                                                @slot('type','button')
                                                @slot('id', 'add-customer')
                                                @slot('class', 'add-customer')
                                                @endcomponent

                                                @include('frontend.common.buttons.reset')

                                                @component('frontend.common.buttons.back')
                                                @slot('href', route('frontend.item.index'))
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
        <div class="col-lg-5">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.datalist')

                            <h3 class="m-portlet__head-text">
                                Address
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="row align-items-center">
                                <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                    @component('frontend.common.buttons.create-new')
                                    @slot('text', 'Address')
                                    @slot('attribute', 'disabled')
                                    @endcomponent

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            <h3 class="m-portlet__head-text">
                                <legend class="w-auto">Identifier Customer</legend>
                            </h3>
                        </div>
                    </div>
                </div>
                    <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-tools">
                                                <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                                            <i class="la la-bell-o"></i> General
                                                        </a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                                            <i class="la la-bell-o"></i> Contact
                                                        </a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_tabs_6_3" role="tab">
                                                            <i class="la la-cog"></i> Address
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
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Name
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                            @slot('text', 'XXX')
                                                            @slot('id', 'name')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Attention
                                                            </label>

                                                            @component('frontend.common.input.select2')
                                                            @slot('text', 'Bp. Romdani')
                                                            @slot('id', 'attention')
                                                            @slot('name', 'attention')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Phone
                                                            </label>

                                                            @component('frontend.common.input.select2')
                                                            @slot('text', '+62xxxxxxx / 07777777')
                                                            @slot('id', 'phone')
                                                            @endcomponent

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Fax
                                                            </label>

                                                            @component('frontend.common.input.select2')
                                                            @slot('text', '+62xxxxxxx / 07777777')
                                                            @slot('id', 'fax')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Email
                                                            </label>

                                                            @component('frontend.common.input.select2')
                                                            @slot('text', '+62xxxxxxx / 07777777')
                                                            @slot('id', 'email')
                                                            @endcomponent

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Address
                                                            </label>

                                                            @component('frontend.common.input.select2')
                                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nulla odio consequuntur obcaecati eos error recusandae minima eveniet dolor sed tempora! Ut quidem illum accusantium expedita nulla eos reprehenderit officiis?')
                                                            @slot('id', 'address')
                                                            @endcomponent
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
<script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
{{-- <script src="{{ asset('js/frontend/functions/fill-combobox/website.js') }}"></script> --}}
<script src="{{ asset('js/frontend/customer/create.js') }}"></script>
<script src="{{ asset('js/frontend/customer/form-reset.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
x
@endpush