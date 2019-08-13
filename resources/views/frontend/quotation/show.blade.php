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

                            @include('frontend.common.label.edit')

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
                                        <fieldset class="border p-2">
                                            <legend class="w-auto">Project</legend>
                                            <div class="form-group m-form__group row">
                                                <input type="hidden" id="quotation_uuid" name="quotation_uuid" value="{{ $quotation->uuid }}">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Work Order @include('frontend.common.label.required')
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $quotation->project->no_wo)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Project Title
                                                            </label>

                                                            @component('frontend.common.label.data-info')
                                                                @slot('text', $quotation->project->title)
                                                            @endcomponent
                                                        </div>
                                                    </div>

                                                    <input type="hidden" id="customer_id" name="customer_id">

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label class="form-control-label">
                                                                Project Number
                                                            </label>
                                                            @component('frontend.common.label.data-info')
                                                                @slot('id', 'project_number')
                                                                @slot('text', 'P-01/HMxxxxx')
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
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
                                        </fieldset>
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
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Name
                                                                            </label>

                                                                            @component('frontend.common.label.data-info')
                                                                                @slot('text', $quotation->project->customer->name)
                                                                                @slot('id', 'name')
                                                                            @endcomponent
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Attention
                                                                            </label>

                                                                            @component('frontend.common.label.data-info')
                                                                            @if(isset($attention->name))
                                                                                @slot('text', $attention->name)
                                                                            @else
                                                                                @slot('text', '-')
                                                                            @endif
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

                                                                            @component('frontend.common.label.data-info')
                                                                            @if(isset($attention->phone))
                                                                                @slot('text', $attention->phone)
                                                                            @else
                                                                                @slot('text', '-')
                                                                            @endif
                                                                                @slot('name', 'attn-phone')
                                                                                @slot('id', 'phone')
                                                                            @endcomponent

                                                                        </div>
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Fax
                                                                            </label>

                                                                            @component('frontend.common.label.data-info')
                                                                            @if(isset($attention->fax))
                                                                                @slot('text', $attention->fax)
                                                                            @else
                                                                                @slot('text', '-')
                                                                            @endif
                                                                                @slot('name', 'attn-fax')
                                                                                @slot('id', 'fax')
                                                                            @endcomponent
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group m-form__group row">
                                                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                                                            <label class="form-control-label">
                                                                                Email
                                                                            </label>

                                                                            @component('frontend.common.label.data-info')
                                                                            @if(isset($attention->email))
                                                                                @slot('text', $attention->email)
                                                                            @else
                                                                                @slot('text', '-')
                                                                            @endif
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
                                                                            @if(isset($attention->address))
                                                                                @slot('text', $attention->address)
                                                                            @else
                                                                                @slot('text', '-')
                                                                            @endif
                                                                                @slot('id', 'address')
                                                                            @endcomponent
                                                                        </div>
                                                                    </div>
                                                                    <div id="map"></div>

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
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Date @include('frontend.common.label.required')
                                                        </label>
                                                        @component('frontend.common.label.data-info')
                                                            @slot('id', 'requested_at')
                                                            @slot('text', $quotation->requested_at)
                                                        @endcomponent
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Valid Until @include('frontend.common.label.required')
                                                        </label>
                                                        @component('frontend.common.label.data-info')
                                                            @slot('id', 'valid_until')
                                                            @slot('text', $quotation->valid_until)
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
                                                        @foreach ($currencies as $currency)
                                                        @if ($currency->id == $quotation->currency_id)
                                                        @component('frontend.common.label.data-info')
                                                            @slot('id', 'Currency')
                                                            @slot('text', $currency->name.'('.$currency->symbol.')')
                                                        @endcomponent
                                                        @endif
                                                        @endforeach

                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <label class="form-control-label">
                                                            Exchange Rate @include('frontend.common.label.required')
                                                        </label>
                                                        @component('frontend.common.label.data-info')
                                                            @slot('id', 'exchange_rate')
                                                            @slot('text',$quotation->exchange_rate)
                                                            @slot('value',$quotation->exchange_rate)
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
                                                <!-- need to add input append -->
                                                @component('frontend.common.label.data-info')
                                                    @slot('id', 'top')
                                                    @slot('text','term of payment')
                                                    @slot('text',$quotation->term_of_payment)
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
                                                @component('frontend.common.label.data-info')
                                                    @slot('id', 'scheduled_payment_type')
                                                    @slot('text','Scheduled payment type')
                                                    @slot('value','Scheduled payment type')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Scheduled Payment @include('frontend.common.label.required')
                                                </label>
                                                @component('frontend.common.label.data-info')
                                                    @slot('id', 'scheduled_payment_amount')
                                                    @slot('text','Scheduled payment amount')
                                                    @slot('value','Scheduled payment amount')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Quotation Title @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $quotation->title)
                                            @slot('id', 'quotation_title')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Description @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', $quotation->description)
                                            @slot('id', 'description')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Term and Condition @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'term and condition')
                                            @slot('text',$quotation->term_of_condition)
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show workpackage" data-toggle="tab" href="#" data-target="#m_tabs_workpackage">Workpackage</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link summary" data-toggle="tab" href="#m_tabs_summary">Summary</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="m_tabs_workpackage" role="tabpanel">
                                                <div class="workpackage_datatable" id="scrolling_both"></div>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_summary" role="tabpanel">

                                                <div class="summary_datatable" id="scrolling_both"></div>
                                                <br>
                                                <hr>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                    </div>
                                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                                        <div class="m--align-center" style="padding-top:15px">
                                                            Sub Total
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.label.data-info')
                                                            @slot('id', 'sub_total')
                                                            @slot('class', 'sub_total')
                                                            @slot('text', $quotation->subtotal)
                                                            @slot('value', $quotation->subtotal)
                                                        @endcomponent
                                                    </div>
                                                </div>
                                                @if(isset($charges))
                                                    @foreach($charges as $charge)
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                            <div class="m--align-center" >
                                                                @component('frontend.common.label.data-info')
                                                                    @slot('id', 'charge_type')
                                                                    @slot('name', 'charge_type')
                                                                    @slot('text', $charge->type)
                                                                @endcomponent
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                                            @component('frontend.common.label.data-info')
                                                                @slot('id', 'charge')
                                                                @slot('name', 'charge')
                                                                @slot('text', $charge->amount)
                                                            @endcomponent
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                                @if($quotation->currency->symbol !== "Rp")
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-sm-5 col-md-5 col-lg-5">
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                                            <div class="m--align-left" style="padding-top:15px">
                                                                <div class="form-group m-form__group row">
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 m--align-right">
                                                                            Total in
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 m--align-left p-0" id="currency_symbol">
                                                                            {{ $quotation->currency->name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                                            @component('frontend.common.label.data-info')
                                                                @slot('id', 'grand_total')
                                                                @slot('class', 'grand_total')
                                                                @slot('text', $quotation->grandtotal)
                                                                @slot('value', $quotation->grandtotal)
                                                            @endcomponent
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                        </div>
                                                        <div class="col-sm-1 col-md-1 col-lg-1">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group m-form__group row">
                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                    </div>
                                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                                        <div class="m--align-left" style="padding-top:15px">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-sm-6 col-md-6 col-lg-6 m--align-right">
                                                                        Total in
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 col-lg-6 m--align-left p-0">
                                                                        Rupiah
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        @component('frontend.common.label.data-info')
                                                            @slot('id', 'grand_total_rupiah')
                                                            @slot('class', 'grand_total_rupiah')
                                                            @slot('text', 'Rp '.$quotation->grandtotal)
                                                            @slot('value', $quotation->grandtotal)
                                                        @endcomponent
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
    let project_id = '{{  $quotation->project->uuid }}';
    let currency = '{{  $quotation->currency_id }}';
    let currencyCode = '{{  $quotation->currency->code }}';
</script>
<script src="{{ asset('js/custom.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/customer.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/currency.js') }}"></script>
<script src="{{ asset('js/frontend/quotation/workpackage/show.js') }}"></script>
<script src="{{ asset('js/frontend/quotation/show.js') }}"></script>
<script src="{{ asset('js/frontend/quotation/workpackage.js') }}"></script>
<script src="{{ asset('js/frontend/functions/repeater-core.js') }}"></script>

@endpush
