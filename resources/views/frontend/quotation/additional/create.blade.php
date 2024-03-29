@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                   Additional Task
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
                                Additional Task
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
                                    Additonal Task
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
                                            <table class="table table-striped table-bordered second" width="100%" cellpadding="4">
                                                <tr>
                                                    <td align="center" width="14%"><b>Date</b></td>
                                                    <td align="center" width="16%"><b>Project No.</b></td>
                                                    <td align="center" width="28%"><b>Project Title</b></td>
                                                    <td align="center" width="14%"><b>A/C Type</b></td>
                                                    <td align="center" width="14%"><b>A/C Reg</b></td>
                                                    <td align="center" width="14%"><b>A/C SN</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top">{{$project->created_at}}</td>
                                                    <td align="center" valign="top">{{$project->code}}</td>
                                                    <td align="center" valign="top">{{$project->title}}</td>
                                                    <td align="center" valign="top">{{$project->aircraft->name}}</td>
                                                    <td align="center" valign="top">{{$project->aircraft_register}}</td>
                                                    <td align="center" valign="top">{{$project->aircraft_sn}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
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
                                                <input type="hidden" id="customer_uuid" name="customer_uuid" value="{{ $project->customer->uuid }}">
                                                <div class="m-portlet__body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <label class="form-control-label">
                                                                            Customer Name
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', $project->customer->name)
                                                                            @slot('id', 'name')
                                                                        @endcomponent

                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <label class="form-control-label">
                                                                            Attention
                                                                        </label>

                                                                        @component('frontend.common.input.select2')
                                                                                @slot('id', 'attention')
                                                                                @slot('name', 'attention')
                                                                            @endcomponent
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <label class="form-control-label">
                                                                            Level
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', $project->customer->levels->last()->name)
                                                                            @slot('id', 'level')
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
                                                                            @slot('name', 'phone')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <label class="form-control-label">
                                                                            Fax
                                                                        </label>

                                                                        @component('frontend.common.input.select2')
                                                                            @slot('text', '+62xxxxxxx / 07777777')
                                                                            @slot('id', 'fax')
                                                                            @slot('name', 'fax')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <label class="form-control-label">
                                                                            Email
                                                                        </label>

                                                                        @component('frontend.common.input.select2')
                                                                            @slot('text', 'example@email.com')
                                                                            @slot('id', 'email')
                                                                            @slot('name', 'email')
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
                                                                            @slot('name', 'address')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group row hidden">
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <label class="form-control-label">
                                                                            City
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'XXX')
                                                                            @slot('id', 'name')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <label class="form-control-label">
                                                                            Country
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'XXX')
                                                                            @slot('id', 'name')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Date
                                                            </label>

                                                            @component('frontend.common.input.datepicker')
                                                                @slot('id', 'date')
                                                                @slot('text', 'Date')
                                                                @slot('name', 'date')
                                                                @slot('id_error','requested_at')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Valid Until
                                                            </label>

                                                            @component('frontend.common.input.datepicker')
                                                                @slot('id', 'valid_until')
                                                                @slot('text', 'Valid Until')
                                                                @slot('name', 'valid_until')
                                                                @slot('id_error','valid_until')
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

                                                            @component('frontend.common.input.select2')
                                                                @slot('id', 'currency')
                                                                @slot('text', 'Currency')
                                                                @slot('name', 'currency')
                                                                @slot('id_error', 'currency')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                            <label class="form-control-label">
                                                                Exchange Rate
                                                            </label>

                                                            @component('frontend.common.input.number')
                                                                @slot('text', 'exchange')
                                                                @slot('name', 'exchange')
                                                                @slot('id_error', 'exchange')
                                                                @slot('id', 'exchange')
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
                                                Quotation Title @include('frontend.common.label.required')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'title')
                                                @slot('name', 'title')
                                                @slot('text', 'Title')
                                                @slot('id_error', 'title')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Description @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'description')
                                                @slot('name', 'description')
                                                @slot('text', 'Description')
                                                @slot('id_error', 'description')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row" style="margin-top:-12px;">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Term and Condition
                                            </label>

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'term_and_condition')
                                                @slot('name', 'term_and_condition')
                                                @slot('text', 'Term and Condition')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show routine" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Defect Card List</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link non-routine" data-toggle="tab" href="#m_tabs_1_2">Material(s) & Tool List(s)</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link non-routine" data-toggle="tab" href="#m_tabs_1_3">Summary</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="m_tabs_1_1" role="tabpanel">
                                                    @include('frontend.quotation.additional.defect-card.index')
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                                    @include('frontend.quotation.additional.material-tool.index')
                                                </div>
                                                <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
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
                                                        @slot('id', 'add-additional-quotation')
                                                        @slot('class', 'add-additional-quotation')
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
        let project_uuid = '{{$project->uuid}}';
        let dataSet = [];
        let currencyCode = 'usd';
    </script>
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/additional/create.js')}}"></script>
    {{-- <script src="{{ asset('js/frontend/quotation/additional/summary.js') }}"></script> --}}

    <script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/ref.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/phone.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/email.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/fax.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/address.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/scheduled-payment-type.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/charge-type.js') }}"></script>
    

    <script src="{{ asset('js/frontend/functions/fill-combobox/currency.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/scheduled-payment-type.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/valid-until.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/scheduled-payment.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/repeater.js') }}"></script>

    {{-- <script src="{{ asset('/assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/scheduled-payment.js') }}"></script> --}}
@endpush

