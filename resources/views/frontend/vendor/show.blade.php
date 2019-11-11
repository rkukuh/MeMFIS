@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Vendor
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
                    <a href="{{ route('frontend.supplier.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Vendor
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

                            @include('frontend.common.label.show')

                            <h3 class="m-portlet__head-text">
                                Vendor
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
                                        <label class="form-control-label">
                                            Vendor Name
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'generate')
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Term of Payment
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'generate')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Phone
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'generate')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Ext.
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'generate')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label><br>

                                                @component('frontend.common.input.radio')
                                                    @slot('text', 'Company')
                                                    @slot('name', 'type_phone_1')
                                                    @slot('id', 'type_phone')
                                                    @slot('value', 'company')
                                                    @slot('disabled','disabled')
                                                @endcomponent
                                                @component('frontend.common.input.radio')
                                                    @slot('id', 'type_phone')
                                                    @slot('name', 'type_phone_1')
                                                    @slot('text', 'Personal')
                                                    @slot('value', 'personal')
                                                    @slot('disabled','disabled')
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
                                                    Fax
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'generate')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label><br>

                                                @component('frontend.common.input.radio')
                                                    @slot('text', 'Company')
                                                    @slot('name', 'type_fax')
                                                    @slot('id', 'type_fax')
                                                    @slot('value', 'company')
                                                    @slot('disabled','disabled')
                                                @endcomponent
                                                @component('frontend.common.input.radio')
                                                    @slot('name', 'type_fax')
                                                    @slot('id', 'type_fax')
                                                    @slot('text', 'Personal')
                                                    @slot('value', 'personal')
                                                    @slot('disabled','disabled')
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
                                                    Email
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'generate')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label class="form-control-label">
                                                    Type.
                                                </label> <br>

                                                @component('frontend.common.input.radio')
                                                    @slot('text', 'Company')
                                                    @slot('name', 'type_email')
                                                    @slot('id', 'type_email')
                                                    @slot('value', 'company')
                                                    @slot('disabled','disabled')
                                                @endcomponent
                                                @component('frontend.common.input.radio')
                                                    @slot('name', 'type_email')
                                                    @slot('id', 'type_email')
                                                    @slot('text', 'Personal')
                                                    @slot('value', 'personal')
                                                    @slot('disabled','disabled')
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
                                                    Document
                                                </label>

                                                @component('frontend.common.input.upload')
                                                    @slot('label', 'document')
                                                    @slot('name', 'document')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Type.
                                                </label>

                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'generate')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Account Code
                                        </label>


                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'generate')
                                        @endcomponent

                                        @component('frontend.common.input.hidden')
                                            @slot('id', 'account_code')
                                            @slot('name', 'account_code')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto"><b>Bank Account Information</b></legend>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label class="form-control-label">
                                                            Bank Name
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'generate')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Bank Account Name
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'generate')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Bank Account Number
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'generate')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Currency
                                                        </label>


                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'generate')
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Swift Code
                                                        </label>

                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'generate')
                                                        @endcomponent
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Active
                                        </label><br>

                                        <span class="m-bootstrap-switch m-bootstrap-switch--pill">
                                            <input name="isActive" data-switch="true" type="checkbox" data-on-color="success" disabled>
                                        </span>
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

                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                            <div class="vendor_address_datatable" id="vendor_address_datatable"></div>
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
                                <legend class="w-auto">Attention(s)</legend>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Name
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'generate')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Position
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'generate')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Phone
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'generate')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 hidden">
                                            <label class="form-control-label">
                                                Extension
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'generate')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Fax
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'generate')
                                            @endcomponent
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label class="form-control-label">
                                                Email
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'generate')
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
@endsection

@push('header-scripts')
<style>
    fieldset {
        margin-bottom: 10px;
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

    var BootstrapSwitch = {
        init: function() {
            $("[data-switch=true]").bootstrapSwitch();
        }
    };


    $( document ).ready(function() {
        $('.selectDocument').select2();
        BootstrapSwitch.init()
    });
</script>
<script src="{{ asset('js/frontend/vendor/edit.js') }}"></script>
<script src="{{ asset('js/frontend/vendor/form-reset.js') }}"></script>
@endpush
