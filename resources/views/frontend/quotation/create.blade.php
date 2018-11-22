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
                                                <label class="form-control-label">
                                                    Customer @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.select')
                                                    @slot('id', 'customer')
                                                    @slot('text', 'Customer')
                                                    @slot('name', 'customer')
                                                    @slot('style', 'width:100%')
                                                    @slot('id_error', 'customer')
                                                @endcomponent

                                                @component('frontend.common.buttons.create-new')
                                                    @slot('size', 'sm')
                                                    @slot('text', 'customer')
                                                    @slot('style', 'margin-top: 10px;')
                                                    @slot('data_target', '#modal_category')
                                                @endcomponent

                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        From 
                                                    </label>
    
                                                    @component('frontend.common.label.data-info')
                                                        @slot('text', 'Marketing')
                                                    @endcomponent
                                            </div>
                                        </div>
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Identifier</legend>
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
                                                                            Attn
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'Bp. Romdani')
                                                                            @slot('id', 'attn')
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
                                                                            Tlp
                                                                        </label>
            
                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', '+62xxxxxxx / 07777777')
                                                                            @slot('id', 'telp')
                                                                        @endcomponent
                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', '+62xxxxxxx / 07777777')
                                                                            @slot('id', 'telp')
                                                                        @endcomponent
            
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Fax
                                                                            </label>
                
                                                                            @component('frontend.common.label.data-info')
                                                                                @slot('text', '+62xxxxxxx / 07777777')
                                                                                @slot('id', 'fax')
                                                                            @endcomponent
                                                                            @component('frontend.common.label.data-info')
                                                                                @slot('text', '+62xxxxxxx / 07777777')
                                                                                @slot('id', 'fax')
                                                                            @endcomponent
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane active" id="m_tabs_6_3" role="tabpanel">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group m-form__group row">        
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <label class="form-control-label">
                                                                            Address
                                                                        </label>
            
                                                                        @component('frontend.common.label.data-info')
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
                                                    {{-- <div class="form-group m-form__group row">        
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
                                                                Attn
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'Bp. Romdani')
                                                                @slot('id', 'attn')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">        
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Tlp
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', '+62xxxxxxx / 07777777')
                                                                @slot('id', 'telp')
                                                            @endcomponent
                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', '+62xxxxxxx / 07777777')
                                                                @slot('id', 'telp')
                                                            @endcomponent

                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <label class="form-control-label">
                                                                    Fax
                                                                </label>
    
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '+62xxxxxxx / 07777777')
                                                                    @slot('id', 'fax')
                                                                @endcomponent
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('text', '+62xxxxxxx / 07777777')
                                                                    @slot('id', 'fax')
                                                                @endcomponent
                                                            </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">        
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Address
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, nulla odio consequuntur obcaecati eos error recusandae minima eveniet dolor sed tempora! Ut quidem illum accusantium expedita nulla eos reprehenderit officiis?')
                                                                @slot('id', 'address')
                                                            @endcomponent
                                                        </div>
                                                    </div> --}}
                                            </fieldset>

                                        <div class="form-group m-form__group row">
                                            
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Quotation No. @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.text')
                                                    @slot('text', 'Wuotation No')
                                                    @slot('id', 'quotation_no')
                                                    @slot('name', 'quotation_no')
                                                    @slot('id_error', 'quotation_no')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        Quotation Ref
                                                    </label>

                                                    @component('frontend.common.input.select')
                                                        @slot('id', 'ref')
                                                        @slot('text', 'Ref')
                                                        @slot('name', 'ref')
                                                        @slot('style', 'width:100%')
                                                        @slot('id_error', 'ref')
                                                    @endcomponent
                                            </div>
                                        </div>
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
                                                <label class="form-control-label">
                                                    P. Center
                                                </label>
    
                                                @component('frontend.common.label.data-info')
                                                    @slot('text', 'MMF01')
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
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                    Subject @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.textarea')
                                                    @slot('rows', '3')
                                                    @slot('id', 'subject')
                                                    @slot('name', 'subject')
                                                    @slot('text', 'Subject')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                                <div class="flex">
                                                    <div class="action-buttons">
                                                        @component('frontend.common.buttons.submit')
                                                            @slot('type','button')
                                                            @slot('id', 'add-taskcard')
                                                            @slot('class', 'add-taskcard')
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
    <script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/customer.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/currency.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/ref.js') }}"></script>


    <script src="{{ asset('js/frontend/quotation/create.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/form-reset.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/valid-until.js')}}"></script>

@endpush
