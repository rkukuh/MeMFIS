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
                        <a href="{{ route('frontend.quotation-workshop.index') }}" class="m-nav__link">
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

                                @include('frontend.common.label.show')

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
                                                    <fieldset class="border p-2">
                                                        <legend class="w-auto">Identifier Customer</legend>
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
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <label class="form-control-label">
                                                                                    Name   
                                                                                </label>

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'Generate')
                                                                                    @slot('id', 'Generate')
                                                                                @endcomponent
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Attention
                                                                                </label>

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'Generate')
                                                                                    @slot('id', 'Generate')
                                                                                @endcomponent
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Level
                                                                                </label>

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'Generate')
                                                                                    @slot('id', 'Generate')
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

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'Generate')
                                                                                    @slot('id', 'Generate')
                                                                                @endcomponent
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Fax
                                                                                </label>
                                                                                
                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'Generate')
                                                                                    @slot('id', 'Generate')
                                                                                @endcomponent
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row">
                                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                                <label class="form-control-label">
                                                                                    Email
                                                                                </label>

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'Generate')
                                                                                    @slot('id', 'Generate')
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

                                                                                @component('frontend.common.label.data-info')
                                                                                    @slot('text', 'Generate')
                                                                                    @slot('id', 'Generate')
                                                                                @endcomponent
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Work Order  
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'Generate')
                                                                @slot('id', 'Generate')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Date  
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'Generate')
                                                                @slot('id', 'Generate')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Valid Until
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'Generate')
                                                                @slot('id', 'Generate')
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
                                                                Currency  
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'Generate')
                                                                @slot('id', 'Generate')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Exchange Rate  
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'Generate')
                                                                @slot('id', 'Generate')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Subject Quotation  
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generate')
                                                @slot('id', 'Generate')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Term and Condition 
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generate')
                                                @slot('id', 'Generate')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description 
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Generate')
                                                @slot('id', 'Generate')
                                            @endcomponent
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
                                                        <div class="item_datatable" id="item_datatable"></div>
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

@push('footer-scripts')
    <script src="{{ asset('js/frontend/quotation-workshop/show.js') }}"></script>
@endpush
