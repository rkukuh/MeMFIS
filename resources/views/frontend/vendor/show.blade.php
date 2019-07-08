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
                    <a href="{{ route('frontend.customer.index') }}" class="m-nav__link">
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
                                Vendor
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <form id="itemform" name="itemform">
                                    <div class="m-portlet__body">
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">Identifier</legend>

                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                    Customer Code @include('frontend.common.label.required')
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $customer->code)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                        Name @include('frontend.common.label.required')
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $customer->name)
                                                    @endcomponent
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label class="form-control-label">
                                                            Term of Payment @include('frontend.common.label.required')
                                                    </label>
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $customer->payment_term)
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                        Active * @include('frontend.common.label.optional')
                                                    </label>
                                                    @if($customer->banned_at <> null)
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text', 'Active')
                                                        @endcomponent
                                                    @else
                                                        @component('frontend.common.label.data-info')
                                                            @slot('text','Banned')
                                                        @endcomponent
                                                    @endif
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                Account Code  @include('frontend.common.label.optional')
                                            </label>
                                                @if (isset($customer->journal))
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', $customer->account_code_and_name)
                                                    @endcomponent
                                                @else
                                                    @include('frontend.common.label.data-info-nodata')
                                                @endif

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

@endpush @push('footer-scripts')
<script>
    let customer_uuid = '{{ $customer->uuid }}';
</script>

<script src="{{ asset('js/frontend/customer/show.js') }}"></script>

@endpush
