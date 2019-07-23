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

                                @include('frontend.common.label.edit')

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
                                                    <td align="center" valign="top">Generate</td>
                                                    <td align="center" valign="top">Generate</td>
                                                    <td align="center" valign="top">Generate</td>
                                                    <td align="center" valign="top">Generate</td>
                                                    <td align="center" valign="top">Generate</td>
                                                    <td align="center" valign="top">Generate</td>
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
                                                                            @slot('text', 'XXX')
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
                                                                            @slot('text', 'Bp. Romdani')
                                                                            @slot('id', 'attention')
                                                                            @slot('name', 'attention')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <label class="form-control-label">
                                                                            Level
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'XXX')
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

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'XXX')
                                                                            @slot('id', 'phone')
                                                                        @endcomponent
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <label class="form-control-label">
                                                                            Fax
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'XXX')
                                                                            @slot('id', 'fax')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <label class="form-control-label">
                                                                            Email
                                                                        </label>

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'XXX')
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

                                                                        @component('frontend.common.label.data-info')
                                                                            @slot('text', 'XXX')
                                                                            @slot('id', 'name')
                                                                        @endcomponent
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group row">
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
                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label class="form-control-label">
                                                        PPN
                                                    </label>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                                            @component('frontend.common.input.checkbox')
                                                            @slot('id', 'ppn')
                                                            @slot('name', 'ppn')
                                                            @slot('text', 'Include')
                                                            @slot('value', 'Include')
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-8 col-md-8 col-lg-8">
                                                            @component('frontend.common.input.checkbox')
                                                            @slot('id', 'ppn')
                                                            @slot('name', 'ppn')
                                                            @slot('text', 'Exclude')
                                                            @slot('value', 'Exclude')
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

                                            @component('frontend.common.input.textarea')
                                                @slot('rows', '5')
                                                @slot('id', 'title')
                                                @slot('name', 'title')
                                                @slot('text', 'Title')
                                                @slot('id_error', 'title')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row mb-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <fieldset class="border p-2">
                                                <legend class="w-auto">Schedule of Payment</legend>
                                                <div class="form-group m-form__group row p-2">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group m-form__group row mb-0 p-2">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <label class="form-control-label">
                                                                    Scheduled Payment Type  
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <label class="form-control-label">
                                                                    Description
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row p-2">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <select id="scheduled_payment_type" name="scheduled_payment_type" class="form-control">
                                                                    <option value="">
                                                                        Select a schedule payment
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                @component('frontend.common.input.text')
                                                                    @slot('name', 'description')
                                                                    @slot('id', 'description')
                                                                    @slot('text', 'Description')
                                                                    @slot('id_error', 'description')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                                @component('frontend.common.input.number')
                                                                    @slot('name', 'scheduled_payment')
                                                                    @slot('id', 'scheduled_payment')
                                                                    @slot('text', 'Phone')
                                                                    @slot('id_error', 'scheduled_payment_amount')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.delete_repeater')
                                                                    @slot('class', 'DeleteRow')
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-sm-1 col-md-1 col-lg-1">
                                                                @component('frontend.common.buttons.create_repeater')
                                                                    @slot('class', 'AddRow')
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row p-2">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <table class="table table-striped table-bordered second" width="100%" cellpadding="4">
                                                            <tr>
                                                                <td align="center" width="14%"><b>No</b></td>
                                                                <td align="center" width="40%"><b>Description</b></td>
                                                                <td align="center" width="10%"><b>Work Progress (%)</b></td>
                                                                <td align="center" width="36%"><b>Nominal</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" valign="top">Generate</td>
                                                                <td align="center" valign="top">Generate</td>
                                                                <td align="center" valign="top">Generate</td>
                                                                <td align="center" valign="top">Generate</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
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
                                                    @include('frontend.quotation.additional.summary.index')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.update')
                                                        @slot('type','button')
                                                        @slot('id', 'add-workpackage')
                                                        @slot('class', 'add-workpackage')
                                                    @endcomponent
    
                                                    @include('frontend.common.buttons.reset')
    
                                                    @component('frontend.common.buttons.back')
                                                        @slot('href', route('frontend.workpackage.index'))
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
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/additional/edit.js')}}"></script>
    <script src="{{ asset('js/frontend/quotation/additional/summary.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/select2/attn.js') }}"></script>
    <script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/fill-combobox/currency.js') }}"></script>

    <script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/datepicker/valid-until.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>
    <script src="{{ asset('js/frontend/quotation/repeater.js') }}"></script>

@endpush

